<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Menu;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class productsController extends Controller
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
        $products = Products::get();
        return view('admin.products.list',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = DB::table('products')->pluck('title');
        $parent =  Menu::pluck('title','id');
        return view('admin.products.create',(['products'=>$products,'parent'=>$parent]));
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
       
            $products = products::create($allData);

            
    

            Session::flash('message', 'Record added successfully');
             //return back();
           return redirect()->action('Admin\ProductsController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=products::select('products.*','role.name as role_title')
                   ->join('role', 'role.id', '=', 'products.role_id')
                   ->find($id);
        return view('admin.products.show',['user'=>$user]);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products=products::find($id);
    
        return view('admin.products.edit',['products'=>$products]);
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
        $products =products::find($id);

   

        $products->title=$request->title;
        $products->short_description=$request->short_description;
     

        $products = $products->push();



        Session::flash('message', 'Record uddated successfully');

        return back();

       // return redirect()->action('Admin\productsController@index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        products::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('Admin\ProductsController@index');
    }





}
