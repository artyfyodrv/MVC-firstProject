<?php

namespace App\Kernel;

use App\Entities\User;

class LoginValidation
{
    protected ?array $loginValidErrors = null;

    public function validateForms(User $user): ?array

}