@component('mail::message')

Your Accountant profile of example.com was created.

Name : {{$name}}
Username : {{$username}}
Password : {{$password}}


@component('mail::button', ['url' => '#'])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent