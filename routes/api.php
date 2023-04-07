<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController', ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Cemiterios
    Route::apiResource('cemiterios', 'CemiteriosApiController');

    // Setores
    Route::apiResource('setores', 'SetoresApiController');

    // Quadras
    Route::apiResource('quadras', 'QuadrasApiController');

    // Lotes
    Route::apiResource('lotes', 'LotesApiController');

    // Ossuarios
    Route::apiResource('ossuarios', 'OssuariosApiController');

    // Gavetas
    Route::apiResource('gaveta', 'GavetasApiController');

    // Solicitantes
    Route::apiResource('solicitantes', 'SolicitantesApiController');

    // Obitos
    Route::post('obitos/media', 'ObitosApiController@storeMedia')->name('obitos.storeMedia');
    Route::apiResource('obitos', 'ObitosApiController');

    // Compra De Lote
    Route::apiResource('compra-de-lotes', 'CompraDeLoteApiController');

    // Recadastramento
    Route::post('recadastramentos/media', 'RecadastramentoApiController@storeMedia')->name('recadastramentos.storeMedia');
    Route::apiResource('recadastramentos', 'RecadastramentoApiController');

    // Entre Lotes
    Route::apiResource('entre-lotes', 'EntreLotesApiController');

    // Para Ossuario
    Route::apiResource('para-ossuarios', 'ParaOssuarioApiController');
});
