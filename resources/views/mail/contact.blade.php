<x-mail::message>
    
<center> <a href="https://oratoriogroup.org">
<img src="http://oratorio.test/email_header.png" alt="Oratorio logo" /></a>
</center>
<br>
<br> 

# Hi {{ $contact->fullname }},

Thank you for contacting Oratorio. We have received your message and we appreciate your interest in our organization.

Our team will review your message and get back to you as soon as possible. Please allow up to 2 business days for a response, although we will do our best to respond sooner if possible.

In the meantime, if you have any additional questions or concerns, please do not hesitate to contact us. We would be happy to assist you in any way we can.

Thank you again for contacting us. We look forward to speaking with you soon.

<x-mail::button :url="''">
Button Text
</x-mail::button>
Best regards,<br>
{{ config('app.name') }}
</x-mail::message>
