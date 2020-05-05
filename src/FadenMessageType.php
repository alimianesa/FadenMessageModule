<?php

namespace Faden\FadenMessageModule;

use Illuminate\Database\Eloquent\Model;

class FadenMessageType extends Model
{

    protected $fillable=[
        'key' , 'sends_id' ,'title' ,'subtitle','active', 'description'
    ];


    public function message()
    {
        return $this->belongsTo(FadenMessage::class);
    }
}
