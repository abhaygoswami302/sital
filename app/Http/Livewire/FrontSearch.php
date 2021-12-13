<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class FrontSearch extends Component
{
    public $searchTerm;
    public $students = [];
    public function render()
    {
        if($this->searchTerm <> ""){
            $searchTerm = '%' . $this->searchTerm . '%';
            $this->students = Student::where('name', 'like', $searchTerm)
                                    ->orWhere('username', 'like', $searchTerm)
                                    ->orWhere('status', 'like', $searchTerm)
                                    ->get();
        }else{
            $this->students = [];
        }
        return view('livewire.front-search');
    }
}
