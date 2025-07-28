<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_time',
        'end_time',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        // This method defines a relationship where an event belongs to a user.
        // It returns an instance of BelongsTo, linking the Event model to the User model
        // through the user_id foreign key.
        return $this->belongsTo(User::class);
    }

    public function attendees(): HasMany
    {
        // This method defines a relationship where an event can have many attendees.
        // It returns an instance of HasMany, linking the Event model to the Attendee model
        // through the event_id foreign key.
        return $this->hasMany(Attendee::class);
    }
}
