<?php

namespace App\Models;

use domo\Models\DomoLogs\Log_edicion;
use domo\Models\DomoLogs\Log_creacion;
use domo\Models\DomoLogs\Log_eliminacion;
use Illuminate\Database\Eloquent\Model;

class CustomModel extends Model
{
	protected static function boot()
	{
		parent::boot();

		// static::addGlobalScope(new NoDeletedScope);
	}

	public function log_create() {
		return $this->morphMany(Log_creacion::Class, 'log_creatable', 'tabla_clase', 'tabla_id', 'id');
	}

	public function log_edicion() {
		return $this->morphMany(Log_edicion::Class, 'log_editable', 'tabla_clase', 'tabla_id', 'id');
	}

	public function log_eliminacion() {
		return $this->morphMany(Log_eliminacion::Class, 'log_eliminacionable', 'tabla_clase', 'tabla_id', 'id');
	}


}
