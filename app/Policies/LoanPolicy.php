<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Loan;
use App\Enums\UserRole;

class LoanPolicy
{
    /**
     * Create a new policy instance.
     */
    public function view()
    {
        return $user->role === UserRole::Admin || $user->id === $loan->user_id;
    }

    public function approve()
    {
        return $user->role === UserRole::Admin;
    }
}
