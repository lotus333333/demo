<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

//用于用户更新时的权限管理
class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    use HandlesAuthorization;
    public  function update(User $user, User $currentUser)
    {
        return $currentUser->id===$user->id;
    }
    public function __construct()
    {
        //
    }
}
