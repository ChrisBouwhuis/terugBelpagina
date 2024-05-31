<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CallbackOrderForm extends Form
{
    #[Validate(['required', 'string', 'min:2', 'max:255'])]
    private $firstName;
    #[Validate(['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]*$/'])]
    private $lastName;
    #[Validate(['required', 'string', 'max:255', 'regex:/^[0-9\s]*$/', 'min:10'])]
    private $phone;
    #[Validate(['required', 'string', 'email', 'max:255'])]
    private $email;
    #[Validate(['required', 'string', 'max:255'])]
    private $comment;
}
