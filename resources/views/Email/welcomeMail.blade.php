@component('mail::message')
{{ $mailInfo['title'] }}

Congratulations! Your account has been created.

Here's your verification token: {{ $mailInfo['token'] }}

@component('mail::button', ['url' => $mailInfo['url']])
Click to verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
