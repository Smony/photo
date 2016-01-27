<?php

Route::group(['namespace' => 'Client'], function() {
    get('/', [
        'uses'  =>  'IndexController@index',
        'as'    =>  'client.index.index'
    ]);

    post('/subscribe', [
        'uses'  =>  'SubscribersController@store',
        'as'    =>  'client.subscribers.store'
    ]);
});

Route::group(['middleware' => 'guest'], function() {
    get('/auth/login', [
        'uses'  =>  'Auth\AuthController@getLogin',
        'as'    =>  'client.auth.getLogin'
    ]);

    post('/auth/login', [
        'uses'  =>  'Auth\AuthController@postLogin',
        'as'    =>  'client.auth.postLogin'
    ]);

    get('/auth/register', [
        'uses'  =>  'Auth\AuthController@getRegister',
        'as'    =>  'client.auth.getRegister'
    ]);

    post('/auth/register', [
        'uses'  =>  'Auth\AuthController@postRegister',
        'as'    =>  'client.auth.postRegister'
    ]);
});

Route::group(['middleware' => 'auth'], function() {
    Route::group(['namespace' => 'Client'], function() {
        get('/home', [
            'uses'  =>  'HomeController@index',
            'as'    =>  'client.home.index'
        ]);
    });

    get('/auth/logout', [
        'uses'  =>  'Auth\AuthController@getLogout',
        'as'    =>  'client.auth.getLogout'
    ]);
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    get('/auth/login', [
        'uses'  =>  'AuthController@getLogin',
        'as'    =>  'admin.auth.getLogin'
    ]);

    post('/auth/login', [
        'uses'  =>  'AuthController@postLogin',
        'as'    =>  'admin.auth.postLogin'
    ]);

    Route::group(['middleware' => 'auth.admin'], function() {
        // Home
        get('/', [
            'uses'  =>  'IndexController@index',
            'as'    =>  'admin.index.index'
        ]);

        //===================================================

        // GET CLIENTS
        get('/clients', [
            'uses'  =>  'ClientsController@index',
            'as'    =>  'admin.clients.index'
        ]);

            get('/clients/create', [
                'uses' => 'ClientsController@create',
                'as'   => 'admin.clients.create'
            ]);

                post('/clients/store', [
                    'uses'  =>  'ClientsController@store',
                    'as'    =>  'admin.clients.store'
                ]);

                    get('/clients/{getClients}/edit', [
                        'uses' => 'ClientsController@edit',
                        'as'   => 'admin.clients.edit'
                    ]);

                        post('/clients/{getClients}/update', [
                            'uses' => 'ClientsController@update',
                            'as'   => 'admin.clients.update'
                        ]);

                            get('/clients/{getClients}/destroy', [
                                'uses'  =>  'ClientsController@destroy',
                                'as'    =>  'admin.clients.destroy'
                            ]);

        // GET MASTERS
        get('/masters', [
            'uses' => 'MastersController@index',
            'as'   => 'admin.masters.index'
        ]);
            get('/masters/create', [
                'uses' => 'MastersController@create',
                'as'   => 'admin.masters.create'
            ]);
                post('/masters/store', [
                    'uses' => 'MastersController@store',
                    'as'   => 'admin.masters.store'
                ]);
         /*           get('/masters/{getMasters}/edit', [
                        'uses' => 'MastersController@edit',
                        'as'   => 'admin.masters.edit'
                    ]);
                        post('/masters/{getMasters}/update', [
                           'uses' => 'MastersController@update',
                            'as'  => 'admin.masters.update'
                        ]);
                            get('/masters/{getMasters}/destroy', [
                                'uses' => 'MastersController@destroy',
                                'as'   => 'admin.masters.destroy'
                            ]);
        */
        // GET ADMINISTRATORS
        get('/administrators', [
            'uses' => 'AdministratorsController@index',
            'as'   => 'admin.administrators.index'
        ]);
            get('/administrators/create', [
                'uses' => 'AdministratorsController@create',
                'as'   => 'admin.administrators.create'
            ]);
                post('/administrators/store', [
                    'uses' => 'AdministratorsController@store',
                    'as'   => 'admin.administrators.store'
                ]);
 /*                   get('/administrator/{getAdministrators}/edit', [
                        'uses' => 'AdministratorsController@edit',
                        'as'   => 'admin.administrators.edit'
                    ]);
                        post('/administrators/{getAdministrators}/update', [
                            'uses' => 'AdministratorsController@update',
                            'as'   => 'admin.administrators.update'
                        ]);
                            get('/administrators/{getAdministrators}/destroy', [
                                'uses' => 'AdministratorsController@destroy',
                                'as'   => 'admin.administrators.destroy'
                            ]);
*/


        //===================================================

        // Page slides
        get('/page-slides', [
            'uses'  =>  'PageSlidesController@index',
            'as'    =>  'admin.pageSlides.index'
        ]);

        get('/page-slides/create', [
            'uses'  =>  'PageSlidesController@create',
            'as'    =>  'admin.pageSlides.create'
        ]);

        post('/page-slides/store', [
            'uses'  =>  'PageSlidesController@store',
            'as'    =>  'admin.pageSlides.store'
        ]);

        get('/page-slides/{pageItem}/edit', [
            'uses'  =>  'PageSlidesController@edit',
            'as'    =>  'admin.pageSlides.edit'
        ]);

        post('/page-slides/{pageItem}/update', [
            'uses'  =>  'PageSlidesController@update',
            'as'    =>  'admin.pageSlides.update'
        ]);

        get('/page-slides/{pageItem}/destroy', [
            'uses'  =>  'PageSlidesController@destroy',
            'as'    =>  'admin.pageSlides.destroy'
        ]);

        // How it works
        get('/how-it-works', [
            'uses'  =>  'HowItWorksController@index',
            'as'    =>  'admin.howItWorks.index'
        ]);

        get('/how-it-works/create', [
            'uses'  =>  'HowItWorksController@create',
            'as'    =>  'admin.howItWorks.create'
        ]);

        post('/how-it-works/store', [
            'uses'  =>  'HowItWorksController@store',
            'as'    =>  'admin.howItWorks.store'
        ]);

        post('/how-it-works/update-header', [
            'uses'  =>  'HowItWorksController@updateHeader',
            'as'    =>  'admin.howItWorks.updateHeader'
        ]);

        get('/how-it-works/{pageItem}/edit', [
            'uses'  =>  'HowItWorksController@edit',
            'as'    =>  'admin.howItWorks.edit'
        ]);

        post('/how-it-works/{pageItem}/update', [
            'uses'  =>  'HowItWorksController@update',
            'as'    =>  'admin.howItWorks.update'
        ]);

        get('/how-it-works/{pageItem}/destroy', [
            'uses'  =>  'HowItWorksController@destroy',
            'as'    =>  'admin.howItWorks.destroy'
        ]);

        // If you items
        get('/if-you-items', [
            'uses'  =>  'IfYouItemsController@index',
            'as'    =>  'admin.ifYouItems.index'
        ]);

        get('/if-you-items/create', [
            'uses'  =>  'IfYouItemsController@create',
            'as'    =>  'admin.ifYouItems.create'
        ]);

        post('/if-you-items/store', [
            'uses'  =>  'IfYouItemsController@store',
            'as'    =>  'admin.ifYouItems.store'
        ]);

        get('/if-you-items/{pageItem}/edit', [
            'uses'  =>  'IfYouItemsController@edit',
            'as'    =>  'admin.ifYouItems.edit'
        ]);

        post('/of-you-items/{pageItem}/update', [
            'uses'  =>  'IfYouItemsController@update',
            'as'    =>  'admin.ifYouItems.update'
        ]);

        get('/if-you-items/{pageItem}/destroy', [
            'uses'  =>  'IfYouItemsController@destroy',
            'as'    =>  'admin.ifYouItems.destroy'
        ]);

        // Coffee items
        get('/coffee-items', [
            'uses'  =>  'CoffeeItemsController@index',
            'as'    =>  'admin.coffeeItems.index'
        ]);

        post('/coffee-items/update', [
            'uses'  =>  'CoffeeItemsController@update',
            'as'    =>  'admin.coffeeItems.update'
        ]);

        // Subscribers
        get('/subscribers', [
            'uses'  =>  'SubscribersController@index',
            'as'    =>  'admin.subscribers.index'
        ]);

        get('/subscribers/{subscriber}/destroy', [
            'uses'  =>  'SubscribersController@destroy',
            'as'    =>  'admin.subscribers.destroy'
        ]);

        post('/subscribers/store', [
            'uses'  =>  'SubscribersController@store',
            'as'    =>  'admin.subscribers.store'
        ]);

        // Menu links
        get('/menu-links', [
            'uses'  =>  'MenuLinksController@index',
            'as'    =>  'admin.menuLinks.index'
        ]);

        get('/menu-links/create', [
            'uses'  =>  'MenuLinksController@create',
            'as'    =>  'admin.menuLinks.create'
        ]);

        post('/menu-links/store', [
            'uses'  =>  'MenuLinksController@store',
            'as'    =>  'admin.menuLinks.store'
        ]);

        get('/menu-links/{pageItem}/edit', [
            'uses'  =>  'MenuLinksController@edit',
            'as'    =>  'admin.menuLinks.edit'
        ]);

        post('/menu-links/{pageItem}/update', [
            'uses'  =>  'MenuLinksController@update',
            'as'    =>  'admin.menuLinks.update'
        ]);

        get('/menu-links/{pageItem}/destroy', [
            'uses'  =>  'MenuLinksController@destroy',
            'as'    =>  'admin.menuLinks.destroy'
        ]);

        // Update social links
        post('/menu-links/update-social-links', [
            'uses'  =>  'MenuLinksController@updateSocialLinks',
            'as'    =>  'admin.menuLinks.updateSocialLinks'
        ]);

        // Contact items
        get('/contact-items', [
            'uses'  =>  'ContactItemsController@index',
            'as'    =>  'admin.contactItems.index'
        ]);

        post('/contact-items/update', [
            'uses'  =>  'ContactItemsController@update',
            'as'    =>  'admin.contactItems.update'
        ]);

        // Update site title
        post('/contact-items/updateSiteTitle', [
            'uses'  =>  'ContactItemsController@updateSiteTitle',
            'as'    =>  'admin.contactItems.updateSiteTitle'
        ]);
        
        // Logout
        get('/auth/logout', [
            'uses'  =>  'AuthController@getLogout',
            'as'    =>  'admin.auth.getLogout'
        ]);



    });
});