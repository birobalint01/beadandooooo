<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    

    public $timestamps = false;
    protected $cast = [
        'release_date' => 'timestamp'
    ];

    public function guest() {
        return $this->hasMany(Guests::class, 'ticket_id', 'id');
    }
}
