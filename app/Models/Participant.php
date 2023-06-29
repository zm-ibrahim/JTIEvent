<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Participant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'participant_event');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function participantEvent(): HasMany
    {
        return $this->hasMany(ParticipantEvent::class);
    }
}
