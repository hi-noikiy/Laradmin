<?php

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create(
            [
                'name'     => '管理面板',
                'describe' => '管理面板',
                'icon'     => 'fa-tachometer',
                'slug'     => 'admin.index',
            ]
        );

        $cog = Menu::create(
            [
                'name'     => '站点设置',
                'describe' => '站点设置',
                'icon'     => 'fa-cogs',
                'slug'     => 'javascript:;',
            ]
        );

        $menus = [
            [
                'name'     => '菜单管理',
                'describe' => '菜单管理',
                'icon'     => 'fa-bars',
                'slug'     => 'admin.menus.index',
                'top_id'   => $cog->id,
            ],
            [
                'name'     => '权限管理',
                'describe' => '权限管理',
                'icon'     => 'fa-dot-circle-o',
                'slug'     => 'admin.permissions.index',
                'top_id'   => $cog->id,
            ],
            [
                'name'     => '角色管理',
                'describe' => '角色管理',
                'icon'     => 'fa-user-secret',
                'slug'     => 'admin.roles.index',
                'top_id'   => $cog->id,
            ],
            [
                'name'     => '用户管理',
                'describe' => '用户管理',
                'icon'     => 'fa-user-o',
                'slug'     => 'admin.users.index',
                'top_id'   => $cog->id,
            ],


        ];

        foreach ($menus as $index => $menu) {
            Menu::create($menu);
        }
    }
}
