<?php

namespace App\Policies;

use App\Models\Meal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MealPolicy
{
    use HandlesAuthorization;

    public function deleteMeal(User $user, Meal $meal)
    {
        return $user->id === $meal->user_id;
    }
}
