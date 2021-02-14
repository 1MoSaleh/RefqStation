<?php

namespace App\Http\Controllers;

use App\Lost;
use App\Adoption;
use App\Rescue;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    //
    public function search (Request $request) {
        if ($request->has('section')){
            if ($request->section == 'التبني'){
                return $this->adoption_filter($request);
            }elseif ($request->section == 'الإنقاذ'){
                return $this->rescue_filter($request);
            }elseif ($request->section == 'الحيوانات المفقودة'){
                return $this->lost_filter($request);
            }

        } else {
            return redirect()->back();
        }
    }


    public function adoption_filter(Request $request){

             $adoption = Adoption::with(['media', 'contact','pet'])->whereHas( 'contact', function ($q) use ($request){
            if ($request->has('city') && $request->city != null)
                $q->where('contact.city','=', $request->city);
        })->whereHas(   'pet', function ($q) use ($request){
             if ($request->has('type') && $request->type != null)
                 $q->where('pets.type','=' ,$request->type);
             if ($request->has('age') && $request->age != null)
                $q->where('pets.age','=' ,$request->age);
            if ($request->has('gender') && $request->gender != null)
                $q->where('pets.gender','=' ,$request->sex);
            if ($request->has('castration')  && $request->castration != null)
                $q->where('pets.castration','=', $request->castration);
            if ($request->has('vaccinated')  && $request->vaccinated != null)
                $q->where('pets.vaccinated','=', $request->vaccinated);
        } )
                 ->where([
                     ['statues', '!=', 'closed'],
                     ['statues', '!=', 'blocked']
                 ])
                 ->latest()->paginate(12);

        return view('index', ['layout'=>'adoption', 'adoption'=>$adoption, 'filtered'=>'yes']);
    }

   public function rescue_filter(Request $request){
       $rescue = Rescue::with(['media', 'contact'])->where(function ($q) use ($request) {
           if ($request->has('type') && $request->type != null)
               $q->where('type','=' ,$request->type);
           if ($request->has('need_degree') && $request->need_degree != null)
               $q->where('need_degree', '=', $request->need_degree);
       })->whereHas('contact', function ($q) use ($request) {
           if ($request->has('city') && $request->city != null )
               $q->where('contact.city', '=', $request->city);

       })->where([
                   ['statues', '!=', 'closed'],
                   ['statues', '!=', 'blocked']
               ])
               ->latest()->paginate(12);


       return view('index', ['layout'=>'rescue', 'rescue'=>$rescue , 'filtered'=>'yes']);
   }


   public function lost_filter(Request $request){
       $lost = Lost::with(['media', 'contact'])->where(function ($q) use ($request) {
           if ($request->has('type') && $request->type != null)
               $q->where('type','=' ,$request->type);
           if ($request->has('gender') && $request->gender != null)
               $q->where('gender', '=', $request->gender);
           if ($request->has('age') && $request->age != null)
               $q->where('age', '=', $request->age);
       })->whereHas('contact', function ($q) use ($request) {
           if ($request->has('city') && $request->city != null)
               $q->where('contact.city', '=', $request->city);
       })->where([
               ['statues', '!=', 'closed'],
               ['statues', '!=', 'blocked']
           ])
           ->latest()->paginate(12);

       return view('index', ['layout'=>'lost', 'lost'=>$lost, 'filtered'=>'yes']);

   }
}
