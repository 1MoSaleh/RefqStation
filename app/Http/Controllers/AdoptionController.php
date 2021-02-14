<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Lost;
use App\Media;
use App\Adoption;
use App\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class AdoptionController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth','CheckBlocked'])->except(['index', 'show']);

    }

    public function index()
    {
        $adoption = Adoption::with(['pet', 'media', 'contact'])
            ->where([
                ['statues', '!=', 'closed'],
                ['statues', '!=', 'blocked']
            ])
            ->latest()
            ->paginate(12);
        $layout = 'adoption';
        return view('index', ['layout' => $layout, 'adoption' => $adoption, 'mainAdoption'=>'yes']);
    }

    public function create()
    {
        $layout = 'adoption';
        return view('create', ['layout' => $layout]);
    }

    public function store(Request $request)
    {
        //ValidationController::termsAndConditions($request);
        ValidationController::adoption($request);
        if ($request->has('link')){
            ValidationController::contactAdoption($request);
        }else{
            ValidationController::contact($request);
        }
        ValidationController::media($request);
        $country = 'sa';
        // make object for contact and insert data ----------------------------
        $contact = new Contact();
        if ($request->has('link')){
            $contact->type = 'type2';
            $contact->link = $request->input('link');
        }else{
            $contact->type = 'type1';
            $contact->phoneNumber = $request->input('phoneNumber');
            $contact->whatsapp = $request->has('whatsapp') ? 'yes':'no';
            $contact->twitter = $request->input('twitter');
            $contact->instagram = $request->input('instagram');
        }
        $contact->country = $country;
        $contact->city = $request->input('city');
        $contact->neighborhood = $request->input('neighborhood');
        $contact->save();
        //---------------------------------------------------------------------
        $pet = new Pet();
        $pet->type = $request->input('type');
        $pet->name = $request->input('name');
        $pet->gender = $request->input('gender');
        $pet->family = $request->input('family');
        $pet->age = $request->input('age');
        $pet->castration = $request->input('castration');
        $pet->vaccinated = $request->input('vaccinated');
        $pet->litterBox = $request->input('litterBox');
        $pet->behavior = $request->input('behavior');
        $pet->reason = $request->input('reason');
        $pet->healthStatues = $request->input('healthStatues');
        $pet->save();
        //---------------------------------------------------------------------
        // temb variabels to containe optional data
        $statues = 'added';  // default value
        $adoption = new Adoption();
        $adoption->type = $request->input('type');
        //$adoption->title = $request->input('title');
        $adoption->details = $request->input('details');
        $adoption->conditions = $request->input('conditions');
        $adoption->statues = $statues;
        if (Auth::check()){
            $adoption->user_id = Auth::id();
        }
        $adoption->contact_id = $contact->id;
        $adoption->pet_id = $pet->id;
        $adoption->save();
        //--------------------Images------------------------------------------------

         if ($request->hasFile('images')) {
             $file = $request->file('images');
             $id = $adoption->id;
             $upload_dir = "/media/adoption/images";
             $layoutName = 'Adoption';
             MediaController::makeImages($file, $id, $upload_dir, $layoutName);
         }

             //-------------------------------- video ---------------------
        if ($request->hasFile('video')) {
                $file = $request->file('video');
                $id = $adoption->id;
                $upload_dir = "/media/adoption/videos";
                $layoutName = 'Adoption';
                MediaController::makeVideos($file, $id, $upload_dir, $layoutName);

        }

        Session::flash('message', 'تم إنشاء طلب التبني بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('adoption.show', $adoption->id);

    }

    public function edit($id)
    {
        $adoption = Adoption::with(['pet', 'contact', 'media'])
            ->where('adoption.id', '=', "$id")
            ->get();
        $layout = 'adoption';
        if ($adoption[0]->user_id != Auth::id()) {
            return abort(401);
        }
        if ($adoption[0]->statues == 'blocked'){
            return redirect()->back()->with('message','العنصر الذي تحاول الوصول له محظور');
        }
        return view('update', ['layout' => $layout, 'update' => $adoption]);
    }

    public function update(Request $request)
    {
        ValidationController::adoption($request);
        if ($request->has('link')){
            ValidationController::contactAdoption($request);
        }else{
            ValidationController::contact($request);
        }        ValidationController::media($request);
        $adoption = Adoption::find($request->input('id'));
        if ($adoption->user_id != Auth::id()) {
            return abort(401);
        }
        // temp data
        $country = 'sa';
        $statues = 'updated';
        //-----------------------------------------------------------
        $contact = Contact::find($adoption->contact_id);
        if ($request->has('link')){
            $contact->type = 'type2';
            $contact->link = $request->input('link');
        }else{
            $contact->type = 'type1';
            $contact->phoneNumber = $request->input('phoneNumber');
            $contact->whatsapp = $request->has('whatsapp') ? 'yes':'no';
            $contact->twitter = $request->input('twitter');
            $contact->instagram = $request->input('instagram');
        } $contact->country = $country;
        $contact->city = $request->input('city');
        $contact->save();
        //-----------------------------------------------------------
        $pet = Pet::find($adoption->pet_id);
        $pet->type = $request->input('type');
        $pet->name = $request->input('name');
        $pet->gender = $request->input('gender');
        $pet->family = $request->input('family');
        $pet->age = $request->input('age');
        $pet->castration = $request->input('castration');
        $pet->vaccinated = $request->input('vaccinated');
        $pet->litterBox = $request->input('litterBox');
        $pet->behavior = $request->input('behavior');
        $pet->reason = $request->input('reason');
        $pet->healthStatues = $request->input('healthStatues');
        $pet->save();
        //-----------------------------------------------------------
         $adoption->details = $request->input('details');
        $adoption->conditions = $request->input('conditions');
        $adoption->statues = $statues;
        $adoption->save();

        //------------------------images-------------------------------------
        if ($request->hasFile('images')) {
            // remove image before add new one
            $media = Media::where('adoption_id',$adoption->id)->get();
            MediaController::deleteImages($media);
            // start add the new one
            $file = $request->file('images');
            $id = $adoption->id;
            $upload_dir = "/media/adoption/images";
            $layoutName = 'Adoption';
            MediaController::makeImages($file, $id, $upload_dir, $layoutName);
        }

        //-------------------------------- video ---------------------
        if ($request->hasFile('video')) {
            // remove videos before add new one
            $media = Media::where('adoption_id',$adoption->id)->get();
            MediaController::deleteVideos($media);
            // start add the new one
            $file = $request->file('video');
            $id = $adoption->id;
            $upload_dir = "/media/adoption/videos";
            $layoutName = 'Adoption';
            MediaController::makeVideos($file, $id, $upload_dir, $layoutName);
        }

        Session::flash('message', 'تم التحديث بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->action('AdoptionController@show', $adoption->id);
    }

    public function close($id){
        $adoption = Adoption::find($id);
        if ($adoption->user_id != Auth::id()) {
            return abort(401);
        }
        if ($adoption->statues == 'closed'){
            Session::flash('message', 'هذا العنصر تم إغلاقه مسبقاً!');
            return redirect()->back();
        }
        if ($adoption != null) {
            $adoption->statues = 'closed';
            $adoption->save();
        } else {
            Session::flash('message', 'هذا العنصر محذوف مسبقاً!');
            return redirect()->back();
        }
        Session::flash('message', 'تم الإغلاق بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function recovery ($id) {
        $adoption = Adoption::find($id);
        if ($adoption->user_id != Auth::id()) {
            return abort(401);
        }
        if ($adoption->statues != 'closed'){
            Session::flash('message', 'هذا العنصر لم يتم إغلاقه من قبل المستخدم!');
            return redirect()->back();
        }
        if ($adoption != null) {
            $adoption->statues = 'recovered';
            $adoption->save();
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
        $adoption = Adoption::find($id);
        if ($adoption->user_id != Auth::id()) {
            return abort(401);
        }
        if ($adoption != null) {
            $adoption->delete();
        } else {
            Session::flash('message', 'هذا العنصر محذوف مسبقاً!');
            return redirect()->back();
        }
        $pet = Pet::find($adoption->pet_id);
        if ($pet != null) {
            $pet->delete();
        }
        $contact = Contact::find($adoption->contact_id);
        if ($contact != null) {
            $contact->delete();
        }
        $media = Media::where('adoption_id', $id);
        if ($media != null) {
            MediaController::deleteAll($media);
            foreach ($media as $item){
                $item->delete();
            }
        }
        Session::flash('message','تم الحذف بنجاح' );
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function show($id)
    {
        // check if the inserted id is not in our record will return not found page
        if (!Adoption::where('id',$id)->exists()){
            return abort(404);
        }
        $adoption = Adoption::with(['pet', 'contact', 'media'])
            ->where('adoption.id', '=', "$id")
            ->get();

        // check if blocked or closed.. we have three cases
        // 1)auth not admin = redirect to index
        // 2)auth admin = show
        // 3)unAuth = redirect to index

        if ($adoption[0]->statues == 'closed' || $adoption[0]->statues == 'blocked'){
            // if the user not admin then will redirect them to index else will enter
            // with message that said the content is blocked or closed
            if (Auth::check()){
                if (HelperController::isAuthAdmin()) {
                    $layout = 'adoption';
                    Session::flash('message','المحتوى الحالي مغلق أو محظور!' );
                    Session::flash('alert-class', 'alert-warning');
                    return view('show', ['layout' => $layout, 'show' => $adoption]);
                }
            }
            Session::flash('message', 'العنصر الذي تحاول الوصول له مغلق!');
            Session::flash('alert-class', 'alert-warning');
            return redirect()->route('adoption.index');
        }

        $layout = 'adoption';
        //Session::flash('temp_message','المحتوى تجريبي حالياً !' );
        return view('show', ['layout' => $layout, 'show' => $adoption]);
    }

}
