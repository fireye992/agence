<x-mail::message>
# Demande de contact

Une personne est interressé par un de vos biens 
<a href="{{ route('propriete.show', ['slug' => $propriete->getSlug(), 'propriete' => $propriete]) }}">{{ $propriete->title }}</a>.

- Nom : {{  $data['lastname'] }}
- Prénom : {{ $data['firstname'] }}
- Téléphone : {{ $data['phone'] }}
- Email : {{ $data['email'] }}

**Message :**<br/>
{{ $data['message'] }}

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

{{-- Thanks,<br>
{{ config('app.name') }} --}}
</x-mail::message>
