<?php

namespace App\Models\Admin;

use App\Models\CustomModel;
use domo\Models\DomoAdmin\Perfil;
use domo\Models\DomoAdmin\Privilegio;
use domo\Models\DomoAdmin\Usuario;
use domo\Models\ApiModel;

class Access extends CustomModel
{
    protected $connection = 'admin';
    protected $table = 'admin.accesses';

}
