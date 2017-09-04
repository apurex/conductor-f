<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\User;

class Conduct extends Model
{
   protected $table = 'conducts';

   protected $casts = ['user_id' => 'integer'];

   protected $fillable = [
        'car','short','body','car_m','car_ma','car_state','phone',
    ];

    public function user(){

    	return $this->belongsTo(User::class);

    }

    public function comment(){

    	return $this->belongsTo(Comment::class);

    }

}
