<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Candidate;
use Livewire\WithFileUploads;
use App\Notifications\NewApply;
use Illuminate\Support\Facades\Auth;

class ApplyVacancy extends Component
{
    use WithFileUploads;
    public $cv;
    public $candidate;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Candidate $candidate)
    {
       $this->candidate = $candidate;
    }

    public function apply()
    {
        $data = $this->validate();

        //Store CV
        $cv = $this->cv->store('public/cv');
        $data['cv'] = str_replace('public/cv', '', $cv);

        //Create apply
        $this->candidate->applies()->create([
            'cv' => $data['cv'],
            'user_id' => Auth::id(),
        ]);

        //Notify recruiter
        $this->candidate->recruiter->notify(new NewApply($this->candidate->id, $this->candidate->title, Auth::id()));

        //Create message
        session()->flash('message', 'Apply created successfully!');
        return redirect()->back();
    }

    public function render()
    {

        return view('livewire.apply-vacancy');
    }
}
