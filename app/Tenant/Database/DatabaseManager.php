<?php

namespace App\Tenant\Database;

use Illuminate\Support\Facades\DB;
use App\Models\Tenant\Company;

class DatabaseManager
{
    public function createDatabase(Company $company)
    {
        return DB::statement("
            CREATE DATABASE IF NOT EXISTS {$company->db_database} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
        ");
    }
}