<?php

namespace App\Action\Home;

use App\Database\Capsule;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class HomeAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $capsule = (new Capsule())->getCapsule();
        $user = $capsule->table('users')->first();

        print_r($user);

        $response->getBody()->write("Slim's creator is Filthy Cunt");

        return $response;
    }
}

