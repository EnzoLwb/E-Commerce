<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2019/1/8
 * Time: 10:36
 */

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function creating(User $user)
    {
        $user->verification_token=str_random(30);
    }
}
