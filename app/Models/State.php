<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    protected $table = 'states';

    protected $fillable = ['name', 'country_id'];

    public function employees(): hasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function country(): belongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function cities(): hasMany
    {
        return $this->hasMany(City::class);
    }
}
