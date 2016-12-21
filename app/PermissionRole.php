<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permission_role';

    protected $fillable = ['permission_id', 'role_id'];

    public $timestamps = false;
}
