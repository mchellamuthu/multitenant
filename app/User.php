<?php

namespace App;

use Illuminate\Support\Facades\Config;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Establish a connection with the tenant's database.
     */
    public function connect()
    {
        if (!$this->connected()) {
            tenant_connect(
                $this->db_name
            );
        }
    }
    /**
     * Check if the current tenant connection settings matches the company's database settings.
     *
     * @return bool
     */
    private function connected()
    {
        $connection = Config::get('database.connections.tenant');
        return
            $connection['database'] == $this->db_name;
    }

}
