<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
use App\Models\Committee;
use Storage;


class AjaxController extends Controller
{
    //

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function division_district(Request $request)
    {

        $division_id = $request->division_id;

        $districts = DB::table('districts')->where('division_id',$division_id)->pluck('bn_name','id');
        echo view('ajax.division_district',['districts'=>$districts]);


    }

    public function district_upzilla(Request $request)
    {
        $district_id = $request->district_id;
        $upzilla = DB::table('upazilas')->where('district_id',$district_id)->pluck('bn_name','id');
        echo view('ajax.district_upzilla',['upzilla'=>$upzilla]);
    }

    public function type_package(Request $request)
    {
        $var_type = $request->var_type;
        $packages = DB::table('packages')->where('package_type',$var_type)->get();
        echo view('ajax.type_package',['packages'=>$packages,'var_type'=>$var_type]);
    }

    public function package_add_to_cart(Request $request)
    {
        $package_id = $request->package_id;
        $package = DB::table('packages')->where('id',$package_id)->first();
        echo view('ajax.package_add_to_cart',['package'=>$package]);
    }

    public function feature_add_to_cart(Request $request)
    {
        $feature_id = $request->feature_id;
        $feature = DB::table('features')->where('id',$feature_id)->first();
        echo view('ajax.feature_add_to_cart',['feature'=>$feature]);
    }

    public function package_modal(Request $request)
    {
        $package_id = $request->package_id;
        $package = DB::table('packages')->where('id',$package_id)->first();
        echo view('ajax.package_modal',['package'=>$package]);
    }















}
