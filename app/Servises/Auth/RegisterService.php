<?php

namespace App\Servises\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\Auth\VerifyMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterService
{
    private $mailer;
    private $dispatcher;

    public function __construct(Mailer $mailer, Dispatcher $dispatcher)
    {
        $this->mailer = $mailer;
        $this->dispatcher = $dispatcher;
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'token' => Str::random(50),
                'status' => User::STATUS_WAIT,
                'password' => Hash::make($request['password'])
            ]
        );

        $this->mailer->to($user->email)->send(new VerifyMail($user));
        $this->dispatcher->dispatch(new Registered($user));
    }

    public function verify($id)
    {
        /** @var User $user */
        $user = User::findOrFail($id);
        $user->verify();
    }
}