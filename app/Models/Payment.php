<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'date',
        'id_rates',
        'id_client',
    ];

    public function rates()
    {
        return $this->belongsTo(Rate::class, 'id_rates');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
}