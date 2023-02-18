<?php

namespace App\Models\Logs;

use App\Models\Admin\User;
use Illuminate\Database\Eloquent\Model;

class LogLogin extends Model
{

    const UPDATED_AT = null;

    protected $table = 'log_login';
    protected $connection = 'logs';

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
