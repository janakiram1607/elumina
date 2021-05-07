@component('mail::message')
# {{ $mailData['title'] ?? '' }}

Your WorkFlow is Rejected{{ $mailData['msg'] ?? '' }} by the Admin.

Thanks,<br>
{{ config('app.name') }}
@endcomponent