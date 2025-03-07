<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;

class ShowCandidates extends Component
{
    public function render()
    {
        $candidates = Candidate::where('user_id', Auth::user()->id)->paginate(10); 
        return view('livewire.show-candidates', [
            'candidates' => $candidates
        ]);
    }
}
