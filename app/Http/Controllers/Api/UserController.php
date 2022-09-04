<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\UserLoginRequest;
use App\Http\Requests\Api\User\UserRegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param UserLoginRequest $request
     * @return JsonResponse
     */
    public function login(UserLoginRequest $request) : JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            $user = Auth::user();
            $token = $user->createToken('api');
            return response()->json([$token],200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'authentication error',
                'data' => 'authentication failed!'
            ],403);
        }
    }

    /**
     * @param UserRegisterRequest $request
     * @return JsonResponse
     */
    public function register(UserRegisterRequest $request) : JsonResponse
    {
        $user = $this->repository->create($request->all());
        $token = $user->createToken('api');
        return response()->json([$token],403);
    }
}
