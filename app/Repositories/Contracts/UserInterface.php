<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

interface UserInterface extends RepositoryInterface
{
    public function SendMail($email,$target);
    public function ResetPassword($token,$password);
    public function findOrCreateUser($user, $provider);
}