<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class StudentUsername extends Component
{
    public $name = null,$username = null, $email = null ;

    public function mount()
    {
        $this->name = null;
        $this->username = null;
        $this->email = null;
    }

    public function updatedName($name)
    {
        $digits = 1;
        $random= rand(pow(9, $digits-1), pow(9, $digits)-1);

        $digits2 = 3;
        $random2 = rand(pow(3, $digits2-1), pow(7, $digits2)-1);
        $name2 = Str::substr($name, 0, $random);
        $this->username = $name2."_".$random2;
    }



    public function render()
    {
        return view('livewire.student-username');
    }
}
