<div class="mt-4">
    <h4 class="mb-4">Contactez nous</h4>

    @include('shared.flash')

    <form action="{{ route('propriete.contact', $propriete) }}" method="post" class="flex flex-col gap-3">
        @csrf
        <div class="w-1/3 p-2 bg-gray-800 border rounded border-gray-600">
            @include('shared.input', [
                'class' => 'flex',
                'label' => 'Nom',
                'name' => 'lastname',
                'value' => 'Nomnom',
            ])
            @include('shared.input', [
                'class' => 'flex mt-1 ',
                'label' => 'Prénom',
                'name' => 'firstname',
                'value' => 'Prenomnom',
            ])
        </div>
        <div class="w-1/3 p-2 bg-gray-800 border rounded border-gray-600">
            @include('shared.input', [
                'class' => 'flex',
                'label' => 'Téléphone',
                'name' => 'phone',
                'value' => '060606060',
            ])
            @include('shared.input', [
                'type' => 'email',
                'class' => 'flex mt-1',
                'label' => 'Email',
                'name' => 'email',
                'value' => 'email@email.com',
            ])
        </div>
        <div class="w-1/3 p-2 bg-gray-800 border rounded border-gray-600">
            @include('shared.input', [
                'type' => 'textarea',
                'class' => 'flex',
                'label' => 'Message',
                'name' => 'message',
                'value' => 'J\'ai vraiment rien adire',
            ])
        </div>
        <div>
            <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                Prise de contact
            </button>
        </div>
    </form>
</div>