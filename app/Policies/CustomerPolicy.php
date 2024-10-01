<?php
namespace App\Policies;

use App\Models\Customer;
use App\Models\User;

class CustomerPolicy
{
    public function view(User $user, Customer $customer)
    {
        // Allow if the user is viewing their own data or if they are an admin
        return $user->id === $customer->id || $user->isAdmin();
    }

    public function update(User $user, Customer $customer)
    {
        // Allow if the user is updating their own data or if they are an admin
        return $user->id === $customer->id || $user->isAdmin();
    }
}
