<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Achievement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The comments that belong to the user.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * The lessons that a user has access to.
     */
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    /**
     * The lessons that a user has watched.
     */
    public function watched()
    {
        return $this->belongsToMany(Lesson::class)->wherePivot('watched', true);
    }

    /**
     * The badges that a user has earned.
     */
    public function badges()
    {
        return $this->belongsToMany(Badge::class);
    }

    /**
     * The badges that a user has earned.
     */
    public function currentBadge()
    {
        return $this->belongsToMany(Badge::class)->orderBy('value','desc');
    }

    /**
     * The achievements that a user has.
     */
    public function achievements()
    {
        return $this->belongsToMany(Achievement::class);
    }


    public function getNextBadgeAttribute()
    {
        $currentBadgeValue = $this->currentBadge()->pluck('value')->first();
       
        return Badge::where('value','>',$currentBadgeValue)->orderBy('value','asc')->pluck('name')->first();
 
    }
    public function getCurrentBadgeAttribute()
    {
        return $this->currentBadge()->pluck('name')->first();
 
    }
    public function getRemainingNextBadgeAttribute()
    {
        $currentBadgeValue = $this->achievements()->count();
       
        $nextBadge = Badge::where('value','>',$currentBadgeValue)->orderBy('value','asc')->pluck('value')->first();
 
        return $nextBadge - $currentBadgeValue;
 
    }
    public function getUnlockedAchievementAttribute()
    {
        return $this->achievements()->pluck('name');
 
    }
    public function getnextAvailableAchievementsAttribute()
    {
        $achievements = Achievement::whereIn('id' ,$this->achievements()->pluck('id'))
                       ->groupBy('achievements_type_id')
                       ->selectRaw('achievements_type_id as type, max(value) as value')
                       ->get();
        $arra = [];
        foreach($achievements as $achievement){
          $name =  Achievement::where('achievements_type_id',$achievement->type)
            ->where('value','>',$achievement->value)
            ->orderBy('value','asc')
            ->pluck('name')
            ->first();
            $arra[]=$name;
        }

        return $arra;


 
    }
}