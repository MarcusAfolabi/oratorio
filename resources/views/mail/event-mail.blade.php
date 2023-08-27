<x-mail::message>
# Hi {{ $event->fullname }}

Thank you for your interest in attending the annual festive of praise and worship. This year event promised to be one of the kind. 
Invite your friends and family. Share the flyer and support the event financially.
God Bless You
<x-mail::button :url="'https://www.youtube.com/@oratoriogroup'">
Watch Oratorio 2022
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
