<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $table = 'band';

    /**
     * Get the Albums associated with this Band
     */
    public function albums()
    {
        return $this->hasMany('App\Album');
    }
}
