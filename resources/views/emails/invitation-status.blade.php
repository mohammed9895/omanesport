<x-mail::message>

Hello {{ $club->name }},
<br>
The invitation to join the club for {{ $member->name }} has been {{ $member->status == \App\Enums\MemberStatus::Accepted  ? 'Accepted' : 'Rejected' }}.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
