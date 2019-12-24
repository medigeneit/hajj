<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Package;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
use Carbon\Carbon;

class PackageController extends Controller
{
    //

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package = Package::get();
        return view('admin.package.list',['package'=>$package]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $allData=$request->all();

            $allData['features'] = serialize($request->feature);

            Package::create($allData);
            Session::flash('message', 'Record added successfully');

            //return back();

            return redirect()->action('Admin\PackageController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=Package::select('package.*','role.name as role_title')
                   ->join('role', 'role.id', '=', 'package.role_id')
                   ->find($id);
        return view('admin.package.show',['user'=>$user]);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id);

        return view('admin.package.edit',['package'=>$package]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $user=Package::find($id);
        $user->title=$request->title;
        $user->features = serialize($request->feature);
        $user->price=$request->price;
        $user->detail=$request->detail;
        $user->image=$request->image;
        $user->status=$request->status;
        $user->package_type=$request->package_type;

        $user->push();
        Session::flash('message', 'Record uddated successfully');

        return back();

        //return redirect()->action('Admin\PackageController@index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Package::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('Admin\PackageController@index');
    }





}
