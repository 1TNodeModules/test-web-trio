<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Orion\Http\Requests\Request;

class Persons extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['firstname','lastname', 'birth_date'];

    public function jobs()
    {
        return $this->hasMany(Jobs::class);
    }

}
