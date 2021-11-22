<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

interface UserInterface extends RepositoryInterface
{
    public function SendMail($email);
    public function ResetPassword($email, $token,$password);
}
