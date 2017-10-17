<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Score extends Model
{
    protected $table = 'scores';

    protected $casts = ['user_id' => 'integer'];

    protected $fillable = ['score','review','conduct_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wasCreatedBy($user)
    {
        if( is_null($user) ) {
            return false;
        }

        return $this->user_id === $user->id;
    }
}
