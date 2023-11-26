<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_clients',
        'date',
    ];

    public function clients()
    {
        return $this->belongsTo(Client::class, 'id_clients');
    }
}