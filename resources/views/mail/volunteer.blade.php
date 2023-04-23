<x-mail::message>

<center> <a href="https://oratoriogroup.org">
<img src="http://oratorio.test/email_header.png" alt="Oratorio logo" /></a>
</center>
<br>
<br> 

# Dear {{ $volunteer->firstname }},

We are delighted to welcome you to Oratorio and extend our heartfelt gratitude for your willingness to join us in making our upcoming event and annual anniversary a success.

Your decision to volunteer [{{ $volunteer->department }}] with us means a lot to our organization and the community we serve. We believe that your dedication, passion, and enthusiasm will make a significant impact in our efforts to create a positive change in the world.

We are committed to ensuring that your volunteering experience with us is both enjoyable and fulfilling. Our team is dedicated to providing a welcoming and supportive environment where you can contribute your skills, talents, and time towards achieving our mission.

Once again, we thank you for your commitment to Oratorio and look forward to working with you towards a common goal. If you have any questions or concerns, please do not hesitate to reach out to us.

Sharon
 
Volunteer Coordinator,<br>
{{ config('app.name') }}
</x-mail::message>
