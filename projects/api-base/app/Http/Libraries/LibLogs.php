<?php

namespace sismi\Http\Libraries;

use Auth;
use Illuminate\Http\Request;

class LibLogs {

    public static function saveLogCreate($entity)
    {
        $entity->logCreate()->create(["user_id" => Auth::user()->id]);
    }

    public static function saveLogEdit($originalEntity, $editedEntity, $dataEdit) {
        if (is_array($dataEdit)) {
            foreach ($dataEdit as $field => $value) {
                if ($field !== "updated_at" && $originalEntity->{$field} !== $value) {
                    $editedEntity->logEdit()->create(
                            [
                                "field" => $field,
                                "current_value" => $originalEntity->{$field},
                                "new_value" => $value,
                                "user_id" => Auth::user()->id
                            ]
                    );
                }
            }
        }
    }

    public static function saveLogDelete($entity) {
        $entity->logDelete()->create(["user_id" => Auth::user()->id]);
    }

    public static function saveLogLogin() {
        $login = new Log_login();
        $login->ip = \Request::ip();
        $login->usuario_id = Auth::user()->id;
        $login->save();
    }

}
