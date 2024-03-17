<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'no',
        'birthday',
        'phone'
    ];

    public function edit()
   {
        $this->isActive= false;
        $this->isdeleted=true;

    }
}
