<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CallbackOrderForm extends Form
{
    #[Validate(['required', 'string', 'min:2', 'max:255'])]
    public $firstName;
    #[Validate(['required', 'string', 'max:255'])]
    public $lastName;
    #[Validate(['required', 'string', 'max:10', 'min:10'])]
    public $phone;
    #[Validate(['required', 'string', 'email:rfc,dns', 'max:255'])]
    public $email;
    #[Validate(['required', 'string', 'max:255'])]
    public $comment;
}
