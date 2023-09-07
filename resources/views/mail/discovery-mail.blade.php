<x-mail::message>
# Hi {{ $discovery->fullname }}

Thank you for signing up for our exciting Discovery Session! We're thrilled to have you on board as we delve into a world of knowledge and exploration. 

Mark your calendar for the big day on September 21st, where we'll be preparing an engaging and insightful discovery session just for you. 

Stay tuned for updates and click the button below to make sure you're fully prepared for this unforgettable experience!


<x-mail::button :url="'https://www.youtube.com/@oratoriogroup'">
Watch Our Performances
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
