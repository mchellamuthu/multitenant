<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

if (!function_exists('tenant_connect')) {
    function tenant_connect($database)
    {
        DB::purge('tenant');
        Config::set('database.connections.tenant.database', $database);
        DB::reconnect('tenant');
        Schema::connection('tenant')->getConnection()->reconnect();

    }
}

if (!function_exists('tenant_migrate')) {
    /**
     * Run Tenant Migrations in the connected tenant database.
     */
    function tenant_migrate()
    {
        Artisan::call('migrate', [
            '--database' => 'tenant',
            '--path' => 'database/tenant_migrations',
        ]);
    }
}

