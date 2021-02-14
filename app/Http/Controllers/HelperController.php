<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelperController extends Controller
{
    //
        // to see is the user admin or user
    public static function isAuthAdmin (){
        if (!Auth::check()){
            return false;
        }
        if (Auth::user()->role == 'superAdmin'|| Auth::user()->role == 'admin'|| Auth::user()->role == 'subAdmin'){
            return true;
        }
        return false;
    }

    public static function isAdmin (){
        if (Auth::user()->role == 'superAdmin'|| Auth::user()->role == 'admin'){
            return true;
        }
        return false;
    }

    public static function isSuperAdmin (){
        if (Auth::user()->role == 'superAdmin'){
            return true;
        }
        return false;
    }



// this method will calculate the number of years.. months .. days .... minutes between current date and input date
// and designed with arabic worlds to get the correct word of the value
    static function calculate_date ($input){
        if ($input == null){
            return;
        }
        $date1 =  new DateTime(date("Y-m-d H:i:s"));
        $date2 = new DateTime($input);
        $interval = $date1->diff($date2);
        $years = $interval->y;
        $months = $interval->m;
        $days = $interval->d;
        $hours = $interval->h;
        $minutes = $interval->i;
        $years_stmt = '';
        $months_stmt = '';
        $days_stmt = '';
        $hours_stmt = '';
        $minutes_stmt = '';

        // for correct years word in arabic:
        if ($years == 0){
            $years = '';
            $years_stmt = '';
        } elseif ($years == 2){
            $years_stmt = 'سنتين';
        }elseif (2 < $years && $years < 11) {
            $years_stmt = 'سنوات';
        }else{
            $years_stmt = 'سنة';
        }
        // for correct months word in arabic:
        if ($months == 0){
            $months='';
            $months_stmt = '';
        } elseif ($months == 2){
            $months_stmt = 'شهرين';
        }elseif (2 < $months && $months < 11) {
            $months_stmt = 'شهور';
        }else{
            $months_stmt = 'شهر';
        }
        // for correct days word in arabic:
        if ($days == 0){
            $days = '';
            $days_stmt = '';
        } elseif ($days == 2){
            $days_stmt = 'يومين';
        }elseif (2 < $days && $days < 11) {
            $days_stmt = 'ايام';
        }else{
            $days_stmt = 'يوم';
        }
        // for correct hours word in arabic:
        if ($days <= 0 || $months <= 0 && $years <= 0 ){
            if ($hours == 0){
                $hours ='';

            } elseif ($hours == 2){
                $hours_stmt = 'ساعتين';
            }elseif (2 < $hours && $hours < 11) {
                $hours_stmt = 'ساعات';
            }else{
                $hours_stmt = 'ساعه';
            }
        } else{
            $hours='';
        }
        // for correct minutes word in arabic:
        if ($days == 0 && $months == 0 && $years == 0 ){
            if ($minutes == 0){
                $minutes_stmt ='اقل من دقيقة';
                $minutes='';
            } elseif ($minutes == 2){
                $minutes_stmt = 'دقيقتين';
            }elseif (2 < $minutes && $minutes < 11) {
                $minutes_stmt = 'دقائق';
            }else{
                $minutes_stmt = 'دقيقة';
            }
        }else{
            $minutes = '';
        }
        return $years.' '.$years_stmt. ' ' .$months. ' ' .$months_stmt. ' ' .$days. ' '.$days_stmt. ' ' .$hours. ' ' .$hours_stmt. ' ' .$minutes. ' ' .$minutes_stmt ;
    }
        // at the 2 bottom methods we will get color and text for need degree char, 25, 50, 75 and 100 are the allowed values else will be error values
    static function get_color_need_degree($input){

            if ($input == 25){
                return'#ffc107';
                $text_degree = 'عادية';
            }elseif ($input == 50) {
                return'#ff9800';
                $text_degree = 'حرجة';
            }elseif ($input == 75) {
                return'#D64541';
                $text_degree = 'حرجة جداً';
            }elseif ($input == 100) {
                return'#830400';
                $text_degree = 'طارئة';
            }else{
                return 'white';
            }


    }
    static function get_text_need_degree($input){
        if ($input == 25){
            return'عادية';
        }elseif ($input == 50) {
            return'حرجة';
        }elseif ($input == 75) {
            return'حرجة جداً';
        }elseif ($input == 100) {
            return'طارئة';
        } else {
            return 'يوجد خطأ';
        }
    }
        // type referce to type of social media .. twitter .. whatsapp...etc
    static function build_share_link ($input , $layout , $type , $url){
        $stmt='';
        $petType='';
        $city=$input[0]->contact->city;       #for all types
        $neighborhood=$input[0]->contact->neighborhood;       #for all types
        $gender ='';    #for adoption order and lost
        $castration=''; #for adoption order
        $need_degree='';#for rescue

        $link='#';
                #Whatsapp
       // $default_whatsapp = 'https://wa.me/?text='

                #Twitter
       // $default_twitter = 'http://twitter.com/share?text=text/ntest new line &url={{Request::url()}}&hashtags=hashtag1,hashtag2,hashtag3';
        $hashtags = '';

                #Telegram
        // $default_telegram = https://telegram.me/share/url?url=<URL>&text=<TEXT>;

        if ($layout == 'adoption'){
            //check the type of pet
            if ($input[0]->pet->type == 'القطط') {
                $petType = 'قط';
            }elseif ($input[0]->pet->type == 'الكلاب'){
                $petType = 'كلب';
            }elseif ($input[0]->pet->type == 'الطيور'){
                $petType = 'حيوان من فئة الطيور';
            }else{
                $petType = 'حيوان غير مصنف';
            }

                    //check the gender of the input
                    if ($input[0]->pet->gender == 'ذكر'){
                        $gender = 'ذكر';
                    }elseif ($input[0]->pet->gender == 'انثى'){
                        $gender = 'انثى';
                    }else{
                        $gender='';
                    }
                    //check castration
                    if ($input[0]->pet->castration == 'نعم'){
                     if ($gender == 'انثى'){
                         $castration = 'معقمة';
                     }else{
                         $castration = 'معقم';
                     }
                    }
                    $stmt = $petType ." ". $gender . ', ' . $castration . ' للتبني في مدينة ' . $city;

                    $hashtags='تبنى_لاتشتري';


                                }elseif ($layout == 'rescue'){
                                        //check the type of pet

                                        if ($input[0]->type == 'القطط') {
                                            $petType = 'قط';
                                        }elseif ($input[0]->type == 'الكلاب'){
                                            $petType = 'كلب';
                                        }elseif ($input[0]->type == 'الطيور'){
                                            $petType = 'حيوان من فئة الطيور';
                                        }else{
                                            $petType = 'حيوان غير مصنف';
                                        }
                                        //check need degree
                                            if ($input[0]->need_degree != 25){
                                                $need_degree = HelperController::get_text_need_degree($input[0]->need_degree);
                                                $stmt = $petType .' بحالة '. $need_degree . ' يحتاج للإنقاذ في مدينة ' . $city;
                                            } else{
                                                $stmt = $petType .' ' . ' يحتاج للإنقاذ في مدينة ' . $city;
                                            }
                                            $hashtags='انقاذ_الحيوانات';


                                                        }elseif ($layout == 'lost') {
                                                            //check the type of pet

                                                            if ($input[0]->type == 'القطط') {
                                                                $petType = 'قط';
                                                            }elseif ($input[0]->type == 'الكلاب'){
                                                                $petType = 'كلب';
                                                            }elseif ($input[0]->type == 'الطيور'){
                                                                $petType = 'حيوان من فئة الطيور';
                                                            }else{
                                                                $petType = 'حيوان غير مصنف';
                                                            }
                                                            //check the gender of the input
                                                            if ($input[0]->gender == 'ذكر'){
                                                                $gender = 'ذكر';
                                                            }elseif ($input[0]->gender == 'انثى'){
                                                                $gender = 'انثى';
                                                            }else{
                                                                $gender='';
                                                            }
                                                            $stmt = $petType. $gender . ' مفقود في مدينة ' . $city;
                                                            $hashtags='اعلان_حيوانك_المفقود';
                                                        }
        $details='. يمكنك مشاهدة باقي التفاصيل عبر الرابط المرفق: ';
                if ($type == 'twitter'){
                    $link = 'http://twitter.com/share?text= '. $stmt . $details .'&url='. $url . '&hashtags='. $hashtags;
                }elseif ($type == 'whatsapp'){
                    $link = 'https://wa.me/?text='. $stmt . $details . $url;
                }elseif ($type == 'telegram'){
                    $link = 'https://telegram.me/share/url?url='. $url . '&text=' . $stmt . $details;
                }
        return $link;
    }


}
