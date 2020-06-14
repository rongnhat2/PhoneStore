<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class admin_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
	        'name'              => 'admin',
	        'display_name' 			=> 'Là Admin',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
        DB::table('permissions')->insert([
	        'name'              => 'roles',
	        'display_name' 			=> 'Quản Lí Chức Vụ',
	        "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	    ]);
        DB::table('permissions')->insert([
            'name'              => 'users',
            'display_name'          => 'Quản Lí Nhân Viên',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('permissions')->insert([
            'name'              => 'system',
            'display_name'          => 'Quản Lí Danh Mục',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('permissions')->insert([
            'name'              => 'gallery',
            'display_name'          => 'Quản Lí Hình Ảnh',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('permissions')->insert([
            'name'              => 'item',
            'display_name'          => 'Quản Lí Sản Phẩm',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('permissions')->insert([
            'name'              => 'discount',
            'display_name'          => 'Quản Lí Giảm Giá',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('permissions')->insert([
            'name'              => 'warehouse',
            'display_name'          => 'Quản Lí Nhập Kho',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('permissions')->insert([
            'name'              => 'ship',
            'display_name'          => 'Quản Lí Đơn Hàng',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('permissions')->insert([
            'name'              => 'allship',
            'display_name'          => 'Quản Lí Lịch Sử',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('permissions')->insert([
            'name'              => 'guarantee',
            'display_name'          => 'Quản Lí Bảo Hành',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('permissions')->insert([
            'name'              => 'statistical',
            'display_name'          => 'Thống Kê',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

        DB::table('users')->insert([
            'name'              => 'admin',
            'email'             => 'admin@gmail.com',
            'password'          => Hash::make('12345678'),
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('roles')->insert([
            'name'              => 'admin',
            'display_name'      => 'admin',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        DB::table('role_user')->insert([
            'user_id'           => '1',
            'role_id'      		=> '1',
            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        for ($i=1; $i <= 12 ; $i++) { 
	        DB::table('role_permission')->insert([
	            'permission_id'     => $i,
	            'role_id'      		=> '1',
	            "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	        ]);
        }

    }
}
