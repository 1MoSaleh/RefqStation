<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Media;
use App\Adoption;
use App\Rescue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class RescueController extends Controller
{
    //

    public function __construct()
    {
       // $this->middleware('auth')->only(['edit', 'update', 'close' , 'recovery' , 'delete']);
        $this->middleware(['auth','CheckBlocked'])->except(['index', 'show']);

    }

    public function index()
    {
        $rescue = Rescue::with(['media', 'contact'])
            ->where([
                ['statues', '!=', 'closed'],
                ['statues', '!=', 'blocked']
            ])
            ->latest()
            ->paginate(12);
        $layout = 'rescue';
        return view('index', ['layout' => $layout, 'rescue' => $rescue, 'mainRescue'=>'yes']);
    }

    public function create()
    {
        $layout = 'rescue';
        return view('create', ['layout' => $layout]);
    }

    public function store(Request $request)
    {
        //ValidationController::termsAndConditions($request);
        ValidationController::rescue($request);
        ValidationController::contactRescue($request);
        ValidationController::media($request);

        $country = 'sa';
        // make object for #contact and insert data ----------------------------
        $contact = new Contact();
        $contact->phoneNumber = $request->input('phoneNumber');
        $contact->whatsapp = $request->has('whatsapp') ? 'yes':'no';
        $contact->twitter = $request->input('twitter');
        $contact->instagram = $request->input('instagram');
        $contact->country = $country;
        $contact->city = $request->input('city');
        $contact->neighborhood = $request->input('neighborhood');
        $contact->lat = $request->input('lat');
        $contact->lng = $request->input('lng');
        $contact->save();

        //-------------------Rescue--------------------------------------------------
        // temp variabels to contain optional data
        $statues = 'added';  // default value

        $rescue = new Rescue();
        $rescue->details = $request->input('details');
        $rescue->need_degree = $request->input('need_degree');
        $rescue->type = $request->input('type');
        $rescue->healthStatues = $request->input('healthStatues');
        $rescue->violent = $request->input('violent');
        $rescue->statues = $statues;
        if (Auth::check()){
            $rescue->user_id = Auth::id();
        }
        $rescue->contact_id = $contact->id;
        $rescue->save();
        //--------------------Images------------------------------------------------
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $id = $rescue->id;
            $upload_dir = "/media/rescue/images";
            $layoutName = 'Rescue';
            MediaController::makeImages($file, $id, $upload_dir, $layoutName);
        }
        //-------------------------------- video ---------------------
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $id = $rescue->id;
            $upload_dir = "/media/rescue/videos";
            $layoutName = 'Rescue';
            MediaController::makeVideos($file, $id, $upload_dir, $layoutName);
        }


        Session::flash('message', 'تم إنشاء طلب الإنقاذ بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->action('RescueController@show', $rescue->id);
    }

    public function edit($id)
    {

        $layout = 'rescue';
        $rescue = Rescue::with(['contact', 'media'])
            ->where('rescue.id', '=', "$id")
            ->get();
        if ($rescue[0]->user_id != Auth::id()) {
            return abort(401);
        }
        if ($rescue[0]->statues == 'blocked'){
            return redirect()->back()->with('message','العنصر الذي تحاول الوصول له محظور');
        }
        return view('update', ['layout' => $layout, 'update' => $rescue]);
    }

    public function update(Request $request)
    {
        ValidationController::rescue($request);
        ValidationController::contactRescue($request);
        ValidationController::media($request);
        $rescue = Rescue::find($request->input('id'));
        if ($rescue->user_id != Auth::id()) {
            return abort(401);
        }
        $country = 'sa';
        $whatsapp = 'no';
        $statues = 'updated';  // default value

        //-----------------------------------------------------------
        $contact = Contact::find($rescue->contact_id);
        $contact->phoneNumber = $request->input('phoneNumber');
        $contact->whatsapp = $request->input('whatsapp');
        $contact->twitter = $request->input('twitter');
        $contact->instagram = $request->input('instagram');
        $contact->country = $country;
        $contact->city = $request->input('city');
        $contact->lat = $request->input('lat');
        $contact->lng = $request->input('lng');
        $contact->save();
        //------------------------------------------------------------
        $rescue->details = $request->input('details');
        $rescue->need_degree = $request->input('need_degree');
        $rescue->type = $request->input('type');
        $rescue->healthStatues = $request->input('healthStatues');
        $rescue->statues = $statues;
        $rescue->save();
        //--------------------Images----------------------------------
        if ($request->hasFile('images')) {
            // remove image before add new one
            $media = Media::where('rescue_id',$rescue->id)->get();
            MediaController::deleteImages($media);
            // start add the new one
            $file = $request->file('images');
            $id = $rescue->id;
            $upload_dir = "/media/rescue/images";
            $layoutName = 'Rescue';
            MediaController::makeImages($file, $id, $upload_dir, $layoutName);
        }
        //-------------------------------- video ---------------------
        if ($request->hasFile('video')) {
            // remove videos before add new one
            $media = Media::where('rescue_id',$rescue->id)->get();
            MediaController::deleteVideos($media);
            // start add the new one
            $file = $request->file('video');
            $id = $rescue->id;
            $upload_dir = "/media/rescue/videos";
            $layoutName = 'Rescue';
            MediaController::makeVideos($file, $id, $upload_dir, $layoutName);
        }

        Session::flash('message', 'تم التحديث بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->action('RescueController@show', $rescue->id);
    }

    public function close($id){
        $rescue = Rescue::find($id);
        if ($rescue->user_id != Auth::id()) {
            return abort(401);
        }
        if ($rescue->statues == 'closed'){
            Session::flash('message', 'هذا العنصر تم إغلاقه مسبقاً!');
            return redirect()->back();
        }
        if ($rescue != null) {
            $rescue->statues = 'closed';
            $rescue->save();
        } else {
            Session::flash('message', 'هذا العنصر محذوف مسبقاً!');
            return redirect()->back();
        }
        Session::flash('message', 'تم الإغلاق بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function recovery ($id) {
        $rescue = Rescue::find($id);
        if ($rescue->user_id != Auth::id()) {
            return abort(401);
        }
        if ($rescue->statues != 'closed'){
            Session::flash('message', 'هذا العنصر لم يتم إغلاقه من قبل المستخدم!');
            return redirect()->back();
        }
        if ($rescue != null) {
            $rescue->statues = 'recovered';
            $rescue->save();
        } else {
            Session::flash('message', 'هذا العنصر غير موجود!');
            return redirect()->back();
        }
        Session::flash('message', 'تمت الإستعادة بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function delete($id)
    {
        $rescue = Rescue::find($id);
        if ($rescue->user_id != Auth::id()) {
            return abort(401);
        }
        if ($rescue != null) {
            $rescue->delete();
        } else {
            Session::flash('message', 'هذا العنصر محذوف مسبقاً!');
            return redirect()->back();
        }
        $contact = Contact::find($rescue->contact_id);
        if ($contact != null) {
            $contact->delete();
        }
        $media = Media::where('rescue_id', "$id");
        if ($media != null) {
            MediaController::deleteAll($media);
            foreach ($media as $item){
                $item->delete();
            }
        }
        Session::flash('message', 'تم الحذف بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function show($id)
    {
        // check if the inserted id is not in our record will return not found page
        if (!Rescue::where('id',$id)->exists()){
            return abort(404);
        }
        $rescue = Rescue::with(['contact', 'media'])
            ->where('rescue.id', '=', "$id")
            ->get();

        // check if blocked or closed.. we have three cases
        // 1)auth not admin = redirect to index
        // 2)auth admin = show
        // 3)unAuth = redirect to index

        if ($rescue[0]->statues == 'closed' || $rescue[0]->statues == 'blocked') {
            // if the user not admin then will redirect them to index else will enter
            // with message that said the content is blocked or closed
            if (Auth::check()) {
                if (HelperController::isAuthAdmin()) {
                    $layout = 'rescue';
                    Session::flash('message', 'المحتوى الحالي مغلق أو محظور!');
                    Session::flash('alert-class', 'alert-warning');
                    return view('show', ['layout' => $layout, 'show' => $rescue]);
                }
                Session::flash('message', 'العنصر الذي تحاول الوصول له غير متاح!');
                Session::flash('alert-class', 'alert-warning');
                return redirect()->route('rescue.index');
            }
        }
        $layout = 'rescue';
        return view('show', ['layout' => $layout, 'show' => $rescue]);
    }

}
