<x-mail::message>
# PRegistre Password

Votre mot de passe pour vous connecter est: {{ $plainPassword }}

<x-mail::button :url="''">
Se connecter
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
