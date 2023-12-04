<?php
namespace App\Events;

use App\Models\Lection;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LectionCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $lection;

    public function __construct(Lection $lection)
    {
        $this->lection = $lection;
    }
}