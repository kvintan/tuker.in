<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('About Us - Tuker.in')]
class About extends Component
{
    public function render()
    {
        return view('livewire.about');
    }
}
