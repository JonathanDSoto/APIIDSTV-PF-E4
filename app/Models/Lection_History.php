<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lection_History extends Model
{
    use HasFactory;

    protected $fillable = [
        'lection_id',
        'user_id',
        'instructor_id',
        'completed',
    ];

    public function lection()
    {
        return $this->belongsTo(Lection::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }
}
