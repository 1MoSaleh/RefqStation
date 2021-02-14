<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ValidationController extends Controller
{
    //

    static public function termsAndConditions(Request $request)
    {
        $validatedData = $request->validate([
            'termsAndConditions' => ['bail', 'required', 'accepted'],
        ]);
    }
    static public function adoption(Request $request){
        $validatedData = $request->validate([
            'age'=>['required','max:255'],
            'gender'=>['required','max:255'],
            'castration'=>['required','max:255'],
            'vaccinated'=>['required','max:255'],
            'litterBox'=>['required','max:255'],
            'name'=>['nullable','string','max:255'],
            'behavior'=>['required','string','max:255'],
            'healthStatues'=>['required','string','max:255'],
            'reason'=>['required','string','max:255'],
            'family'=>['nullable','string','max:255'],
            'details'=>['nullable','string','max:500'],
            'conditions'=>['nullable','string','max:500'],

        ]);
    }

    static public function lost(Request $request){
        $validatedData = $request->validate([
            'age'=>['required','max:255'],
            'gender'=>['required','max:255'],
            'name'=>['nullable','string','max:255'],
            'details'=>['nullable','string','max:500'],
            'catDetails'=>['nullable','string','max:500'],
            'dateOfLost'=>['date','required','max:255'],
        ]);
    }
    static public function rescue(Request $request){
        $validatedData = $request->validate([
            'need_degree'=>['required','max:255'],
            'violent'=>['required','max:255'],
            'healthStatues'=>['nullable','string','max:255'],
            'details'=>['nullable','string','max:500'],
        ]);
    }

    static public function contact(Request $request){
        $validatedData = $request->validate([
            'city'=>['required','max:255'],
            'neighborhood'=>['required', 'string' ,'max:255'],
            'phoneNumber'=>['required','max:15'],
            'twitter'=>['nullable','string','max:255'],
            'instagram'=>['nullable','string','max:255'],
        ]);
    }

    static public function contactAdoption(Request $request){
        $validatedData = $request->validate([
            'city'=>['required','max:255'],
            'neighborhood'=>['required', 'string' ,'max:255'],
            'link'=>['required','string','max:255'],
        ]);
    }
    static public function contactRescue(Request $request){
        $validatedData = $request->validate([
            'city'=>['required','max:255'],
            'neighborhood'=>['required', 'string' ,'max:255'],
            'lat'=>['required','max:255'],
            'lng'=>['required','max:255'],
            'phoneNumber'=>['nullable','max:15'],
            'twitter'=>['nullable','string','max:255'],
            'instagram'=>['nullable','string','max:255'],
        ]);
    }

    static public function media(Request $request){
       // validate images
        if ($request->hasFile('images')) {
                $validatedData = $request->validate([
                    'images.*'=> ['bail', 'required', 'image','mimes:jpeg,png,jpg', 'max:5120']
                ]);
        }
        // validate videos
        if ($request->hasFile('video')){
            $validatedData = $request->validate([
                'video' => ['mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi' , 'max:30000']
            ]);
        }

    }

    static public function user(Request $request){
        $validatedData = $request->validate([
            'name'=>['required','string','max:255'],
            'bio'=>['nullable','string','max:255'],
            'organizationName'=>['nullable','string','max:255'],
            'twitter'=>['nullable','string','max:255'],
            'instagram'=>['nullable','string','max:255'],
        ]);
    }
    static public function userMedia(Request $request)
    {
        // validate images
        if ($request->hasFile('image')) {
            $validatedData = $request->validate([
                'images' => ['nullable','image', 'mimes:jpeg,png,jpg', 'max:5120']
            ]);
        }
    }
    public static function UpdateLogin(Request $request){

           /*
             $messages = [
                'current-password.required' => 'Please enter current password',
                'password.required' => 'Please enter password',
            ];

            $validator = Validator::make($data, [

                'current-password' => 'required',
                'password' => 'required|min:6|same:password',
                'password_confirmation' => 'required|same:password',
            ], $messages);

            return $validator;
        */
        $validatedData = $request->validate([
            'email' => ['required','string','email','max:255','unique:users,email,'.Auth::id()],
            'password' => ['nullable','min:6','same:password'],
            'password_confirmation' => ['nullable','same:password'],
        ]);
    }

    public static function contactus ($request){
        $validatedData = $request->validate([
            'reason'=>['required','max:255'],
            'title'=>['required','string','max:255'],
            'details'=>['required','string','max:550'],
            'email'=>['nullable','email', 'string','max:255'],
        ]);
    }
}
