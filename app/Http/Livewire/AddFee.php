<?php

namespace App\Http\Livewire;

use App\Models\Fee;
use App\Models\Student;
use Livewire\Component;

class AddFee extends Component
{
    public $students, $student123, $fee123 = 0, $amount = 0 , $fee_type;

    public $selectedState = NULL;
    public $selectedFee = NULL;

    public function mount()
    {
        $this->students = Student::orderBy('name')->get();   
        $this->mystudent = collect();
        $this->student123 = null;
        $this->fee123 = 0;
        $this->amount = 0;
    }

    public function render()
    {
       
        return view('livewire.add-fee');
    }

    public function updatedSelectedState($student1)
    {
     
        if (!is_null($student1)) {
            $this->mystudent = Fee::where('username', '=', $student1)->orderBy('created_at', 'DESC')->get();
            $this->student123 = Student::where('username', '=', $student1)->first();
            $this->fee123 = 0;
            if($this->selectedFee <> null){
                $this->selectedFee = null;
            }
        }
    }

    public function updatedSelectedFee($fee)
    {
        
        if (!is_null($fee)) {
            $this->myfee = Fee::where('fee_type', '=', $fee)->where('username', '=', $this->student123->username)->orderBy('created_at', 'DESC')->get();
            $this->total = Fee::where('fee_type', '=', $fee)->where('username', '=', $this->student123->username)->orderBy('created_at', 'DESC')->first();
            $this->amount = 0;
            if($this->total <> null){
                $this->fee123 = $this->total->total;
               }else{
                $this->fee123 = 0;
               }
        }
    }

    public function updatingAmount($amount)
    {
        $this->amount = 0;
        $this->fee123 = 0;
        if($this->total <> null){
            $this->fee123 = $this->total->total;
           }else{
            $this->fee123 = 0;
           }
    }

    public function updatedAmount($amount)
    {

        if($amount <> ""){
            $fees = $this->fee123 ;
            $this->fee123= $fees + $amount;
        }else{
            $this->fee123 = 0;
        }

    }
}
