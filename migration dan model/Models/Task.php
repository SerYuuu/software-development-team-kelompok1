<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'team_id',
        'title',
        'status',
        'deadline'
    ];
    public function team() {
        return $this->belongsTo(Team::class);
    }
    public function assignee() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
