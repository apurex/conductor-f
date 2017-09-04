<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model {

    protected $table = 'payouts';

    protected $casts = ['user_id' => 'integer'];

    protected $fillable = ['plan','num_ref','last_payout','name','last_name'];

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