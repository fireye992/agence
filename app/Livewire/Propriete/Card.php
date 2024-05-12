<?php

namespace App\Livewire\Propriete;

use Livewire\Component;

class Card extends Component
{
    public function render()
    {
        return view('livewire.propriete.card');
    }
    public $propriete;
}
