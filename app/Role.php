<?php
/**
 * Created by PhpStorm.
 * User: sn
 * Date: 20/07/17
 * Time: 0:03
 */

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

    public function user()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id' );
    }
}