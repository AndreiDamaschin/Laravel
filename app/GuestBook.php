<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GuestBook extends Model
{
    protected $table = 'guestBook';
    protected $fillable = ['email', 'text', 'attach'];
    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('H:i:s / d.m.Y');
    }
}
