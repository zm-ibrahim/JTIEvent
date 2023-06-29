<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function judges(): BelongsToMany
    {
        return $this->belongsToMany(Judge::class, 'judge_event');
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(Participant::class);
    }

    public function participantEvent(): HasMany
    {
        return $this->hasMany(ParticipantEvent::class);
    }
}
