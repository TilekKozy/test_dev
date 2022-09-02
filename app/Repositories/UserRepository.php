<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserInterface;

final class UserRepository extends BaseRepository implements UserInterface
{

    public function __construct()
    {
        $this->model = new User();
    }

}
