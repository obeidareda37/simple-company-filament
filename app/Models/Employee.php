<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function scopeHiredThisWeek(Builder $query): Builder
    {
        return $query->where('date_hired', '>=', now()->subWeek());
    }

    public function scopeHiredThisMonth(Builder $query): Builder
    {
        return $query->where('date_hired', '>=', now()->subMonth());
    }

    public function scopeHiredThisYear(Builder $query): Builder
    {
        return $query->where('date_hired', '>=', now()->subYear());
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
