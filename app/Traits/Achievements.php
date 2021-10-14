<?php
namespace App\Traits;

use App\Events\AchievementUnlocked;
use App\Models\Achievement;
use App\Models\User;

trait Achievements
{

    public static function saveAchievements(Achievement $achievement, User $user)
    {

        //save achievement to user
        $user->achievements()->attach($achievement->id);

        //call event
        event(new AchievementUnlocked($achievement->name, $user));
    }

}