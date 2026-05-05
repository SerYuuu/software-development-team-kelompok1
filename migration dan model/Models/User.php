<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar-color'
    ];
    protected $hidden = [
        'password'
    ];

    public function teams() {
        return $this->belongsToMany(Team::class, 'team_members', 'user_id', 'team_id')
                    ->withPivot('role', 'status_online')
                    ->withTimestamps();
    }
    public function tasks() {
        return $this->hasMany(Task::class, 'user_id');
    }
    public function attendances() {
        return $this->hasMany(Attendance::class);
    }
    public function insights() {
        return $this->morphMany(Insight::class, 'target');
    }
    public function notifications() {
        return $this->hasMany(Notification::class);
    }
}
