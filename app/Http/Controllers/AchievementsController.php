<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;

class AchievementsController extends Controller
{
    public function index(User $user)
    {
        return response()->json([
            'unlocked_achievements' => $this->unlocked_archievements($user->id),
            'next_available_achievements' => $this->next_available_achievements($user->id),
            'current_badge' => '',
            'next_badge' => '',
            'remaing_to_unlock_next_badge' => 0,
        ]);
    }

    public function unlocked_archievements($id)
    {
        $archievements = User::query()
            ->join('achievement_user', 'achievement_user.user_id', '=', 'user_id')
            ->join('achievements', 'achievements.id', '=', 'achievement_user.achievement_id')
            ->pluck('achievements.name');

        return $archievements;
    }

    public function next_available_achievements($id)
    {
        // $archievements = User::query()
        //     ->join('achievement_user', 'achievement_user.user_id', '=', 'user_id')
        //     ->join('achievements', 'achievements.id', '=', 'achievement_user.achievement_id')
        //     ->groupBy('achievements.achievements_type_id')
        //     ->selectRaw('max(achievements.id) as id,achievements.achievements_type_id')
        //     ->get();

        

        return $archievements;

      //  $nexts = DB::table('achivements')->whereIn($archievements)->get();
    }
}