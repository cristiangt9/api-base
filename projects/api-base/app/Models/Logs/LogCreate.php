<?php

namespace App\Models\Logs;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class LogCreate extends Model
{

    const UPDATED_AT = null;

    protected $table = 'log_create';
    protected $fillable = ["user_id"];
    protected $connection = 'logs';

    public function log_creatable()
    {
        return $this->morphTo();
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
