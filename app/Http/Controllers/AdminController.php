<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Lost;
use App\Adoption;
use App\Report;
use App\Rescue;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
        // it make all pages available to all admins except these methods in except section:
        $this->middleware('CheckSubAdmin')->except(['upgradeToAdmin','upgradeToSubAdmin','downgradeToSubAdmin','downgradeToUser']);
        // this make these to methods available to admins and super admins
        $this->middleware('CheckAdmin')->only(['upgradeToSubAdmin','downgradeToUser']);
        // this make these to methods available to super admins
        $this->middleware('CheckSuperAdmin')->only(['upgradeToAdmin','downgradeToSubAdmin']);
    }

    public function index() {
        $users = User::all()->count();
        $adoption = Adoption::all()->count();
        $rescue = Rescue::all()->count();
        $lost = Lost::all()->count();
        $num_of_admins = User::all()->where('role','=','admin')->count();
        $num_of_subAdmins = User::all()->where('role','=','subAdmin')->count();
        $admins = $num_of_subAdmins + $num_of_admins;
        $reports = Report::all()->count();
        return view('/Admin_views/dashboard' , ['users'=>$users , 'adoption'=>$adoption,'rescue'=>$rescue,'lost'=>$lost, 'admins'=>$admins , 'reports'=>$reports]);
    }
    public function users () {
        $users = User::all();
        $num_blocked = User::all()->where('statues','=','blocked')->count();
        $num_unblocked = User::all()->where('statues','!=','blocked')->count();

        return view('/Admin_views/control/control_users', ['records'=>$users , 'layout'=>'User', 'show'=>'user.show','num_blocked'=>$num_blocked, 'num_unblocked'=>$num_unblocked]);
    }
    public function user (Request $request) {
        if (!Adoption::where('id',$request->input('id'))->exists()){
            return abort(404);
        }

        $users = User::where('id', $request->input('id'))->get();
        return view('/Admin_views/control/control_user', ['record'=>$users , 'layout'=>'User', 'show'=>'user.show']);
    }

    public function blockUser($id) {
        if (!Auth::check()) {
            abort(401);
        }
            $user = User::find($id);
            $user->statues = 'blocked';
            $user->save();
            Session::flash('message','تم الحظر بنجاح');
            Session::flash('alert-class','alert-success');
            return redirect()->back();
    }

    public function recoverUser($id) {
        if (!Auth::check()) {
            abort(401);
        }
        $user = User::find($id);
        $user->statues = 'unblocked';
        $user->save();
        Session::flash('message','تم رفع الحظر بنجاح');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
    }

    // control Adoption
    public function adoption () {
        $adoption = Adoption::all();
        $num_blocked = Adoption::all()->where('statues','=','blocked')->count();
        $num_unblocked = Adoption::all()->where('statues','!=','blocked')->count();

        return view('/Admin_views/control/control_adoption', ['records'=>$adoption , 'layout'=>'Adoption', 'show'=>'adoption.show','num_blocked'=>$num_blocked, 'num_unblocked'=>$num_unblocked]);
    }

    public function blockAdoption($id) {
        if (!Auth::check()) {
            abort(401);
        }
        $adoption = Adoption::find($id);
        $adoption->statues = 'blocked';
        $adoption->admin_id = Auth::id();
        $adoption->save();
        Session::flash('message','تم الحظر بنجاح');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
    }

    public function recoverAdoption($id) {
        if (!Auth::check()) {
            abort(401);
        }
        $adoption = Adoption::find($id);
        $adoption->statues = 'unblocked';
        $adoption->admin_id = Auth::id();
        $adoption->save();
        Session::flash('message','تم رفع الحظر بنجاح');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
    }

    // control lost
    public function lost () {
        $lost = Lost::all();
        $num_blocked = Lost::all()->where('statues','=','blocked')->count();
        $num_unblocked = Lost::all()->where('statues','!=','blocked')->count();

        return view('/Admin_views/control/control_lost', ['records'=>$lost , 'layout'=>'Lost', 'show'=>'lost.show','num_blocked'=>$num_blocked, 'num_unblocked'=>$num_unblocked]);
    }

    public function blockLost($id) {
        if (!Auth::check()) {
            abort(401);
        }
        $lost = Lost::find($id);
        $lost->statues = 'blocked';
        $lost->admin_id = Auth::id();
        $lost->save();
        Session::flash('message','تم الحظر بنجاح');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
    }

    public function recoverLost($id) {
        if (!Auth::check()) {
            abort(401);
        }
        $lost = Lost::find($id);
        $lost->statues = 'unblocked';
        $lost->admin_id = Auth::id();
        $lost->save();
        Session::flash('message','تم رفع الحظر بنجاح');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
    }


    // control rescue
    public function rescue () {
        $rescue = Rescue::all();
        $num_blocked = Rescue::all()->where('statues','=','blocked')->count();
        $num_unblocked = Rescue::all()->where('statues','!=','blocked')->count();

        return view('/Admin_views/control/control_rescue', ['records'=>$rescue , 'layout'=>'Rescue', 'show'=>'rescue.show','num_blocked'=>$num_blocked, 'num_unblocked'=>$num_unblocked]);
    }

    public function blockRescue($id) {
        if (!Auth::check()) {
            abort(401);
        }
        $rescue = Rescue::find($id);
        $rescue->statues = 'blocked';
        $rescue->admin_id = Auth::id();
        $rescue->save();
        Session::flash('message','تم الحظر بنجاح');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
    }

    public function recoverRescue($id) {
        if (!Auth::check()) {
            abort(401);
        }
        $rescue = Rescue::find($id);
        $rescue->statues = 'unblocked';
        $rescue->admin_id = Auth::id();
        $rescue->save();
        Session::flash('message','تم رفع الحظر بنجاح');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
    }

    public function reports() {
        $reports = Report::all();
        return view('Admin_views/control/control_reports', ['records'=>$reports,'layout'=>'Report', 'show'=>'reports.show']);
    }
    public function closeReport($id) {
        if (!Auth::check()) {
            abort(401);
        }
        $rescue = Report::find($id);
        $rescue->statues = 'closed';
        $rescue->save();
        Session::flash('message','تم الإغلاق بنجاح');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
    }

    public function recoverReport($id) {
        if (!Auth::check()) {
            abort(401);
        }
        $rescue = Report::find($id);
        $rescue->statues = 'unclosed';
        $rescue->save();
        Session::flash('message','تم رفع الإغلاق بنجاح');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
    }

    // control admin
    public function admins(){
        $admins = User::where('role','!=','user')->get();
        $num_of_admins = User::all()->where('role','=','admin')->count();
        $num_of_subAdmins = User::all()->where('role','=','subAdmin')->count();
        foreach ($admins as $item){
            $num_of_adoption = Adoption::where('admin_id', $item->id)->count();
            $num_of_lost = Lost::where('admin_id', $item->id)->count();
            $num_of_rescue = Rescue::where('admin_id', $item->id)->count();
            $item->num_of_cases = $num_of_lost + $num_of_adoption + $num_of_rescue;
        }

        return view('/Admin_views/control/control_admins', ['records'=>$admins , 'layout'=>'User', 'show'=>'user.show','num_admins'=>$num_of_admins, 'num_subAdmins'=>$num_of_subAdmins]);
    }
    public function upgradeToAdmin($id){
        if (!Auth::check()) {
            abort(401);
        }
                $user = User::find($id);
                $user->role = 'admin';
                $user->save();
                Session::flash('message', 'تمت الترقية بنجاح');
                Session::flash('alert-class', 'alert-success');
                return redirect()->back();
    }


    public function upgradeToSubAdmin($id){
        if (!Auth::check()) {
            abort(401);
        }
                $user = User::find($id);
                $user->role = 'subAdmin';
                $user->save();
                Session::flash('message', 'تمت الترقية بنجاح');
                Session::flash('alert-class', 'alert-success');
                return redirect()->back();
    }

    public function downgradeToSubAdmin($id){
        if (!Auth::check()) {
            abort(401);
        }
                $user = User::find($id);
                $user->role = 'subAdmin';
                $user->save();
                Session::flash('message', 'تم التخفيض بنجاح');
                Session::flash('alert-class', 'alert-success');
                return redirect()->back();
    }
    public function downgradeToUser($id){
        if (!Auth::check()) {
            abort(401);
        }
                $user = User::find($id);
                $user->role = 'user';
                $user->save();
                Session::flash('message', 'تم التخفيض بنجاح');
                Session::flash('alert-class', 'alert-success');
                return redirect()->back();

    }
    public function controlByContact(){
        return view('Admin_views/control_by_contact');
    }

    public function getByContact (Request $request){

    $lost = Lost::with('contact')->whereHas( 'contact', function ($q) use ($request) {
            $q->where("$request->type",'=',"$request->data");
    })->latest()->get();
        $lost_id = array();
        foreach ($lost as $item){
                array_push($lost_id, $item->id);
        }

        $rescue = Rescue::with('contact')->whereHas( 'contact', function ($q) use ($request) {
            $q->where("$request->type",'=',"$request->data");
        })->latest()->get();
        $rescue_id = array();
        foreach ($rescue as $item) {
                array_push($rescue_id, $item->id);
        }

        $adoption = Adoption::with('contact')->whereHas( 'contact', function ($q) use ($request) {
            $q->where("$request->type",'=',"$request->data");
        })->latest()->get();
        $adoption_id = array();
        foreach ($adoption as $item){
                array_push($adoption_id ,$item->id);
        }
                return view('Admin_views/get_by_contact' , ['adoption'=>$adoption, 'adoption_id'=>$adoption_id
                    , 'lost'=>$lost, 'lost_id'=>$lost_id
                    ,'rescue'=>$rescue, 'rescue_id'=>$rescue_id]);
    }

    public function blockAll (Request $request , $type){
        foreach ($request->input('input') as $item){
            if ($type == 'adoption'){
                AdminController::blockAdoption($item);
            }elseif ($type == 'rescue'){
                AdminController::blockRescue($item);
            }elseif ($type == 'lost'){
                AdminController::blockLost($item);
            }
        }
        return redirect()->back();
    }

    public function recoverAll (Request $request , $type){
        foreach ($request->input('input') as $item){
            if ($type == 'adoption'){
                AdminController::recoverAdoption($item);
            }elseif ($type == 'rescue'){
                AdminController::recoverRescue($item);
            }elseif ($type == 'lost'){
                AdminController::recoverLost($item);
            }
        }
        return redirect()->back();
    }
}
