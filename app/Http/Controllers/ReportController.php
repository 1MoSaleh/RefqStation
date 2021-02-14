<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class ReportController extends Controller
{
    //
    public function show($id){
        $report = Report::find($id);
        return view('Admin_views.show_report', ['report'=>$report]);
    }

    public function addcontactus(Request $request){
        ValidationController::contactus($request);
        $report = new Report();
        $report->type = 'contactUs';
        $report->reason = $request->input('reason');
        $report->title = $request->input('title');
        $report->details = $request->input('details');
        $report->contact = $request->input('contact');
        $report->statues = 'added';
        if (Auth::check()){
            $report->sender_id = Auth::id();
        }
        $report->save();

        Session::flash('message', 'تم الإرسال بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();

    }



    // for parametar i suggest make hidden input hold the id for what will reported !
    public function addreport (Request $request , $id , $layout){
        if ($layout == 'order'){

        }elseif ($layout == 'lost'){

        }elseif ($layout == 'rescue'){

        }elseif ($layout == 'user'){ #we will implement it later

        }

    }


}
