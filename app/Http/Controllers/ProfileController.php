<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use PDF;
use App\Models\PhysicalInfo;
use App\Models\PassportInfo;
use App\Models\Payments;
use App\Models\HajjiHajj;
use App\Models\Groups;
use App\User;
use App\Mail\Registration_success;
use App\Mail\Contact_success;
use Illuminate\Support\Facades\Mail;
use Validator;
use Str;
use Auth;


class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function myprofile()
    {
        $add['division'] = DB::table('divisions')->where('id',Auth::user()->division_id)->value('bn_name');
        $add['district'] = DB::table('districts')->where('id',Auth::user()->district_id)->value('bn_name');
        $add['upazila'] = DB::table('upazilas')->where('id',Auth::user()->upzilla_id)->value('bn_name');
        return view('profile/myprofile',['add'=>$add]);
    }

    public function myprofile_edit()
    {
        $divisions = DB::table('divisions')->pluck('bn_name','id');
        $districts = DB::table('districts')->where('division_id',Auth::user()->division_id)->pluck('bn_name','id');
        $upazilas = DB::table('upazilas')->where('district_id',Auth::user()->district_id)->pluck('bn_name','id');
        return view('profile/myprofile_edit',['divisions'=>$divisions,'districts'=>$districts,'upazilas'=>$upazilas]);
    }

    public function myprofile_update(Request $request)
    {
        $user=User::find(Auth::id());
        $user->title=$request->title;
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->father_name=$request->father_name;
        $user->mother_name=$request->mother_name;
        $user->spouse_name=$request->spouse_name;
        $user->nationality=$request->nationality;
        $user->national_id_card=$request->national_id_card;
        $user->dob=$request->dob;
        $user->birth_place=$request->birth_place;
        $user->nominee=$request->nominee;
        $user->previous_year_hajj=$request->previous_year_hajj;
        $user->is_group_leader=$request->is_group_leader;
        $user->gender=$request->gender;
        $user->maharram=$request->maharram;
        $user->maharram_relation=$request->maharram_relation;
        $user->maharram_mobile_no=$request->maharram_mobile_no;
        $user->present_address=$request->present_address;
        $user->division_id=$request->division_id;
        $user->district_id=$request->district_id;
        $user->upzilla_id=$request->upzilla_id;
        $user->per_post_office=$request->per_post_office;
        $user->per_villlege=$request->per_villlege;
        $user->proffession=$request->proffession;
        $user->institute=$request->institute;
        $user->educational_institute=$request->educational_institute;
        $user->passing_year=$request->passing_year;

        if ($request->hasFile('image')){
            $user->image =$request->file('image')->store('images');
        }

        if ($request->hasFile('national_id_photo')){
            $user->national_id_photo = $request->file('national_id_photo')->store('images');
        }

        $user->save();
        return redirect('myprofile');
    }


    public function physical_info()
    {
        $physical_info = PhysicalInfo::where('hajji_id',Auth::id())->first();
        return view('profile/physical_info',['physical_info'=>$physical_info]);
    }

    public function physical_info_edit()
    {
        $physical_info = PhysicalInfo::where('hajji_id',Auth::id())->first();
        return view('profile/physical_info_edit',['physical_info'=>$physical_info]);
    }

    public function physical_info_insert(Request $request)
    {
        $allData=$request->all();
        $allData['hajji_id'] = Auth::id();

        PhysicalInfo::create($allData);

        return redirect('physical-info');
    }

    public function physical_info_update(Request $request)
    {
        $physical_info = PhysicalInfo::where('hajji_id',Auth::id())->first();
        $physical_info->strong_disease=$request->strong_disease;
        $physical_info->blood_pressure=$request->blood_pressure;
        $physical_info->blood_group=$request->blood_group;
        $physical_info->diabetes=$request->diabetes;
        $physical_info->food_problem=$request->food_problem;
        $physical_info->walking_problem=$request->walking_problem;
        $physical_info->is_use_english_commode=$request->is_use_english_commode;
        $physical_info->is_reading_quran=$request->is_reading_quran;
        $physical_info->is_read_quran_sahih=$request->is_read_quran_sahih;
        $physical_info->is_salat_sahih_reading=$request->is_salat_sahih_reading;
        $physical_info->save();
        return redirect('physical-info');
    }

    public function passport()
    {
        $passport_info = PassportInfo::where('hajji_id',Auth::id())->first();
        return view('profile/passport',['passport_info'=>$passport_info]);
    }

    public function passport_insert(Request $request)
    {
        $allData=$request->all();
        $allData['hajji_id'] = Auth::id();

        PassportInfo::create($allData);

        return redirect('passport');
    }

    public function passport_edit()
    {
        $passport = PassportInfo::where('hajji_id',Auth::id())->first();
        return view('profile/passport_edit',['passport'=>$passport]);
    }

    public function passport_update(Request $request)
    {
        $user=PassportInfo::where('hajji_id',Auth::id())->first();
        $user->passport_no=$request->passport_no;
        $user->issue_date=$request->issue_date;
        $user->expired_date=$request->expired_date;
        $user->issue_place=$request->issue_place;
        $user->passport_type=$request->passport_type;
        if ($request->hasFile('passport_photo')){
            $user->passport_photo =$request->file('passport_photo')->store('images');
        }

        $user->is_submit_passport=$request->is_submit_passport;
        $user->save();
        return redirect('passport');
    }


    public function payments()
    {
        $payments = Payments::where('hajji_id',Auth::id())->get();
        return view('profile/payments',['payments'=>$payments]);
    }

    public function hajj()
    {
        $hajj = DB::table('hajji_hajj')
            ->select('hajji_hajj.*','packages.title as package','groups.title as group')
            ->leftJoin('packages','packages.id','hajji_hajj.package_id')
            ->leftJoin('groups','groups.id','hajji_hajj.group_id')
            ->where('hajji_id',Auth::id())
            ->orderBy('id','DESC')
            ->get();
        $hajj_pending = HajjiHajj::where('hajji_id',Auth::id())->where('status','Running')->get();
        return view('profile/hajj',['hajj'=>$hajj,'hajj_pending'=>$hajj_pending]);
    }

    public function hajj_create(Request $request)
    {
        $features = DB::table('features')->where('status','Active')->get();
        $groups = Groups::pluck('title','id');
        return view('profile/hajj_create',['features'=>$features,'groups'=>$groups]);
    }



    public function hajj_insert(Request $request)
    {
        $allData=$request->all();
        $allData['hajji_id'] = Auth::id();
        $allData['features'] = serialize($request->feature);
        $allData['quantity'] = serialize($request->quantity);
        HajjiHajj::create($allData);

        return redirect('hajj');
    }

    public function hajj_edit($id)
    {
        $hajj_edit = HajjiHajj::where('id',$id)->first();
        $feature_id_array =  unserialize($hajj_edit->features);
        $feature_listed = DB::table('features')->whereIn('id', $feature_id_array)->get();
        $packages_listed = DB::table('packages')->where('id',$hajj_edit->package_id)->first();
        $packages = DB::table('packages')->where('package_type',$hajj_edit->type)->get();
        $features = DB::table('features')->where('status','Active')->get();
        $groups = Groups::pluck('title','id');
        return view('profile/hajj_edit',['hajj_edit'=>$hajj_edit,'packages'=>$packages,'groups'=>$groups,'features'=>$features,'packages_listed'=>$packages_listed,'feature_listed'=>$feature_listed,'feature_id_array'=>$feature_id_array]);
    }

    public function hajj_update(Request $request)
    {
        $user=HajjiHajj::where('id',$request->id)->first();
        $user->year=$request->year;
        $user->type=$request->type;
        $user->package_id=$request->package_id;
        $user->features = serialize($request->feature);
        $user->quantity = serialize($request->quantity);
        $user->group_id=$request->group_id;
        $user->total_price=$request->total_price;
        $user->save();
        return redirect('hajj');
    }

    public function hajj_detail($id)
    {
        $hajj_edit = HajjiHajj::where('id',$id)->first();
        $features =  unserialize($hajj_edit->features);
        $feature_listed = DB::table('features')->whereIn('id', $features)->get();
        $packages_listed = DB::table('packages')->where('id',$hajj_edit->package_id)->first();
        $packages = DB::table('packages')->where('package_type',$hajj_edit->type)->get();
        $features = DB::table('features')->where('status','Active')->get();
        $group = Groups::where('id',$hajj_edit->group_id)->value('title');
        return view('profile/hajj_detail',['hajj_edit'=>$hajj_edit,'packages'=>$packages,'group'=>$group,'features'=>$features,'packages_listed'=>$packages_listed,'feature_listed'=>$feature_listed]);
    }





                             /* group activities*/

    public function groups()
    {
        $groups = Groups::where('group_leader_id',Auth::id())->get();
        return view('profile/groups',['groups'=>$groups]);
    }

    public function group_create(Request $request)
    {
        return view('profile/group_create');
    }



    public function group_insert(Request $request)
    {
        $allData=$request->all();
        $allData['group_leader_id'] = Auth::id();
        Groups::create($allData);

        return redirect('groups');
    }

    public function group_edit($id)
    {
        $group_edit = Groups::where('id',$id)->first();
        return view('profile/group_edit',['group_edit'=>$group_edit]);
    }

    public function group_update(Request $request)
    {
        $user=Groups::where('id',$request->id)->first();
        $user->title=$request->title;
        $user->year=$request->year;
        $user->type=$request->type;

        $user->save();
        return redirect('groups');
    }



















}
