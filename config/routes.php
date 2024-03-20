<?php

// Define app routes

use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\Home\HomeAction::class)->setName('home');

    $app->post('/register', \App\Action\Auth\RegisterAction::class)->setName('register');
    $app->post('/login', \App\Action\Auth\LoginAction::class)->setName('login');
};
