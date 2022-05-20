<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $tables = 'reservations';
    protected $primaryKey = 'reservation_id';
    protected $fillable = array('name', 'event', 'venue');
    public $timestamps = true;
}
