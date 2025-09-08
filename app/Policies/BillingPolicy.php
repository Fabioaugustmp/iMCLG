<?php

namespace App\Policies;

use App\Models\Billing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BillingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Anyone can view the list, we will filter it in the controller
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Billing $billing): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        // Assuming a user belongs to a company and a billing belongs to a property which belongs to a company
        return $user->company_id === $billing->property->company_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'admin' || $user->role === 'company';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Billing $billing): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        return ($user->role === 'company' && $user->company_id === $billing->property->company_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Billing $billing): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        return ($user->role === 'company' && $user->company_id === $billing->property->company_id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Billing $billing): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Billing $billing): bool
    {
        return $user->role === 'admin';
    }
}
