<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // php artisan db:seed --class=PermissionSeeder
    public function run(): void
    {
        $permissions = [
            "manage user"       => [
                "view users",
                "send user notification",
                "view user notifications",
                "update user balance",
                "ban user",
                "login as user",
                "update user",
            ],
            "admin"             => [
                "view admin",
                "add admin",
                "edit admin",
            ],
            "role"              => [
                "view roles",
                "add role",
                "edit role",
                "assign permissions",
            ],
            "gateway"           => [
                "manage gateways",
                "manage withdraw methods",
            ],
            "setting"           => [
                "update general settings",
                "update brand settings",
                "system configuration",
                "notification settings",
                "module settings",
                "manage reloadly api",
                "country settings",
                "manage qr code",
                "update maintenance mode",
                "security settings",
                "seo settings",
            ],
            "report"            => [
                "view all transactions",
                "view user transactions",
                "view agent transactions",
                "view merchant transactions",
                "view login history",
                "view all notifications",
            ],
            "support ticket"    => [
                "view user tickets",
                "view agent tickets",
                "view merchant tickets",
                "answer tickets",
                "close tickets",
            ],
            "manage content"    => [
                "manage pages",
                "manage sections",
            ],
            "other"             => [
                "view dashboard",
                "manage extensions",
                "manage languages",
                "manage subscribers",
                "view application info",
                "manage cron job",
            ],
        ];

        foreach ($permissions as $k => $permission) {
            foreach ($permission as $item) {
                $exists = Permission::where("name", $item)->where('group_name', $k)->exists();
                if ($exists) {
                    continue;
                }

                $permission             = new Permission();
                $permission->name       = $item;
                $permission->group_name = $k;
                $permission->guard_name = "admin";
                $permission->save();
            }
        }
    }
}
