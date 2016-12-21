<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';

    protected $fillable = ['name', 'fullname'];

    public function roles()
    {
    	return $this->belongsToMany('App\Role');
    }
}
