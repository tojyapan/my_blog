<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();

        $crudPost = new Permission();
        $crudPost->name = "crud-post";
        $crudPost->save();

        $updateOtherPost = new Permission();
        $updateOtherPost->name = "update-others-post";
        $updateOtherPost->save();

        $deleteOthersPost = new Permission();
        $deleteOthersPost->name = "delete-others-post";
        $deleteOthersPost->save();

        $crudCategory = new Permission();
        $crudCategory->name = "crud-category";
        $crudCategory->save();

        $crudUser = new Permission();
        $crudUser->name = "crud-user";
        $crudUser->save();

        $admin = Role::whereName('admin')->first();
        $editor = Role::whereName('editor')->first();
        $author = Role::whereName('author')->first();

        $admin->detachPermissions([$crudPost, $updateOtherPost, $deleteOthersPost, $crudCategory, $crudUser]);
        $admin->attachPermissions([$crudPost, $updateOtherPost, $deleteOthersPost, $crudCategory, $crudUser]);

        $editor->detachPermissions([$crudPost, $updateOtherPost, $deleteOthersPost, $crudCategory]);
        $editor->attachPermissions([$crudPost, $updateOtherPost, $deleteOthersPost, $crudCategory]);

        $author->detachPermission($crudPost);
        $author->attachPermission($crudPost);
    }
}
