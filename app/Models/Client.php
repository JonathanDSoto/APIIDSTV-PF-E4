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
        'id_rates',
    ];

    public function rate()
    {
        return $this->belongsTo(Rate::class, 'id_rates');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'id_client');
    }
}