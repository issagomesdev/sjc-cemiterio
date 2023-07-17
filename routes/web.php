<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Permissions
    Route::resource('permissions', 'PermissionsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Cemiterios
    Route::delete('cemiterios/destroy', 'CemiteriosController@massDestroy')->name('cemiterios.massDestroy');
    Route::post('cemiterios/media', 'CemiteriosController@storeMedia')->name('cemiterios.storeMedia');
    Route::post('cemiterios/ckmedia', 'CemiteriosController@storeCKEditorImages')->name('cemiterios.storeCKEditorImages');
    Route::resource('cemiterios', 'CemiteriosController');

    // Setores
    Route::delete('setores/destroy', 'SetoresController@massDestroy')->name('setores.massDestroy');
    Route::resource('setores', 'SetoresController');

    // Quadras
    Route::delete('quadras/destroy', 'QuadrasController@massDestroy')->name('quadras.massDestroy');
    Route::resource('quadras', 'QuadrasController');

    // Lotes
    Route::delete('lotes/destroy', 'LotesController@massDestroy')->name('lotes.massDestroy');
    Route::resource('lotes', 'LotesController');

    // Ossuarios
    Route::delete('ossuarios/destroy', 'OssuariosController@massDestroy')->name('ossuarios.massDestroy');
    Route::resource('ossuarios', 'OssuariosController');

    // Gavetas
    Route::delete('gaveta/destroy', 'GavetasController@massDestroy')->name('gaveta.massDestroy');
    Route::resource('gaveta', 'GavetasController');

    // Responsável
    Route::delete('responsaveis/destroy', 'ResponsaveisController@massDestroy')->name('responsaveis.massDestroy');
    Route::resource('responsaveis', 'ResponsaveisController');

    // Obitos Lotes
    Route::delete('obitos-lotes/destroy', 'ObitosLoteController@massDestroy')->name('obitos-lotes.massDestroy');
    Route::post('obitos-lotes/media', 'ObitosLoteController@storeMedia')->name('obitos-lotes.storeMedia');
    Route::post('obitos-lotes/ckmedia', 'ObitosLoteController@storeCKEditorImages')->name('obitos-lotes.storeCKEditorImages');
    Route::resource('obitos-lotes', 'ObitosLoteController');

    // Obitos Gavetas
    Route::delete('obitos-gavetas/destroy', 'ObitosGavetaController@massDestroy')->name('obitos-gavetas.massDestroy');
    Route::post('obitos-gavetas/media', 'ObitosGavetaController@storeMedia')->name('obitos-gavetas.storeMedia');
    Route::post('obitos-gavetas/ckmedia', 'ObitosGavetaController@storeCKEditorImages')->name('obitos-gavetas.storeCKEditorImages');
    Route::resource('obitos-gavetas', 'ObitosGavetaController');

    // Compra De Lote
    // Route::delete('compra-de-lotes/destroy', 'CompraDeLoteController@massDestroy')->name('compra-de-lotes.massDestroy');
    // Route::get('compra-de-lotes/create', 'CompraDeLoteController@create')->name('compra-de-lotes.create');
    // Route::resource('compra-de-lotes', 'CompraDeLoteController', ['except' => ['create']]);

    // Recadastramento
    // Route::delete('recadastramentos/destroy', 'RecadastramentoController@massDestroy')->name('recadastramentos.massDestroy');
    // Route::post('recadastramentos/media', 'RecadastramentoController@storeMedia')->name('recadastramentos.storeMedia');
    // Route::post('recadastramentos/ckmedia', 'RecadastramentoController@storeCKEditorImages')->name('recadastramentos.storeCKEditorImages');
    // Route::resource('recadastramentos', 'RecadastramentoController');

    // Entre Lotes
    Route::delete('entre-lotes/destroy', 'EntreLotesController@massDestroy')->name('entre-lotes.massDestroy');
    Route::get('entre-lotes/create/{id}', 'EntreLotesController@create')->name('entre-lotes.create');
    Route::resource('entre-lotes', 'EntreLotesController', ['except' => ['edit', 'create', 'update']]);

    // Entre Gavetas
    Route::delete('entre-gavetas/destroy', 'EntreGavetasController@massDestroy')->name('entre-gavetas.massDestroy');
    Route::get('entre-gavetas/create/{id}', 'EntreGavetasController@create')->name('entre-gavetas.create');
    Route::resource('entre-gavetas', 'EntreGavetasController', ['except' => ['edit', 'create', 'update']]);

    // Para Lotes
    Route::delete('para-lotes/destroy', 'ParaLotesController@massDestroy')->name('para-lotes.massDestroy');
    Route::get('para-lotes/create/{id}', 'ParaLotesController@create')->name('para-lotes.create');
    Route::resource('para-lotes', 'ParaLotesController', ['except' => ['edit', 'create', 'update']]);

    // Para Gavetas
    Route::delete('para-gavetas/destroy', 'ParaGavetasController@massDestroy')->name('para-gavetas.massDestroy');
    Route::get('para-gavetas/create/{id}', 'ParaGavetasController@create')->name('para-gavetas.create');
    Route::resource('para-gavetas', 'ParaGavetasController', ['except' => ['edit', 'create', 'update']]);

    // Relatórios
    Route::get('relatorios/users', 'RelatoriosController@users')->name('relatorios.users');
    Route::get('relatorios/cemiterios', 'RelatoriosController@cemiterios')->name('relatorios.cemiterios');
    Route::get('relatorios/setores', 'RelatoriosController@setores')->name('relatorios.setores');
    Route::get('relatorios/quadras', 'RelatoriosController@quadras')->name('relatorios.quadras');
    Route::get('relatorios/lotes', 'RelatoriosController@lotes')->name('relatorios.lotes');
    Route::get('relatorios/ossuarios', 'RelatoriosController@ossuarios')->name('relatorios.ossuarios');
    Route::get('relatorios/gavetas', 'RelatoriosController@gavetas')->name('relatorios.gavetas');
    Route::get('relatorios/responsaveis', 'RelatoriosController@responsaveis')->name('relatorios.responsaveis');
    Route::get('relatorios/obitos-lotes', 'RelatoriosController@obitoslotes')->name('relatorios.obitos-lotes');
    Route::get('relatorios/obitos-gavetas', 'RelatoriosController@obitosgavetas')->name('relatorios.obitos-gavetas');
    // Route::get('relatorios/compras-de-lotes', 'RelatoriosController@comprasdelotes')->name('relatorios.compras-de-lotes');
    Route::get('relatorios/entre-lotes', 'RelatoriosController@entrelotes')->name('relatorios.entre-lotes');
    Route::get('relatorios/entre-gavetas', 'RelatoriosController@entregavetas')->name('relatorios.entre-gavetas');
    Route::get('relatorios/para-lotes', 'RelatoriosController@paralotes')->name('relatorios.para-lotes');
    Route::get('relatorios/para-gavetas', 'RelatoriosController@paragavetas')->name('relatorios.para-gavetas');

    // Map
    Route::get('mapa/{id}', 'MapaController@index')->name('mapa');
    Route::get('mapa/edit/{id}', 'MapaController@edit')->name('mapa.edit');
    Route::post('mapa', 'MapaController@update')->name('mapa.update');

    // Global Search
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');

    // Dependent Dropdown
    Route::get('cemiterio-setor/{id}', function ($id) {
    $setor = App\Models\Setore::where('cemiterio_id', $id)->get();
    return response()->json($setor);
    });

    Route::get('setor-quadra/{id}', function ($id) {
    $quadra = App\Models\Quadra::where('setor_id', $id)->get();
    return response()->json($quadra);
    });

    Route::get('quadra-lote/{id}', function ($id) {
    $lote = App\Models\Lote::where('quadra_id', $id)->get();
    return response()->json($lote);
    });

    Route::get('cemiterio-ossuario/{id}', function ($id) {
    $ossuario = App\Models\Ossuario::where('cemiterio_id', $id)->get();
    return response()->json($ossuario);
    });

    Route::get('ossuario-gaveta/{id}', function ($id) {
    $gaveta = App\Models\Gavetum::where('ossuario_id', $id)->get();
    return response()->json($gaveta);
    });

});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
