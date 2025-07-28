<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendee extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function user(): BelongsTo
    {
        // This method defines a relationship where an attendee belongs to a user.
        // It returns an instance of BelongsTo, linking the Attendee model to the User
        // model through the user_id foreign key.
        return $this->belongsTo(User::class);
    }

    public function event(): BelongsTo
    {
        // This method defines a relationship where an attendee belongs to an event.
        // It returns an instance of BelongsTo, linking the Attendee model to the Event
        // model through the event_id foreign key.
        return $this->belongsTo(Event::class);
    }
}
