<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posting extends Model
{
    //
    protected $fillable = ['id','caption','file','image'];
    public function posting()
    {
        return $this->belongsTo(posting::class);
    }
}
