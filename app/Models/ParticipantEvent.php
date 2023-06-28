<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ParticipantEvent extends Model
{
    use HasFactory;
    protected $table = 'participant_event';

    public function scores(): HasMany
    {
        return $this->hasMany(Score::class);
    }

    public function participant(): BelongsTo {
        return $this->belongsTo(Participant::class);
    }

    public function event(): BelongsTo {
        return $this->belongsTo(Event::class);
    }
}
