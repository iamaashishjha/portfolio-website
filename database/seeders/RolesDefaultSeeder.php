<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanTables();
        $this->roles();
        $this->permission();
        $this->role_has_permission();
        $this->model_has_roles();
    }

    public function cleanTables()
    {
        DB::table('roles')->delete();
        DB::table('permissions')->delete();
        DB::table('role_has_permissions')->delete();
        DB::table('model_has_roles')->delete();
    }

    public function roles()
    {
        /* `portfolio_website`.`roles` */
        $roles = array(
            array('id' => '1', 'name' => 'superadmin', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '2', 'name' => 'centraladmin', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '3', 'name' => 'provinceadmin', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '4', 'name' => 'districtadmin', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09')
        );
        DB::table('roles')->insert($roles);
    }


    public function permission()
    {
        /* `portfolio_website`.`permissions` */
        $permissions = array(
            array('id' => '1', 'name' => 'list abouthistory', 'model_name' => 'AboutHistory', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '2', 'name' => 'create abouthistory', 'model_name' => 'AboutHistory', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '3', 'name' => 'update abouthistory', 'model_name' => 'AboutHistory', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '4', 'name' => 'delete abouthistory', 'model_name' => 'AboutHistory', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '5', 'name' => 'list appsettings', 'model_name' => 'AppSettings', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '6', 'name' => 'create appsettings', 'model_name' => 'AppSettings', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '7', 'name' => 'update appsettings', 'model_name' => 'AppSettings', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '8', 'name' => 'delete appsettings', 'model_name' => 'AppSettings', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '9', 'name' => 'list blogcategory', 'model_name' => 'BlogCategory', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '10', 'name' => 'create blogcategory', 'model_name' => 'BlogCategory', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '11', 'name' => 'update blogcategory', 'model_name' => 'BlogCategory', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '12', 'name' => 'delete blogcategory', 'model_name' => 'BlogCategory', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '13', 'name' => 'list blogpost', 'model_name' => 'BlogPost', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '14', 'name' => 'create blogpost', 'model_name' => 'BlogPost', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '15', 'name' => 'update blogpost', 'model_name' => 'BlogPost', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '16', 'name' => 'delete blogpost', 'model_name' => 'BlogPost', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '17', 'name' => 'list blogtags', 'model_name' => 'BlogTags', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '18', 'name' => 'create blogtags', 'model_name' => 'BlogTags', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '19', 'name' => 'update blogtags', 'model_name' => 'BlogTags', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '20', 'name' => 'delete blogtags', 'model_name' => 'BlogTags', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '21', 'name' => 'list blogscomment', 'model_name' => 'BlogsComment', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '22', 'name' => 'create blogscomment', 'model_name' => 'BlogsComment', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '23', 'name' => 'update blogscomment', 'model_name' => 'BlogsComment', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '24', 'name' => 'delete blogscomment', 'model_name' => 'BlogsComment', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '25', 'name' => 'list companydetails', 'model_name' => 'CompanyDetails', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '26', 'name' => 'create companydetails', 'model_name' => 'CompanyDetails', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '27', 'name' => 'update companydetails', 'model_name' => 'CompanyDetails', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '28', 'name' => 'delete companydetails', 'model_name' => 'CompanyDetails', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '29', 'name' => 'list data', 'model_name' => 'Data', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '30', 'name' => 'create data', 'model_name' => 'Data', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '31', 'name' => 'update data', 'model_name' => 'Data', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '32', 'name' => 'delete data', 'model_name' => 'Data', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '33', 'name' => 'list district', 'model_name' => 'District', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '34', 'name' => 'create district', 'model_name' => 'District', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '35', 'name' => 'update district', 'model_name' => 'District', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '36', 'name' => 'delete district', 'model_name' => 'District', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '37', 'name' => 'list document', 'model_name' => 'Document', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '38', 'name' => 'create document', 'model_name' => 'Document', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '39', 'name' => 'update document', 'model_name' => 'Document', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '40', 'name' => 'delete document', 'model_name' => 'Document', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '41', 'name' => 'list event', 'model_name' => 'Event', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '42', 'name' => 'create event', 'model_name' => 'Event', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '43', 'name' => 'update event', 'model_name' => 'Event', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '44', 'name' => 'delete event', 'model_name' => 'Event', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '45', 'name' => 'list gender', 'model_name' => 'Gender', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '46', 'name' => 'create gender', 'model_name' => 'Gender', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '47', 'name' => 'update gender', 'model_name' => 'Gender', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '48', 'name' => 'delete gender', 'model_name' => 'Gender', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '49', 'name' => 'list library', 'model_name' => 'Library', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '50', 'name' => 'create library', 'model_name' => 'Library', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '51', 'name' => 'update library', 'model_name' => 'Library', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '52', 'name' => 'delete library', 'model_name' => 'Library', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '53', 'name' => 'list locallevel', 'model_name' => 'LocalLevel', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '54', 'name' => 'create locallevel', 'model_name' => 'LocalLevel', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '55', 'name' => 'update locallevel', 'model_name' => 'LocalLevel', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '56', 'name' => 'delete locallevel', 'model_name' => 'LocalLevel', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '57', 'name' => 'list localleveltype', 'model_name' => 'LocalLevelType', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '58', 'name' => 'create localleveltype', 'model_name' => 'LocalLevelType', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '59', 'name' => 'update localleveltype', 'model_name' => 'LocalLevelType', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '60', 'name' => 'delete localleveltype', 'model_name' => 'LocalLevelType', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '61', 'name' => 'list membership', 'model_name' => 'Membership', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '62', 'name' => 'create membership', 'model_name' => 'Membership', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '63', 'name' => 'update membership', 'model_name' => 'Membership', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '64', 'name' => 'delete membership', 'model_name' => 'Membership', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '65', 'name' => 'list newscategory', 'model_name' => 'NewsCategory', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '66', 'name' => 'create newscategory', 'model_name' => 'NewsCategory', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '67', 'name' => 'update newscategory', 'model_name' => 'NewsCategory', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '68', 'name' => 'delete newscategory', 'model_name' => 'NewsCategory', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '69', 'name' => 'list newscomment', 'model_name' => 'NewsComment', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '70', 'name' => 'create newscomment', 'model_name' => 'NewsComment', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '71', 'name' => 'update newscomment', 'model_name' => 'NewsComment', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '72', 'name' => 'delete newscomment', 'model_name' => 'NewsComment', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '73', 'name' => 'list newspost', 'model_name' => 'NewsPost', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '74', 'name' => 'create newspost', 'model_name' => 'NewsPost', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '75', 'name' => 'update newspost', 'model_name' => 'NewsPost', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '76', 'name' => 'delete newspost', 'model_name' => 'NewsPost', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '77', 'name' => 'list newstags', 'model_name' => 'NewsTags', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '78', 'name' => 'create newstags', 'model_name' => 'NewsTags', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '79', 'name' => 'update newstags', 'model_name' => 'NewsTags', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '80', 'name' => 'delete newstags', 'model_name' => 'NewsTags', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '81', 'name' => 'list permission', 'model_name' => 'Permission', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '82', 'name' => 'create permission', 'model_name' => 'Permission', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '83', 'name' => 'update permission', 'model_name' => 'Permission', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '84', 'name' => 'delete permission', 'model_name' => 'Permission', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '85', 'name' => 'list province', 'model_name' => 'Province', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '86', 'name' => 'create province', 'model_name' => 'Province', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '87', 'name' => 'update province', 'model_name' => 'Province', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '88', 'name' => 'delete province', 'model_name' => 'Province', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '89', 'name' => 'list role', 'model_name' => 'Role', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '90', 'name' => 'create role', 'model_name' => 'Role', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '91', 'name' => 'update role', 'model_name' => 'Role', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '92', 'name' => 'delete role', 'model_name' => 'Role', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '93', 'name' => 'list slider', 'model_name' => 'Slider', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '94', 'name' => 'create slider', 'model_name' => 'Slider', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '95', 'name' => 'update slider', 'model_name' => 'Slider', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '96', 'name' => 'delete slider', 'model_name' => 'Slider', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '97', 'name' => 'list user', 'model_name' => 'User', 'permission' => 'list', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '98', 'name' => 'create user', 'model_name' => 'User', 'permission' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '99', 'name' => 'update user', 'model_name' => 'User', 'permission' => 'update', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09'),
            array('id' => '100', 'name' => 'delete user', 'model_name' => 'User', 'permission' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-31 16:09:09', 'updated_at' => '2023-03-31 16:09:09')
        );
        DB::table('permissions')->insert($permissions);
    }

    public function role_has_permission()
    {
        /* `portfolio_website`.`role_has_permissions` */
        $role_has_permissions = array(
            array('permission_id' => '1', 'role_id' => '1'),
            array('permission_id' => '2', 'role_id' => '1'),
            array('permission_id' => '3', 'role_id' => '1'),
            array('permission_id' => '4', 'role_id' => '1'),
            array('permission_id' => '5', 'role_id' => '1'),
            array('permission_id' => '6', 'role_id' => '1'),
            array('permission_id' => '7', 'role_id' => '1'),
            array('permission_id' => '8', 'role_id' => '1'),
            array('permission_id' => '9', 'role_id' => '1'),
            array('permission_id' => '10', 'role_id' => '1'),
            array('permission_id' => '11', 'role_id' => '1'),
            array('permission_id' => '12', 'role_id' => '1'),
            array('permission_id' => '13', 'role_id' => '1'),
            array('permission_id' => '14', 'role_id' => '1'),
            array('permission_id' => '15', 'role_id' => '1'),
            array('permission_id' => '16', 'role_id' => '1'),
            array('permission_id' => '17', 'role_id' => '1'),
            array('permission_id' => '18', 'role_id' => '1'),
            array('permission_id' => '19', 'role_id' => '1'),
            array('permission_id' => '20', 'role_id' => '1'),
            array('permission_id' => '21', 'role_id' => '1'),
            array('permission_id' => '22', 'role_id' => '1'),
            array('permission_id' => '23', 'role_id' => '1'),
            array('permission_id' => '24', 'role_id' => '1'),
            array('permission_id' => '25', 'role_id' => '1'),
            array('permission_id' => '26', 'role_id' => '1'),
            array('permission_id' => '27', 'role_id' => '1'),
            array('permission_id' => '28', 'role_id' => '1'),
            array('permission_id' => '29', 'role_id' => '1'),
            array('permission_id' => '30', 'role_id' => '1'),
            array('permission_id' => '31', 'role_id' => '1'),
            array('permission_id' => '32', 'role_id' => '1'),
            array('permission_id' => '33', 'role_id' => '1'),
            array('permission_id' => '34', 'role_id' => '1'),
            array('permission_id' => '35', 'role_id' => '1'),
            array('permission_id' => '36', 'role_id' => '1'),
            array('permission_id' => '37', 'role_id' => '1'),
            array('permission_id' => '38', 'role_id' => '1'),
            array('permission_id' => '39', 'role_id' => '1'),
            array('permission_id' => '40', 'role_id' => '1'),
            array('permission_id' => '41', 'role_id' => '1'),
            array('permission_id' => '42', 'role_id' => '1'),
            array('permission_id' => '43', 'role_id' => '1'),
            array('permission_id' => '44', 'role_id' => '1'),
            array('permission_id' => '45', 'role_id' => '1'),
            array('permission_id' => '46', 'role_id' => '1'),
            array('permission_id' => '47', 'role_id' => '1'),
            array('permission_id' => '48', 'role_id' => '1'),
            array('permission_id' => '49', 'role_id' => '1'),
            array('permission_id' => '50', 'role_id' => '1'),
            array('permission_id' => '51', 'role_id' => '1'),
            array('permission_id' => '52', 'role_id' => '1'),
            array('permission_id' => '53', 'role_id' => '1'),
            array('permission_id' => '54', 'role_id' => '1'),
            array('permission_id' => '55', 'role_id' => '1'),
            array('permission_id' => '56', 'role_id' => '1'),
            array('permission_id' => '57', 'role_id' => '1'),
            array('permission_id' => '58', 'role_id' => '1'),
            array('permission_id' => '59', 'role_id' => '1'),
            array('permission_id' => '60', 'role_id' => '1'),
            array('permission_id' => '61', 'role_id' => '1'),
            array('permission_id' => '62', 'role_id' => '1'),
            array('permission_id' => '63', 'role_id' => '1'),
            array('permission_id' => '64', 'role_id' => '1'),
            array('permission_id' => '81', 'role_id' => '1'),
            array('permission_id' => '82', 'role_id' => '1'),
            array('permission_id' => '83', 'role_id' => '1'),
            array('permission_id' => '84', 'role_id' => '1'),
            array('permission_id' => '85', 'role_id' => '1'),
            array('permission_id' => '86', 'role_id' => '1'),
            array('permission_id' => '87', 'role_id' => '1'),
            array('permission_id' => '88', 'role_id' => '1'),
            array('permission_id' => '89', 'role_id' => '1'),
            array('permission_id' => '90', 'role_id' => '1'),
            array('permission_id' => '91', 'role_id' => '1'),
            array('permission_id' => '92', 'role_id' => '1'),
            array('permission_id' => '93', 'role_id' => '1'),
            array('permission_id' => '94', 'role_id' => '1'),
            array('permission_id' => '95', 'role_id' => '1'),
            array('permission_id' => '96', 'role_id' => '1'),
            array('permission_id' => '97', 'role_id' => '1'),
            array('permission_id' => '98', 'role_id' => '1'),
            array('permission_id' => '99', 'role_id' => '1'),
            array('permission_id' => '100', 'role_id' => '1')
        );
        DB::table('role_has_permissions')->insert($role_has_permissions);
    }

    public function model_has_roles()
    {
        /* `portfolio_website`.`model_has_roles` */
        $model_has_roles = array(
            array('role_id' => '1', 'model_type' => 'App\\Models\\User', 'model_id' => '1')
        );
        DB::table('model_has_roles')->insert($model_has_roles);
    }
}
