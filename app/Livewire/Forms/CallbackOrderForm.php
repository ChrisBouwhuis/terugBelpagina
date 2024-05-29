<?php

namespace App\Livewire\Forms;

use App\Models\CallbackOrder;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CallbackOrderForm extends Form
{
    #[Validate('required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]*$/', 'min:2')]
    public $firstName;

    #[Validate('required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]*$/')]
    public $lastName;

    #[Validate('required', 'string', 'max:255', 'regex:/^[0-9\s]*$/', 'min:10')]
    public $phone;

    #[Validate('required', 'string', 'email', 'max:255')]
    public $email;

    #[Validate('required', 'string', 'max:255')]
    public $comment;

    public function submit()
    {
        $this->validate();
        $callbackOrder = new CallbackOrder();
        $name = $this->firstName . " " . $this->lastName;
        $callbackOrder->name = $name;
        $callbackOrder->phone = $this->phone;
        $callbackOrder->email = $this->email;
        $callbackOrder->comment = $this->comment;
        $callbackOrder->save();
        $this->emit('orderCreated');
    }
    public function render()
    {
        return view('livewire.callback-order-form');
    }

    private function emit(string $string)
    {

    }
}
