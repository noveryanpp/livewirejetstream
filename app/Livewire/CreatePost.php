<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class CreatePost extends ModalComponent
{
    public function render()
    {
        return view('livewire.create-post');
    }
}
