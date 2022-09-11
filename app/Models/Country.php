<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = ['country_code', 'name'];

    public function employees(): hasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function states(): hasMany
    {
        return $this->hasMany(State::class);
    }
}
