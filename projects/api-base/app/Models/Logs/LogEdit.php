<?php

namespace App\Models\Logs;

use App\Models\Admin\User;
use Illuminate\Database\Eloquent\Model;

class LogEdit extends Model {

    const UPDATED_AT = null;

    protected $table = 'log_edit';
    protected $fillable = ["field", "current_value", "new_value", "user_id"];
    protected $connection = 'logs';

    public function log_editable()
    {
        return $this->morphTo();
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
