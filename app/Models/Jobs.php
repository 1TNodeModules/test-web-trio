<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Jobs extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['title', 'persons_id','companies_id', 'start_date', 'end_date'];

    public function companies()
    {
        return $this->hasOne(Companies::class, 'id', 'companies_id');
    }
}
