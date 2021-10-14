<?php

namespace App\Listeners;
use App\Models\Badge;
use App\Events\BadgeUnlocked;

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
        $achievementsCount = $event->user->achievements()->count();
        
        $badge = Badge::where('value',$achievementsCount)->first();

        if($badge){
            $event->user->badges()->attach($badge->id);
            event(new BadgeUnlocked($badge->name, $event->user));
        }

    }
}