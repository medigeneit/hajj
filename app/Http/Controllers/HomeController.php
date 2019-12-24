<?php

namespace App\Http\Controllers;

use App\Models\blogpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use PDF;
use App\Models\Registration;
use App\Models\siteuser;
use App\User;
use App\Mail\Registration_success;
use App\Mail\Contact_success;
use Illuminate\Support\Facades\Mail;
use Validator;
use Cartalyst\Stripe\Stripe;
use Str;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $sliders = DB::table('slider')->where(['status'=>'Active'])->orderBy('id','desc')->get();
        $news = DB::table('news')->where(['status'=>'Active'])->orderBy('id','desc')->limit(4)->get();
        $services = DB::table('services')->where(['status'=>'Active'])->orderBy('id','desc')->limit(4)->get();
        $testimonials = DB::table('testimonial')->where(['status'=>'Active'])->orderBy('id','desc')->limit(4)->get();
        $hajj_packages = DB::table('packages')->where(['status'=>'Active'])->where(['package_type'=>'Hajj'])->orderBy('id','desc')->limit(3)->get();
        $umrah_packages = DB::table('packages')->where(['status'=>'Active'])->where(['package_type'=>'Umrah'])->orderBy('id','desc')->limit(3)->get();
        return view('home',(['sliders'=>$sliders,'news'=>$news,'services'=>$services,'testimonials'=>$testimonials,'hajj_packages'=>$hajj_packages,'umrah_packages'=>$umrah_packages]));
    }


    public function category($id)
    {

        $blogpost = DB::table('qtbrz_terms')
            ->join('qtbrz_term_taxonomy', 'qtbrz_term_taxonomy.term_id', '=', 'qtbrz_terms.term_id')
            ->join('qtbrz_term_relationships', 'qtbrz_term_relationships.term_taxonomy_id', '=', 'qtbrz_term_taxonomy.term_taxonomy_id')
            ->where('qtbrz_term_taxonomy.taxonomy','category')
            ->where('qtbrz_term_relationships.object_id',$id)
            ->first();

        return $blogpost;

    }

    public function fimage($id)
    {

        $metavalue = DB::table('qtbrz_postmeta')
            ->where('post_id',$id)
            ->where('meta_key','_thumbnail_id' )
            ->value('meta_value');

        $image = DB::table('qtbrz_posts')
            ->where('ID',$metavalue)
            ->where('post_type','attachment' )
            ->value('guid');

        return str_replace('https://www.sangbad247.net/wp-content/','',$image);

        //return str_replace('http://www.sangbad247.com/wp-content/','',$image);

    }



    public function activate($id)
    {
        $user=User::where('id',$id)->first();
        $user->status='Active';
        $user->save();
        Session::flash('message', 'Your account activate successfully');
        return redirect('login');
    }



    public function contact_us_send(Request $request)
    {
        $allData=$request->all();

        $admin_mail = DB::table('settings')->where('key','site_email')->value('value');
        $company_name = DB::table('settings')->where('key','site_title')->value('value');

        Mail::to($request->email)->send(new Contact_success($allData,$admin_mail,$company_name));
        echo 'success';
    }

    public function news_detail($id)
    {
        $news_detail = DB::table('news')->where('id',$id)->first();
        return view('news_detail',(['news_detail'=>$news_detail]));
    }

    public function service_detail($id)
    {
        $service_detail = DB::table('services')->where('id',$id)->first();
        return view('service_detail',(['service_detail'=>$service_detail]));
    }

    public function package_detail($id)
    {
        $package_detail = DB::table('packages')->where('id',$id)->first();
        $packages = DB::table('packages')->where('package_type',$package_detail->package_type)->get();
        return view('package_detail',(['package_detail'=>$package_detail,'packages'=>$packages]));
    }












                          /* all page template*/
    public function pages(Request $request,$slug)
    {
        $page_id = DB::table('pages')->where('slug',$slug)->value('id');

        if(!$page_id){
            abort('404');
        }

        $page = DB::table('pages')->where('id',$page_id)->first();


        if($page->template=='hajj_packages' || $page->template=='umrah_packages'){
            if($page->template=='hajj_packages') {
                $packages = DB::table('packages')->where('package_type','Hajj')->get();
            }else{
                $packages = DB::table('packages')->where('package_type','Umrah')->get();
            }
            return view('packages',['page'=>$page,'packages'=>$packages]);
        }

        if($page->template=='hajj_groups' || $page->template=='umrah_groups'){
            $groups = DB::table('groups')->where('')->get();
            return view('groups',['page'=>$page,'groups'=>$groups]);
        }

        return view($page->template,(['page'=>$page]));
    }








}
