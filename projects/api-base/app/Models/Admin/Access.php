<?php

namespace App\Models\Admin;

use App\Models\CustomModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Access extends CustomModel
{
    use HasFactory;

    protected $connection = 'admin';
    protected $table = 'admin.accesses';


    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'accesses_users',
            'access_id',
            'user_id'
        );
    }

}
