<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insight extends Model
{
    protected $fillable = [
        'target_id',
        'type',
        'content',
        'score'
    ];
    
    public function target() {
        return $this->morphTo();
    }
}
