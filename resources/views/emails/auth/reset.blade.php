@component('mail::message')
# Reset Password

A reset password link for {{ $email }} is down below

@component('mail::button', ['url' => route('password.reset', $token)])
    Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
