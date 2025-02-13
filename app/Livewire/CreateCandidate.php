<?php

namespace App\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;

class CreateCandidate extends Component
{
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
