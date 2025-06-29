<x-mail::message>

# Hello {{ $gamer->fullname }}
You have received an invitation to join the club {{ $club->name }}.
Click the button below to view the invitation details and accept or decline the invitation.

<x-mail::button :url="env('APP_URL') . '/gamer/invitations/'">
View Invitation
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
