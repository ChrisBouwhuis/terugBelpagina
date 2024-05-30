<?php

namespace App\Livewire;

use App\Livewire\Forms\CallbackOrderForm;
use App\Models\CallbackOrder;
use Livewire\Component;

class CreateCallbackOrder extends Component
{
    public CallbackOrderForm $form;

    public function save()
    {
        $this->form->validate();

        // om voornaam en achternaam samen te voegen
        $name = $this->form->firstName . " " . $this->form->lastName;

        CallbackOrder::create([
            'name' => $name,
            'phone' => $this->form->phone,
            'email' => $this->form->email,
            'comment' => $this->form->comment,
        ]);

        session()->flash('success', 'Order created successfully');
        $this->redirect(route('success'));
    }

    public function render()
    {
        return view('livewire.create-callback-order');
    }
}
