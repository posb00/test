<?php

namespace App\Listeners;

class AchievementWasUnlocked
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //count comments for the users
        $commentsCount = $user->comments()->count();

        //count Lessons watched for the users
        $lessonCount = $user->watched()->count();

    }
}