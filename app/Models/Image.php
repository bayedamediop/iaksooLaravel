<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image',
        'publication_id',
    ];

    /**
     * Get the profil for the user.
     */
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }

}
