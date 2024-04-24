<?php

namespace Src\Domain\Deal\Policies;

use Src\Domain\Deal\Entities\Deal;
use Src\Domain\User\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DealPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Src\Domain\User\Entities\User  $user
     * @param  \Src\Domain\User\Entities\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Src\Domain\User\Entities\User  $user
     * @param  \Src\Domain\Deal\Entities\Deal  $deal
     * @return mixed
     */
    public function view(User $user, Deal $deal)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Src\Domain\User\Entities\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Src\Domain\User\Entities\User  $user
     * @param  \Src\Domain\Deal\Entities\Deal  $deal
     * @return mixed
     */
    public function update(User $user, Deal $deal)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Src\Domain\User\Entities\User  $user
     * @param  \Src\Domain\Deal\Entities\Deal  $deal
     * @return mixed
     */
    public function delete(User $user, Deal $deal)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Src\Domain\User\Entities\User  $user
     * @param  \Src\Domain\Deal\Entities\Deal  $deal
     * @return mixed
     */
    public function restore(User $user, Deal $deal)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Src\Domain\User\Entities\User  $user
     * @param  \Src\Domain\Deal\Entities\Deal  $deal
     * @return mixed
     */
    public function forceDelete(User $user, Deal $deal)
    {
        //
    }
}
