<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Lost;
use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class LostController extends Controller
{
    public function __construct()
    {
     // $this->middleware('auth')->only(['edit', 'update', 'close' , 'recovery' , 'delete']);
        $this->middleware(['auth','CheckBlocked'])->except(['index', 'show']);

    }

    // you should send your type to the view ****
    public function index()
    {
        $lost = Lost::with(['media', 'contact'])
            ->where([
                ['statues', '!=', 'closed'],
                ['statues', '!=', 'blocked']
            ])
            ->latest()
            ->paginate(12);
        $layout = 'lost';
        return view('index', ['layout' => $layout, 'lost' => $lost, 'mainLost'=>'yes']);
    }

    // you should send your type to the view ****
    public function create()
    {
        $layout = "lost";
        return view('create', ['layout' => $layout]);
    }

    public function store(Request $request)
    {
        //ValidationController::termsAndConditions($request);
        ValidationController::lost($request);
        ValidationController::contact($request);
        ValidationController::media($request);
        // default value for now:
        $country = 'sa';
        // make object for contact and insert data
        //---------------------------------------------------------------------
        $contact = new Contact();
        $contact->phoneNumber = $request->input('phoneNumber');
        $contact->whatsapp = $request->has('whatsapp') ? 'yes':'no';
        $contact->twitter = $request->input('twitter');
        $contact->instagram = $request->input('instagram');
        $contact->country = $country;
        $contact->city = $request->input('city');
        $contact->neighborhood = $request->input('neighborhood');
         $contact->save();
        //---------------------------------------------------------------------
        // temb variabels to containe optional data
        $statues = 'added';  // default value
        $lost = new Lost();
        $lost->dateOfLost = $request->input('dateOfLost');
        $lost->type = $request->input('type');
        $lost->details = $request->input('details');
        $lost->name = $request->input('name');
        $lost->age = $request->input('age');
        $lost->gender = $request->input('gender');
        $lost->catDetails = $request->input('catDetails');
        $lost->statues = $statues;
       if (Auth::check()){
           $lost->user_id = Auth::id();
       }
        $lost->contact_id = $contact->id;
        $lost->save();
        // to get id after insert then show his order
        //--------------------Images------------------------------------------------

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $id = $lost->id;
            $upload_dir = "/media/lost/images";
            $layoutName = 'Lost';
            MediaController::makeImages($file, $id, $upload_dir, $layoutName);
        }

        //-------------------------------- video ---------------------
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $id = $lost->id;
            $upload_dir = "/media/lost/videos";
            $layoutName = 'Lost';
            MediaController::makeVideos($file, $id, $upload_dir, $layoutName);
        }

        Session::flash('message', 'تم إنشاء البلاغ بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->action('LostController@show', $lost->id);
    }

    // you should send your type to the view ****
    public function edit($id)
    {
        $layout = 'lost';
        $lost = Lost::with(['contact', 'media'])
            ->where('lost.id', '=', "$id")
            ->get();

        if ($lost[0]->user_id != Auth::id()) {
            return abort(401);
        }
        if ($lost[0]->statues == 'blocked'){
            return redirect()->back()->with('message','العنصر الذي تحاول الوصول له محظور');
        }
        return view('update', ['layout' => $layout, 'update' => $lost]);
    }


    public function update(Request $request)
    {
        ValidationController::lost($request);
        ValidationController::contact($request);
        ValidationController::media($request);

        $lost = Lost::find($request->input('id'));
        // default value for country now:
        $country = 'sa';
        $whatsapp = 'no';
        //---------------------------------------------------------------------
        // make object for contact and insert data
        $contact = Contact::find($lost->contact_id);
        $contact->phoneNumber = $request->input('phoneNumber');
        $contact->whatsapp = $whatsapp;
        $contact->twitter = $request->input('twitter');
        $contact->instagram = $request->input('instagram');
        $contact->country = $country;
        $contact->city = $request->input('city');
        $contact->neighborhood = $request->input('neighborhood');
        $contact->save();
        //---------------------------------------------------------------------
        $statues = 'updated';  // default value
        $lost->dateOfLost = $request->input('dateOfLost');
        $lost->details = $request->input('details');
        $lost->type = $request->input('type');
        $lost->name = $request->input('name');
        $lost->age = $request->input('age');
        $lost->gender = $request->input('gender');
        $lost->catDetails = $request->input('catDetails');
        $lost->statues = $statues;
        $lost->save();
        //--------------------Images------------------------------------------------
        if ($request->hasFile('images')) {
            // remove image before add new one
            $media = Media::where('lost_id',$lost->id)->get();
            MediaController::deleteImages($media);
            // start add the new one
            $file = $request->file('images');
            $id = $lost->id;
            $upload_dir = "/media/lost/images";
            $layoutName = 'Lost';
            MediaController::makeImages($file, $id, $upload_dir, $layoutName);
        }
        //-------------------------------- video ---------------------
        if ($request->hasFile('video')) {
            // remove videos before add new one
            $media = Media::where('lost_id',$lost->id)->get();
            MediaController::deleteImages($media);
            // start add the new one
            $file = $request->file('video');
            $id = $lost->id;
            $upload_dir = "/media/lost/videos";
            $layoutName = 'Lost';
            MediaController::makeVideos($file, $id, $upload_dir, $layoutName);
        }

        Session::flash('message', 'تم التحديث بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->action('LostController@show', $lost->id);

    }
    public function close($id){
        $lost = Lost::find($id);
        if ($lost->user_id != Auth::id()) {
            return abort(401);
        }
        if ($lost->statues == 'closed'){
            Session::flash('message', 'هذا العنصر تم إغلاقه مسبقاً!');
            return redirect()->back();
        }
        if ($lost != null) {
            $lost->statues = 'closed';
            $lost->save();
        } else {
            Session::flash('message', 'هذا العنصر محذوف مسبقاً!');
            return redirect()->back();
        }
        Session::flash('message', 'تم الإغلاق بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function recovery ($id) {
        $lost = Lost::find($id);
        if ($lost->user_id != Auth::id()) {
            return abort(401);
        }
        if ($lost->statues != 'closed'){
            Session::flash('message', 'هذا العنصر لم يتم إغلاقه من قبل المستخدم!');
            return redirect()->back();
        }
        if ($lost != null) {
            $lost->statues = 'recovered';
            $lost->save();
        } else {
            Session::flash('message', 'هذا العنصر غير موجود!');
            return redirect()->back();
        }
        Session::flash('message', 'تمت الإستعادة بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }


    // back() should be with middelware web
    public function delete($id)
    {
        $lost = Lost::find($id);
        if ($lost->user_id != Auth::id()) {
            return abort(401);
        }
        if ($lost != null) {
            $lost->delete();
        } else {
            Session::flash('message', 'هذا العنصر محذوف مسبقاً!');
            return redirect()->back();
        }
        $contact = Contact::find($lost->contact_id);
        if ($contact != null) {
            $contact->delete();
        }
        $media = Media::where('lost_id', $id);
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

    // you should send your type to the view *****
    public function show($id)
    {
        // check if the inserted id is not in our record will return not found page
        if (!Lost::where('id',$id)->exists()){
        return abort(404);
        }

        $lost = Lost::with(['contact', 'media'])
            ->where('lost.id', '=', "$id")
            ->get();

     // check if blocked or closed.. we have three cases
        // 1)auth not admin = redirect to index
        // 2)auth admin = show
        // 3)unAuth = redirect to index

        if ($lost[0]->statues == 'closed' || $lost[0]->statues == 'blocked'){
            // if the user not admin then will redirect them to index else will enter
            // with message that said the content is blocked or closed
            if (Auth::check()) {
                if (HelperController::isAuthAdmin()) {
                    $layout = 'lost';
                    Session::flash('message','المحتوى الحالي مغلق أو محظور!' );
                    Session::flash('alert-class', 'alert-warning');
                    return view('show', ['layout' => $layout, 'show' => $lost]);
                }
            }
            Session::flash('message','العنصر الذي تحاول الوصول له غير متاح!');
            Session::flash('alert-class', 'alert-warning');
            return redirect()->route('lost.index');
        }
        $layout = 'lost';
        return view('show', ['layout' => $layout, 'show' => $lost]);
    }
}
