{{-- @component('mail::message') --}}

Hello **{{ $name }}**, {{-- use double space for line break --}}
Thank you for choosing TriDP!
mail:{{ $mail }}
Click below to start working right now

Subject:From {{ $subject }}

Message: {{ $textMessage }}


Sincerely,
TriDP.
{{-- @endcomponent --}}
