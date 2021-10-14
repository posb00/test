<?php

namespace App\Http\Controllers;

use App\Events\CommentWritten;
use App\Events\LessonWatched;
use App\Models\Comment;
use App\Models\Lesson;
use App\Models\Badge;
use App\Models\User;

class AchievementsController extends Controller
{
    public function index(User $user)
    {
        return response()->json([
            'unlocked_achievements' => $user->unlocked_achievement,
            'next_available_achievements' => $user->next_available_achievements,
            'current_badge' => $user->current_badge,
            'next_badge' => $user->next_badge,
            'remaing_to_unlock_next_badge' => $user->remaining_next_badge
        ]);
    }

    public function nextAvailableAchievements($id)
    {
        $archievements = User::query()
            ->join('achievement_user', 'achievement_user.user_id', '=', 'user_id')
            ->join('achievements', 'achievements.id', '=', 'achievement_user.achievement_id')
            ->groupBy('achievements.achievements_type_id')
            ->selectRaw('max(achievements.id) as id,achievements.achievements_type_id')
            ->get();

        return $archievements;

        //  $nexts = DB::table('achivements')->whereIn($archievements)->get();
    }

    public function call()
    {
        $comment = new Comment();
        $comment->fill([
            'body' => 'primer comentario',
            'user_id' => 1,
        ]);

        event(new CommentWritten($comment));

    }

    public function callLesson()
    {
        $lesson = Lesson::find(4);
        $user = User::find(1);

        event(new LessonWatched($lesson, $user));

    }
}