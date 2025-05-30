<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Gate;
use App\Models\AuditLog;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::get();

        $roles = Role::get();

        return view('admin.users.index', compact('roles', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));
        if ($request->input('foto_de_perfil', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_de_perfil'))))->toMediaCollection('foto_de_perfil');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $user->id]);
        }

          $audit = AuditLog::create([
          'ação' => 'Cadastro',
          'autor' => Auth::user()->id,
          'local' => 'Usuários',
          'registro' => '#'. $user->id . ' - '. $user->name,
          'descrição' => 'ID: '. $user->id .' | Nome: '. $request->name .' | Email: '. $request->email. ' | Grupos: ' . implode(",", $request->roles),
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $user->load('roles', 'assinatura');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        if ($request->input('foto_de_perfil', false)) {
            if (!$user->foto_de_perfil || $request->input('foto_de_perfil') !== $user->foto_de_perfil->file_name) {
                if ($user->foto_de_perfil) {
                    $user->foto_de_perfil->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_de_perfil'))))->toMediaCollection('foto_de_perfil');
            }
        } elseif ($user->foto_de_perfil) {
            $user->foto_de_perfil->delete();
        }

        $audit = AuditLog::create([
          'ação' => 'Edição',
          'autor' => Auth::user()->id,
          'local' => 'Usuários',
          'registro' => '#'. $user->id . ' - '. $user->name,
          'descrição' =>  'ID: '. $user->id .' | Nome: '. $request->name .' | Email: '. $request->email. ' | Grupos: ' . implode(",", $request->roles),
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'assinatura');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

          $audit = AuditLog::create([
          'ação' => 'Exclusão',
          'autor' => Auth::user()->id,
          'local' => 'Usuários',
          'registro' => '#'. $user->id . ' - '. $user->name,
          'descrição' => 'ID: '. $user->id .' | Nome: '. $user->name .' | Email: '. $user->email. ' | Grupos: ' . implode(",", $roles),
          'host' => $request->ip(),

        ]);

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('user_create') && Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new User();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
