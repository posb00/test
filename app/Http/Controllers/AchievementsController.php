<?php

namespace App\Http\Controllers;

use App\Events\CommentWritten;
use App\Models\Comment;
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
            'remaing_to_unlock_next_badge' => $user->remaining_next_badge,
        ]);
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