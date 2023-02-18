<?php

namespace domo\Models\Logs;

use App\Models\Admin\User
use Illuminate\Database\Eloquent\Model;

class LogDelete extends Model
{

    const UPDATED_AT = null;

    protected $table = 'log_delete';
    protected $fillable = ["user_id"];
    protected $connection = 'logs';

    public function logDeletable()
    {
        return $this->morphTo();
    }
    
    public function usuario()
    {
    	return $this->belongsTo(User::class);
    }

}
