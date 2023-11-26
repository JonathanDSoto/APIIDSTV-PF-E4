<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'roll',
        'rates_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'roll');
    }

    public function rate()
    {
        return $this->belongsTo(Rate::class, 'rates_id');
    }
}