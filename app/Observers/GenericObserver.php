<?php

namespace App\Observers;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GenericObserver
{
    public function created(Model $model): void
    {
        $this->logActivity($model, 'created');
    }

    public function updated(Model $model): void
    {
        $changes = $model->getChanges();
        $this->logActivity($model, 'updated', $changes);
    }

    public function deleted(Model $model): void
    {
        $this->logActivity($model, 'deleted');
    }

    public function restored(Model $model): void
    {
        $this->logActivity($model, 'restored');
    }

    public function forceDeleted(Model $model): void
    {
        $this->logActivity($model, 'force_deleted');
    }

    protected function logActivity(Model $model, string $event, array $changes = null)
    {
        ActivityLog::create([
            'model_type' => get_class($model),
            'model_id' => $model->id,
            'event' => $event,
            'changes' => $changes ? json_encode($changes) : null,
            'user_id' => Auth::check() ? Auth::user()->id : null,
            'created_at' => now(),
        ]);
    }
}
