<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_id',
        'vote'
    ];

    protected $primaryKey = 'review_id';

    public function review() {
        return $this->belongsTo(Review::class);
    }
}
