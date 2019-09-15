@component('mail::message')
# Introduction

    
<strong>Name</strong> {{ $data['name'] }}<br>
<strong>Email</strong> {{ $data['email'] }}<br>

<strong>Message</strong>
<hr>
{{ $data['message'] }}
<hr>

@component('mail::button', ['url' => ''])
Click here for nothing to happen
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

