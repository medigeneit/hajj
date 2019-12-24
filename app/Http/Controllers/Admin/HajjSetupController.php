<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\HajjSetup;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
use Carbon\Carbon;

class HajjSetupController extends Controller
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
        $hajj_setup = HajjSetup::get();
        return view('admin.hajj_setup.list',['hajj_setup'=>$hajj_setup]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hajj_setup.create');
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

            HajjSetup::create($allData);
            Session::flash('message', 'Record added successfully');

            //return back();

            return redirect()->action('Admin\HajjSetupController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=HajjSetup::select('hajj_setup.*','role.name as role_title')
                   ->join('role', 'role.id', '=', 'hajj_setup.role_id')
                   ->find($id);
        return view('admin.hajj_setup.show',['user'=>$user]);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hajj_setup = HajjSetup::find($id);

        return view('admin.hajj_setup.edit',['hajj_setup'=>$hajj_setup]);
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


        $user=HajjSetup::find($id);
        $user->title=$request->title;
        $user->hajj_date=$request->hajj_date;
        $user->last_date_passport=$request->last_date_passport;
        $user->status=$request->status;

        $user->push();
        Session::flash('message', 'Record uddated successfully');

        return back();

        //return redirect()->action('Admin\HajjSetupController@index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HajjSetup::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('Admin\HajjSetupController@index');
    }





}
