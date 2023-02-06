<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codeReservation',
        'archivage',
        'publication_id',
        'client_id',
        'archivage',
        'validation',
    ];

    public function publication(){
        return $this->belongsTo(Publication::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

}
