<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'domain', 'db_database', 'db_database_controle', 'db_hostname', 'db_username', 'db_password', 'db_port'];
}
