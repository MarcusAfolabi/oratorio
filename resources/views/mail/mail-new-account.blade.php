<x-mail::message>

<center> <a href="https://oratoriogroup.org">
<img src="http://oratorio.test/email_header.png" alt="Oratorio logo" /></a>
</center>
<br>
<br> 

# Dear {{ $user->name }},

We are thrilled to have you as a member of the Oratorio Music Foundation. Your account has been created, and you can now access the site to register for classes, view your schedules, and manage your account information.

To get started, please follow the steps below:

Go to the Oratorio Music Foundation Verify page: <a href="https://oratorio.test/register">Visit Verify Page</a>

Enter your email address as provided below:

Email: {{ $user->email }} 

Click on the <b>"Verify"</b> button.

You will be prompted to create a new password. Please choose a secure password and remember it for future logins.

Once you have successfully logged in, you can register for webinars, volunteer, events, conferences, concert, download musics and videos, view your schedules, connect with influencers and funders and manage your account information.

If you have any questions or need assistance, please don't hesitate to contact us at <a href="helpdesk@oratoriogroup.org">Support</a>


<x-mail::button :url="'https://oratorio.test/register'">
Verify now
</x-mail::button>

Thank you for choosing Oratorio Music Foundation. We look forward to helping you achieve your musical goals!<br>

{{ config('app.name') }}
</x-mail::message>
