<?php

namespace App\Action\Auth;

use App\Models\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LoginAction
{
    public function __invoke(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        $user = User::where('email', $data['email'])->first();

        if ($user && password_verify($data['password'], $user->password)) {
            $token = hash('sha256', $user->id . time());

            $responseData = [
                'message' => 'User logged successfully',
                'token' => $token,
            ];

            $response->getBody()->write(json_encode($responseData));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
        } else {
            $responseData = [
                'message' => 'User not found',
            ];

            $response->getBody()->write(json_encode($responseData));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(404);
        }
    }
}
