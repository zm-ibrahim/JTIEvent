<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Participant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function events(): BelongsToMany {
        return $this->belongsToMany(Event::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
