<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Talk extends Model
{
    use HasFactory;
    use HasTrixRichText;

    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    } 
    public function replies(){
        return $this->hasMany(Reply::class);
    }
}
