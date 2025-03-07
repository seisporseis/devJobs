<?php

namespace App\Livewire;

use App\Models\Candidate;
use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;

class EditCandidate extends Component
{
    public $title;
    public $salary;
    public $category;
    public $company_name;
    public $expiring_day;
    public $description;

    public function mount(Candidate $candidate)
    {
        $this->title = $candidate->title;
        $this->salary = $candidate->salary_id; 
        
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


