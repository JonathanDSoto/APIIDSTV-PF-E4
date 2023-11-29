<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'memberships_id',
        'user_id',
        'date',
    ];

    public function membership()
    {
        return $this->belongsTo(Membership::class, 'memberships_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}