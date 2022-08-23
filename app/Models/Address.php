<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $fillable = ['name','phone','city','district','ward','detailadress','status','data','user_id'];
    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
