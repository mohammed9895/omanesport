<x-mail::message>

# Welcome to {{ config('app.name') }}
Hello {{ $user->name }},
Thank you for registering with us. We are excited to have you on board!
You can now explore our features and connect with other members of the community.
Your account has been successfully created, but still not active, admin will activate your account soon.

<x-mail::button :url="'https://omanesport.test/club'">
Explore Now
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
