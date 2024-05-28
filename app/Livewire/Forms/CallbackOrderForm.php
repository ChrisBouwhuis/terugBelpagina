<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CallbackOrderForm extends Form
{
public $firstName;
    public $lastName;
    public $phone;
    public $email;
    public $comment;

    public function submit()
    {
        $this->validate([
            'firstName' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]*$/'],
            'lastName' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]*$/'],
            'phone' => ['required', 'string', 'max:255', 'regex:/^[0-9\s]*$/', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'comment' => ['required', 'string', 'max:255'],
        ]);
        // TODO: fix this
        $callbackOrder = new CallbackOrder();
        $name = $this->firstName . " " . $this->firstName;
        $callbackOrder->name = $name;
        $callbackOrder->phone = $this->phone;
        $callbackOrder->email = $this->email;
        $callbackOrder->comment = $this->comment;
        $callbackOrder->save();
        return redirect('/success');
    }

    public function render()
    {
        //TODO: render the view
        return view('livewire.callback-order-form');
    }
}
