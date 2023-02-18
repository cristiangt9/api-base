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

	public function logCreate()
	{
		return $this->morphMany(Log_creacion::Class, 'log_creatable', 'table_class', 'table_id', 'id');
	}

	public function logEdit()
	{
		return $this->morphMany(Log_edicion::Class, 'log_editable', 'table_class', 'table_id', 'id');
	}

	public function logDelete()
	{
		return $this->morphMany(Log_eliminacion::Class, 'log_deletable', 'table_class', 'table_id', 'id');
	}


}
