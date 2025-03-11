<?php

namespace App\Livewire;

use Livewire\Component;

class ShowCandidate extends Component
{
    public $candidate;
    
    public function render()
    {
        return view('livewire.show-candidate');
    }
}
