<?php
namespace App\Listeners;

use App\Events\LectionCreated;
use App\Models\LectionHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveLectionToHistory implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(LectionCreated $event)
    {
        LectionHistory::create([
            'lection_id' => $event->lection->id,
            'user_id' => $event->lection->user_id,
            'instructor_id' => $event->lection->instructor_id,
            'completed' => false,
        ]);
    }
}