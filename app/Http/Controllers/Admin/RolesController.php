<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\AuditLog;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::with(['permissions'])->get();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::pluck('funcao', 'id');

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
      // dd($request->permissions);
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        $audit = AuditLog::create([
          'ação' => 'Cadastro',
          'autor' => Auth::user()->id,
          'local' => 'Grupos',
          'registro' => '#'. $role->id . ' - '. $role->title,
          'descrição' => 'ID: '. $role->id .' | Titulo: '. $request->title .' | Permissões: '. implode(", ", $request->permissions),
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::pluck('funcao', 'id');

        $role->load('permissions');

        return view('admin.roles.edit', compact('permissions', 'role'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        $audit = AuditLog::create([
          'ação' => 'Edição',
          'autor' => Auth::user()->id,
          'local' => 'Grupos',
          'registro' => '#'. $role->id . ' - '. $role->title,
          'descrição' => 'ID: '. $role->id .' | Titulo: '. $request->title .' | Permissões: '. implode(", ", $request->permissions),
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        return view('admin.roles.show', compact('role'));
    }

    public function destroy(Request $request, Role $role)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = json_decode(DB::table('permission_role')->where('role_id', $role->id)->pluck('permission_id'));

        $audit = AuditLog::create([
          'ação' => 'Exclusão',
          'autor' => Auth::user()->id,
          'local' => 'Grupos',
          'registro' => '#'. $role->id . ' - '. $role->title,
          'descrição' => 'ID: '. $role->id .' | Titulo: '. $role->title .' | Permissões: '. implode(", ", $permissions),
          'host' => $request->ip(),

        ]);

        $role->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        Role::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
