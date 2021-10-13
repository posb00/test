<?php

namespace App\Listeners;

use App\Events\CommentWritten;
use App\Models\Achievement;
use App\Models\Comment;
use App\Models\User;
use App\Traits\Achievements;
use DB;

class CommentWasWritten
{
    use Achievements;

    private $type = 2;
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
     * @param  CommentWritten  $event
     * @return void
     */
    public function handle(CommentWritten $event)
    {
        //save comments and return user if exist
        $user = DB::transaction(function () use ($event) {

            //verify if users exist
            $user = User::findOrFail($event->comment->user_id);

            Comment::create([
                'body' => $event->comment->body,
                'user_id' => $event->comment->user_id,
            ]);

            return $user;

        });

        $this->verifyCommentsUnlockAchievements($user);

    }

    public function verifyCommentsUnlockAchievements(User $user)
    {
        //count comments for the users
        $commentsCount = $user->comments()->count();

        //check if comments counts unlock an achievement
        $achievement = Achievement::query()
            ->where('value', $commentsCount)
            ->where('achievements_type_id', $this->type)
            ->first();

        //if comments unlock an achievent call trait to save achievements and call event
        if ($achievement) {

            Achievements::saveAchievements($achievement, $user);

        }
    }
}