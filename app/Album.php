<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the Band that this Album belongs to
     */
    public function band()
    {
        return $this->belongsTo('App\Band');
    }
}
