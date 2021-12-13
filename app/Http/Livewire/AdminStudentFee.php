<?php

namespace App\Http\Livewire;

use App\Models\Fee;
use App\Models\Student;
use Livewire\Component;

class AdminStudentFee extends Component
{
    public $student, $amount = 0, $total = null, $fee123 = 0, $SelectedFee = null;

    public function mount()
    {
        $this->SelectedFee = [];
        $this->amount = 0;
        $this->total = 0;
    }

    public function updatedSelectedFee($fee)
    {
        $this->amount = 0;
        $this->total = Fee::where('fee_type', '=', $fee)->where('username', '=', $this->student->username)->orderBy('created_at', 'DESC')->first();
        if($this->total <> null){
            $this->total = $this->total->total;
           }else{
            $this->total = 0;
           }
    }

    public function updatedAmount($amount)
    {
        $fee = Fee::where('fee_type', '=', $this->SelectedFee)
                        ->where('username', '=', $this->student->username)->orderBy('updated_at','DESC')->first();
        if($amount <> "" && $fee <> null){
            $fees = $fee->total ;
            $this->total= $fees + $amount;
        }else{
            $this->total = 0;
        }
                        
    }
    public function updatingAmount($amount)
    {

      if($this->total <> null){
            $this->total =  $this->total;
           }else{
            $this->total = 0;
           }
    }

    public function render()
    {
        return view('livewire.admin-student-fee');
    }
}
