<?php

namespace Faden\FadenMessageModule;

//use App\Events\MessageAdded;
use App\User;
use Illuminate\Database\Eloquent\Model;

class FadenMessage extends Model
{
//    protected $dispatchesEvents = [
//        'saved'=> MessageAdded::class,
//    ];

    protected $fillable = [
        'message_type',
        "body", "title", 'subtitle',
        'cc','bc','to',
        'sent_at','start_at',
        'push_body',"push_title", "push_subtitle"
    ];

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'faden_message_user',
            'message_id',
            'user_id'
        );
    }

    public function types()
    {
        return $this->hasMany(FadenMessageType::class);
    }

}
