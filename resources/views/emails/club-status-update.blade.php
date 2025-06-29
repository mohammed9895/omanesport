<x-mail::message>

Hello {{ $user->name }},
Your Club {{ $club->name }} has been {{ $club->status == \App\Enums\ClubStatus::Approved ? 'Approved' : 'Rejected' }}.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
