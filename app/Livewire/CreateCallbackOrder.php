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

        CallbackOrder::create(
            $this->form->all()
        );
    }

    public function render()
    {
        return view('livewire.create-callback-order');
    }
}
