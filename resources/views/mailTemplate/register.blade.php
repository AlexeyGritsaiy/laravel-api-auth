@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => 'api/verify/'. $user->token])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
