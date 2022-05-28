@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => env('APP_URL').'/api/login/'. $user->token])
Confirm user and Link to login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
