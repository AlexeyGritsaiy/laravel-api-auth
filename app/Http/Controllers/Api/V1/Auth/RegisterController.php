<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Servises\Auth\RegisterService;

class RegisterController extends Controller
{
    private $service;

    public function __construct(RegisterService $service)
    {
        $this->middleware('guest');
        $this->service = $service;
    }

    public function register(RegisterRequest $request,User $user)
    {
        $this->service->register($request);
        return ('Check your email and click on the link to verify.');
    }

    public function verify($token)
    {

        if (!$user = User::where('token', $token)->first()) {
            return ('Sorry your link cannot be identified.');
        }

        try {
            $this->service->verify($user->id);
            return ('Your e-mail is verified. You can now login.');
        } catch (\DomainException $e) {
            return  $e->getMessage();
        }
    }

}
