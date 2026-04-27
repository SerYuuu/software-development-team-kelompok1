<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function members() {
        return $this->belongsToMany(User::class, 'team_members', 'team_id', 'user_id')
                    ->withPivot('role', 'status_online')
                    ->withTimestamps();
    }
    public function tasks() {
        return $this->hasMany(Task::class);
    }
    public function insights() {
        return $this->morphMany(Insight::class, 'target');
    }
}
