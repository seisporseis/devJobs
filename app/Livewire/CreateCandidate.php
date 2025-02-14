<?php

namespace App\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class CreateCandidate extends Component
{
    public $title;
    public $salary;
    public $category;
    public $company_name;
    public $expiring_day;
    public $description;
    public $image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company_name' => 'required',
        'expiring_day' => 'required',
        'description' => 'required',
        'image' => 'required|image|max:2048',
    ];

    public function createOffer()
    {
        $data = $this->validate();
    }

    public function render()
    {
        //Consultar DB
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.create-candidate', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
