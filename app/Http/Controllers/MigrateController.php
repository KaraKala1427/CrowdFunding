<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MigrateController extends Controller
{
    public function index(Request $request){

        if ($request->get('key') !== '11122') {
            abort(403);
        }

        return Artisan::call('migrate', array('--path' => 'database/migrations', '--force' => true));
    }

    public function user_seeder(Request $request){

        if ($request->get('key') !== '11122') {
            abort(403);
        }

        return Artisan::call('db:seed', array('--class' => 'UserSeeder'));
    }
    public function role_seeder(Request $request){

        if ($request->get('key') !== '11122') {
            abort(403);
        }

        return Artisan::call('db:seed', array('--class' => 'RoleSeeder'));
    }
    public function category_seeder(Request $request){

        if ($request->get('key') !== '11122') {
            abort(403);
        }

        return Artisan::call('db:seed', array('--class' => 'CategorySeeder'));
    }

}
