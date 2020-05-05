<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'age',
        'interested_package',
        'dob',
        'branch_id',
        'added_by',
    ];

    public function reminders()
    {
        return $this->hasMany(Reminder::class, 'lead_id', 'id')
                    ->latest();
    }
}
