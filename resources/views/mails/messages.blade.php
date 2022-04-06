@component('mail::message')
# Nuovo messaggio
<p>Email: {{$contact['email']}}</p>
<p>Messaggio: {{$contact['message']}}</p>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
