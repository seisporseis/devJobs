<?php

namespace App\Livewire;

use App\Models\Candidate;
use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Carbon;

class EditCandidate extends Component
{
    public $title;
    public $salary;
    public $category;
    public $company_name;
    public $expiring_day;
    public $description;
    public $image;

    public function mount(Candidate $candidate)
    {
        $this->title = $candidate->title;
        $this->salary = $candidate->salary_id;
        $this->category = $candidate->category_id;
        $this->company_name = $candidate->company_name;
        $this->expiring_day = Carbon::parse($candidate->expiring_day)->format('Y-m-d');
        $this->description = $candidate->description;
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


