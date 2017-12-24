<?php

/** @var Illuminate\Routing\Router $router */
$router->group([
    'as' => 'api_',
    'namespace' => 'Api',
], function () use ($router) {
    $router->group([
        'prefix' => 'construction',
    ], function () use ($router) {
        $router->get('{grid}', 'ConstructionController@index')
            ->name('construction')
            ->where('grid', '\d+');

        $router->post('{grid}/{building}', 'ConstructionController@store')
            ->name('construction_store')
            ->where('grid', '\d+')
            ->where('building', '\d+');

        $router->delete('{grid}', 'ConstructionController@destroy')
            ->name('construction_destroy')
            ->where('grid', '\d+');
    });

    $router->group([
        'prefix' => 'planet',
    ], function () use ($router) {
        $router->get('/', 'PlanetController@index')
            ->name('planet');

        $router->put('name', 'PlanetController@name')
            ->name('planet_name');

        $router->get('{planet}', 'PlanetController@show')
            ->name('planet_show')
            ->where('planet', '\d+');
    });

    $router->group([
        'prefix' => 'starmap',
    ], function () use ($router) {
        $router->get('geo-json/{zoom}/{bounds}', 'StarmapController@geoJson')
            ->name('starmap_geo_json')
            ->where('zoom', '\d')
            ->where('bounds', '[-0-9\.,]+');
    });

    $router->group([
        'prefix' => 'movement',
    ], function () use ($router) {
        $router->post('scout/{planet}', 'MovementController@storeScout')
            ->name('movement_scout')
            ->where('planet', '\d+');

        $router->post('attack/{planet}', 'MovementController@storeAttack')
            ->name('movement_attack')
            ->where('planet', '\d+');

        $router->post('occupy/{planet}', 'MovementController@storeOccupy')
            ->name('movement_occupy')
            ->where('planet', '\d+');

        $router->post('support/{planet}', 'MovementController@storeSupport')
            ->name('movement_support')
            ->where('planet', '\d+');

        $router->post('transport/{planet}', 'MovementController@storeTransport')
            ->name('movement_transport')
            ->where('planet', '\d+');
    });

    $router->group([
        'prefix' => 'upgrade',
    ], function () use ($router) {
        $router->get('{grid}', 'UpgradeController@index')
            ->name('upgrade')
            ->where('grid', '\d+');

        $router->post('{grid}', 'UpgradeController@store')
            ->name('upgrade_store')
            ->where('grid', '\d+');

        $router->delete('{grid}', 'UpgradeController@destroy')
            ->name('upgrade_destroy')
            ->where('grid', '\d+');
    });

    $router->group([
        'prefix' => 'producer',
    ], function () use ($router) {
        $router->get('{grid}', 'ProducerController@index')
            ->name('producer')
            ->where('grid', '\d+');

        $router->post('{grid}/{resource}', 'ProducerController@store')
            ->name('producer_store')
            ->where('grid', '\d+')
            ->where('resource', '\d+');
    });

    $router->get('scout/{grid}', 'ScoutController@index')
        ->name('scout')
        ->where('grid', '\d+');

    $router->group([
        'prefix' => 'trader',
    ], function () use ($router) {
        $router->get('{grid}', 'TraderController@index')
            ->name('trader')
            ->where('grid', '\d+');

        $router->post('{grid}/{mission}', 'TraderController@store')
            ->name('trader_store')
            ->where('grid', '\d+')
            ->where('mission', '\d+');
    });

    $router->group([
        'prefix' => 'trainer',
    ], function () use ($router) {
        $router->get('{grid}', 'TrainerController@index')
            ->name('trainer')
            ->where('grid', '\d+');

        $router->post('{grid}/{unit}', 'TrainerController@store')
            ->name('trainer_store')
            ->where('grid', '\d+')
            ->where('unit', '\d+');

        $router->delete('{grid}', 'TrainerController@destroy')
            ->name('trainer_destroy')
            ->where('grid', '\d+');
    });

    $router->group([
        'prefix' => 'user',
    ], function () use ($router) {
        $router->get('/', 'UserController@index')
            ->name('user');

        $router->put('current/{planet}', 'UserController@current')
            ->name('user_current')
            ->where('planet', '\d+');
    });

    $router->put('profile', 'ProfileController@update')
        ->name('profile_update');
});
