<?php

namespace App\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use App\Models\Candidate;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class EditCandidate extends Component
{
    public $candidate_id;
    public $title;
    public $salary;
    public $category;
    public $company_name;
    public $expiring_day;
    public $description;
    public $image;
    public $new_image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company_name' => 'required',
        'expiring_day' => 'required',
        'description' => 'required',
        'new_image' => 'nullable|image|max:2048',
    ];

    public function mount(Candidate $candidate)
    {   
        $this->candidate_id = $candidate->id;
        $this->title = $candidate->title;
        $this->salary = $candidate->salary_id;
        $this->category = $candidate->category_id;
        $this->company_name = $candidate->company_name;
        $this->expiring_day = Carbon::parse($candidate->expiring_day)->format('Y-m-d');
        $this->description = $candidate->description;
        $this->image = $candidate->image;
    }

    public function editOffer()
    {
        $data = $this->validate();

        if($this->new_image) {
            $image = $this->new_image->store('public/candidates');
            $data['image'] = str_replace('public/candidates', '', $image);
        }

        $candidate = Candidate::find($this->candidate_id);

        $candidate->title = $data['title'];
        $candidate->salary_id = $data['salary'];
        $candidate->category_id = $data['category'];
        $candidate->company_name = $data['company_name'];
        $candidate->expiring_day = $data['expiring_day'];
        $candidate->description = $data['description'];
        $candidate->image = $data['image'] ?? $candidate->image;

        $candidate->save();

        session()->flash('message', 'Candidate updated successfully!');
        return redirect()->route('candidates.index');
    
    }

    public function render()
    {
        //Consultar DB
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.edit-candidate', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    } 
}


