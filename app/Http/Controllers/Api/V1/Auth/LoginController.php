<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Servises\Auth\RegisterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    private $service;

    public function __construct(RegisterService $service)
    {
        $this->middleware('guest');
        $this->service = $service;
    }

    public function login($token)
    {
        if (!$user = User::where('token', $token)->first()) {
            Log::error('User failed to login. Token - undefined');
            return ('Sorry your link cannot be identified.');
        }

        try {
            $this->service->verify($user->id);
            Log::info('Success login', ['id' => $user->id]);
            return ('You now login.');
        } catch (\DomainException $e) {
            return $e->getMessage();
        }
    }

}
