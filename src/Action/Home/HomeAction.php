<?php

namespace App\Action\Home;

use App\Database\Capsule;
use App\Models\User;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class HomeAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $user = User::find(2);

        print_r($user->name);

        $response->getBody()->write("Slim's creator is Filthy Cunt");

        return $response;
    }
}

