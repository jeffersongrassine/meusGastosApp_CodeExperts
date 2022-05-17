<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;

class ExpenseEdit extends Component
{
   
    public Expense $expense;

    public $amount;
    public $description;
    public $type;

    protected $rules = [
            'amount'       => 'required',
            'description'   => 'required',
            'type'          => 'required',
    ];

    public function mount(/*Expense $expense*/)
    {

        $this->amount       = $this->expense->amount;
        $this->description  = $this->expense->description;
        $this->type         = $this->expense->type;
   
    }
    
    public function updateExpense()
    {
       
        $this->validate();

        $this->expense->update([
            'amount'        => $this->amount,
            'description'   => $this->description,
            'type'          => $this->type
        ]);
    
        session()->flash('message', 'Registro atualizado com sucesso!');
        
        // $this->amount = $this->type = $this->description = null;

    }

    public function render()
    {
        return view('livewire.expense.expense-edit');
    }
}
