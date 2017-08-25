<?php

namespace App\Policies;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChannelPolicy
{
    use HandlesAuthorization;


    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function edit(User $user , Channel $channel)
    {
        //Check auth able to authenticate channel, return boolean
        return $user->id === $channel->user_id;
    }



    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(User $user , Channel $channel)
    {
        //Check auth able to authenticate channel, return boolean
        return $user->id === $channel->user_id;
    }
}
