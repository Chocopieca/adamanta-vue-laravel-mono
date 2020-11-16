<?php

namespace App\Http\Controllers\Auth;

use Zend\Diactoros\Response as Psr7Response;
use Psr\Http\Message\ServerRequestInterface;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends AccessTokenController
{
    /**
     * Authorize a client to access the user's account.
     *
     * @param LoginRequest $requestToken
     * @param ServerRequestInterface $request
     * @return \Illuminate\Http\Response|\Psr\Http\Message\ResponseInterface
     * @throws \League\OAuth2\Server\Exception\OAuthServerException
     */
    public function __invoke(LoginRequest $requestToken, ServerRequestInterface $request)
    {
        return $this->issueToken($request);
    }

    /**
     * @param ServerRequestInterface $request
     * @return \Illuminate\Http\Response|\Psr\Http\Message\ResponseInterface
     * @throws \League\OAuth2\Server\Exception\OAuthServerException
     */
    public function issueToken(ServerRequestInterface $request)
    {
        return $this->server->respondToAccessTokenRequest($request, new Psr7Response);
    }
}
