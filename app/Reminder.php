<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = [
        'lead_id',
        'user_id',
        'reminder',
        'reminder_date',
        'note',
        'status',
    ];

    public function getStatusAttribute(string $status)
    {
        return ucwords($status);
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id', 'id');
    }

    public function markAsCompleted()
    {
        $this->update(
            [
                'status' => 'completed',
            ]
        );
    }
}
