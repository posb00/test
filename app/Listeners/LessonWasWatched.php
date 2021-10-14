<?php

namespace App\Listeners;

use App\Events\LessonWatched;
use App\Models\Achievement;
use App\Models\User;
use App\Traits\Achievements;

class LessonWasWatched
{
    use Achievements;
    private $type = 1;
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
     * @param  LessonWatched  $event
     * @return void
     */
    public function handle(LessonWatched $event)
    {

        //update watched Lesson
        try {

            $event->user->lessons()->updateExistingPivot($event->lesson->id, ['watched' => true]);

        } catch (\Throwable $th) {
            abort('Error' . $th, 500);
        }

        $this->unlockLessonAchievement($event->user);

    }

    public function unlockLessonAchievement(User $user)
    {
        try {
                    //count Lessons watched for the users
        $lessonCount = $user->watched()->count();

        //check if lessons counts unlock an achievement
        $achievement = Achievement::query()
            ->where('value', $lessonCount)
            ->where('achievements_type_id', $this->type)
            ->first();

        } catch (\Throwable $th) {
            abort('Error ' .$th, 500);
        }

        //if Lessons watched unlock an achievent call trait to save achievements and call event
        if ($achievement) {

            Achievements::saveAchievements($achievement, $user);

        }
    }
}