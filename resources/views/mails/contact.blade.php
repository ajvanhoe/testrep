@component('mail::message')

<h3>{{ config('app.name', 'Maxdesign') }}</h3>
<strong>Name:</strong> {{ $data['name'] }}<br>
<strong>Email:</strong> {{ $data['email'] }}<br>
@if(isset($data['phone']))
<strong>Phone:</strong> {{ $data['phone'] }}<br>
@endif

<strong>Message</strong>
<hr>
{{ $data['message'] }}
<hr>

@component('mail::button', ['url' => route('welcome')])
Go to website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
