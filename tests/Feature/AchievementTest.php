<?php

namespace Tests\Feature;

use App\Models\Badge;
use App\Models\Comment;
use App\Models\User;
use Tests\TestCase;

class AchievementTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_endpoint()
    {
        $user = User::factory()->create();
        $badges = Badge::all();
        $user->badges()->attach(1);

        $response = $this->get("/users/{$user->id}/achievements");

        $response->assertStatus(200);
    }

    public function test_endpointWithOneAchievements()
    {
        $user = User::factory()->create();
        $user->badges()->attach(1);

        $comment = Comment::factory()->create([
            'user_id' => $user->id]
        );
        $achievemnt = $user->achievements()->attach(6);

        $response = $this->get("/users/{$user->id}/achievements");

        $response->assertStatus(200)->assertExactJson([
            'unlocked_achievements' => [
                'First Comment Written',
            ],
            'next_available_achievements' => [
                '3 Comments Written',
            ],
            'current_badge' => 'Beginner',
            'next_badge' => 'Intermediate',
            'remaing_to_unlock_next_badge' => 3,
        ]);
    }

    public function test_endpointWithMultipleAchievements()
    {
        $user = User::factory()->create();
        $comment = Comment::factory()->create([
            'user_id' => $user->id]
        );
        $user->achievements()->attach([1, 2, 3, 6, 7, 8]);
        $user->badges()->attach([1, 2]);

        $response = $this->get("/users/{$user->id}/achievements");

        $response->assertStatus(200)->assertJson([
            'current_badge' => 'Intermediate',
            'next_badge' => 'Advanced',
            'remaing_to_unlock_next_badge' => 2,
        ]);
    }

    public function test_endpointWithAllAchievements()
    {
        $user = User::factory()->create();

        $comment = Comment::factory()->create([
            'user_id' => $user->id]
        );

        $user->achievements()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $user->badges()->attach([1, 2, 3, 4]);

        $response = $this->get("/users/{$user->id}/achievements");

        $response->assertStatus(200)->assertJson([
            'next_available_achievements' => [],
            'current_badge' => 'Master',
            'next_badge' => null,
            'remaing_to_unlock_next_badge' => 0,
        ]);
    }

}