<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Score extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function participantEvent(): BelongsTo {
        return $this->belongsTo(ParticipantEvent::class);
    }

    public function judge(): BelongsTo {
        return $this->belongsTo(Judge::class);
    }
}
