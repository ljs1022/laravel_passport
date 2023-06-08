<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;
use Laravel\Passport\Token;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'ok'
        ],201);
    }

    public function login(Request $request)
    {
        #TODO 錯誤的回傳格式統一處理

        try {
            return Http::asForm()
                ->post(config('app.url') . '/oauth/token', [
                    'grant_type' => 'password',
                    'client_id' => 2,
                    'client_secret' => 'IHlWTs9XWbrrG13jveVaJPqpnNmQy4dygwjYETU7',
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => '',
                ])
                ->json();

        } catch (\Throwable $th) {
            return collect([
                'error' => 'server_error',
                'error_description' => 'Unexpected error.',
            ]);
        }
    }

    public function logout()
    {
        $tokenId = auth('api')->user()->token()->id;
        $tokenRepository = app(TokenRepository::class);
        $refreshTokenRepository = app(RefreshTokenRepository::class);
        $tokenRepository->revokeAccessToken($tokenId);
        $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($tokenId);

        return response()->json([
            'status' => true,
            'message' => 'ok'
        ]);
    }

    public function refreshToken(Request $request)
    {
        try {
            return Http::asForm()
                ->post(config('app.url') . '/oauth/token', [
                    'grant_type' => 'refresh_token',
                    'client_id' => 2,
                    'client_secret' => 'IHlWTs9XWbrrG13jveVaJPqpnNmQy4dygwjYETU7',
                    'refresh_token' => $request->refresh_token,
                    'scope' => '',
                ])
                ->json();
        } catch (\Throwable $th) {
            return collect([
                'error' => 'server_error',
                'error_description' => 'Unexpected error.',
            ]);
        }
    }
}
