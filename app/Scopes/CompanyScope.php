<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class CompanyScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if (Auth::hasUser()) {
            $user = Auth::user();

            // Admin users can see all data
            if ($user->role === 'admin') {
                return;
            }

            // Managers can see all data within their company
            if ($user->role === 'manager') {
                $builder->where($model->getTable() . '.company_id', $user->company_id);
                return;
            }

            // Regular users can only see their own assets within their company
            if ($user->role === 'user') { // Assuming 'user' as regular user role
                $builder->where($model->getTable() . '.company_id', $user->company_id)
                        ->where($model->getTable() . '.user_id', $user->id);
                return;
            }

            // Default: if no specific role, apply company_id filter
            $builder->where($model->getTable() . '.company_id', $user->company_id);
        }
    }
}
