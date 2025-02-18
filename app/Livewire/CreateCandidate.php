<?php

namespace App\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use App\Models\Candidate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

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

        //Store image
        $image = $this->image->store('public/candidates');
        $data['image'] = str_replace('public/candidates', '', $image);

        //Create candidate
        Candidate::create([
            'title' => $data['title'],
            'salary_id' => $data['salary'],
            'category_id' => $data['category'],
            'company_name' => $data['company_name'],
            'expiring_day' => $data['expiring_day'],
            'description' => $data['description'],
            'image' => $data['image'],
            'user_id' => Auth::user()->id,
        ]);

        //Create message
        session()->flash('message', 'Candidate created successfully!');

        //Redirect user
        return redirect()->route('candidates.index');
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
