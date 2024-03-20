<?php

namespace App\Action\Auth;

use App\Models\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RegisterAction
{
    public function __invoke(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_BCRYPT);
        $user->save();

        $response->getBody()->write('User created');

        return $response;
    }
}
