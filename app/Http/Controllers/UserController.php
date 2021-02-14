<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Lost;
use App\Media;
use App\Adoption;
use App\Rescue;
use App\User;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Session;

class UserController extends Controller
{
    //
    public function __construct () {
        $this->middleware('auth')->except('show');
    }

    public function index(){
       // if (Auth::validate() == false)
        //    return redirect(route('main'))->with(['message'=> 'you have to login']);
        $user = User::find(Auth::id());
        $adoption = Adoption::where('adoption.user_id','=',Auth::id())
            ->latest()->get();
        $rescue =Rescue::where('rescue.user_id','=',Auth::id())
            ->latest()->get();
        $lost = Lost::where('lost.user_id','=',Auth::id())
            ->latest()->get();
        return view('profile',['adoption'=>$adoption , 'rescue'=>$rescue , 'lost'=>$lost , 'user'=>$user]);
    }
    public function show($id){
        // if (Auth::validate() == false)
        //    return redirect(route('main'))->with(['message'=> 'you have to login']);
        if (!User::where('id','=',$id)->exists()){
            abort(404);
        }
        $user = User::find($id);
        $adoption = Adoption::where('adoption.user_id','=',$id)->count();
        $rescue =Rescue::where('rescue.user_id','=',$id)->count();
        $lost = Lost::where('lost.user_id','=',$id)->count();
        return view('show_profile',['adoption'=>$adoption , 'rescue'=>$rescue , 'lost'=>$lost , 'user'=>$user]);
    }

    public function edit($id){
        $layout = 'user';
        $user = User::with(['contact','media'])
            ->where('id','=',"$id")
            ->get();
        if ($user[0]->id != Auth::id()){
            return abort(401);
        }
        return view('update', ['layout'=>$layout,'update'=>$user]);
    }

    public function update(Request $request){
        ValidationController::user($request);
        ValidationController::userMedia($request);
        ValidationController::userMedia($request);
        $user = User::find($request->input('id'));
        if ($user->id != Auth::id()) {
            return abort(401);
        }
        if (isset($user->contact_id)){
            $contact = Contact::find($user->contact_id);
        } else {
            $contact = new Contact();
        }
        $contact->twitter = $request->input('twitter');
        $contact->instagram = $request->input('instagram');
        $contact->save();

        $user->name = $request->input('name');
        $user->bio = $request->input('bio');
        $user->organizationName = $request->input('organizationName');
        $user->contact_id = $contact->id;
        $user->save();

        //--------------------Images------------------------------------------------
        if ($request->hasFile('image')) {
            // remove image before add new one
            $media = Media::where('user_id',$user->id)->get();
            MediaController::deleteImages($media);
            // start add the new one
            $file = array();
            array_push($file,$request->file('image'));
            $upload_dir = "/media/profile/images";
            $id = $user->id;
            $layoutName = 'UserProfile';
            MediaController::makeImages($file, $id, $upload_dir, $layoutName);
        }

        Session::flash('message', 'تم التحديث بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('user.profile');
        }
        // from stackOverFlow
        public function updateLoginInfo(Request $request){
            if(Auth::Check())
            {
                 ValidationController::UpdateLogin($request);

                    $current_password = Auth::User()->password;
                    if(Hash::check($request->input('current-password'), $current_password))
                    {
                        $user_id = Auth::User()->id;
                        $obj_user = User::find($user_id);
                        if ($request->input('password')){
                            $obj_user->password = Hash::make($request->input('password'));
                        }
                        $obj_user->email = $request->input('email');
                        $obj_user->save();
                        Session::flush('message', 'تم تحديث معلومات الدخول');
                        Session::flush('alert-class', 'alert-success');
                        return redirect()->route('user.profile');                    }
                    else
                    {
                        $error = array('current-password' => 'Please enter correct current password');
                        return response()->json(array('error' => $error), 400);
                    }
                }

            else
            {
                return abort(403);
            }

        }

}
