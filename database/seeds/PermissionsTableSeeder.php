<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     *Runthedatabaseseeds.
     *
     * @returnvoid
     */
    public function run()
    {
        $routers   = array_values((array) Route::getRoutes())[2];
        $data      = [];
        $timestamp = Carbon::now();

        foreach ($routers as $index => $value) {
            $data[] = [
                'name'       => $index,
                'alias'      => $index,
                'describe'   => $index,
                'guard_name' => 'web',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];
        }

        DB::table('permissions')->insert($data);
    }
}
