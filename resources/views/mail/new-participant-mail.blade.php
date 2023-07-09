<x-mail::message>
# Welcome to Audition 1.0

You have taken the bold step of faith to join Oratorio Music Foundation.

The handbook would guide and help you to understand what Oratorio is, and prepare you for the next phase.
Ensure you read and understand the handbook before you take the quiz

<x-mail::button :url="'https://oratoriogroup.org/ORATORIO_MUSIC_FOUNDATION_HANDBOOK.pdf'">
Download Handbook
</x-mail::button>


<hr>
If you have already read and understood the handbook, you can start your test here. It's approximately 10mint
<x-mail::button :url="'https://oratoriogroup.org/auditions/test?email=' . $participant->email">
Take Audition Test
</x-mail::button>


Good Luck,<br>
{{ config('app.name') }}
</x-mail::message> 