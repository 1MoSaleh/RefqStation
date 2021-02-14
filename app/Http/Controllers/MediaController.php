<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use File;
use Intervention\Image\ImageManagerStatic as Image;

class MediaController extends Controller
{
    //

    /*
     *  $file: the request->file('fileName');
     *  $id = the id of the type (order..lost..rescue..or user) to match it with the foreign key of it section
     *  $upload_dir = upload direction to save the images
     *  $layoutName = the name of section to use it in image name and to determine witch section belongs to
     *  #note: if the input is single photo just push it into array then pass the array
     */
    public static function makeImages ($file, $id ,$upload_dir, $layoutName){
           /* $counter = 0;

            foreach ($file as $data) {
                if ($counter > 4){
                    break;
                }
                // set name and path to save image in your storage
                $image = $data;
                $image_name = "$layoutName" . $id . '-'. $counter . time().'.jpg';
                $destination = public_path("$upload_dir");
                $image->move($destination, $image_name);
                // send the path to database model
                $image_path = url("$upload_dir/$image_name");

                $media = new Media();
                $media->src = $image_path;
                if ($counter == 0) {
                    $media->type = 'coverImage';
                } else {
                    $media->type = 'image';
                }
                $media->path = $destination;
                $media->name = $image_name;
               if ($layoutName == 'Adoption'){
                   $media->adoption_id = $id;
               }elseif ($layoutName == 'Rescue'){
                   $media->rescue_id = $id;
               }elseif ($layoutName == 'Lost'){
                   $media->lost_id = $id;
               }elseif ($layoutName == 'UserProfile'){
                   $media->user_id = $id;
               }
                $media->save();
                $counter++;
            }
           */

        // try to make 3 copies for the image
        $counter = 0;

        foreach ($file as $data) {
            if ($counter > 4){
                break;
            }
            ## Full size image ##
            // set name and path to save image in your storage
            $image = Image::make($data->getRealPath());
            $image_name = "$layoutName" . $id . '-'. $counter . time().'.jpg';
          // destination to get the real path of image >> for example we used it to remove the image from the our system
            $destination = public_path("$upload_dir");
            $image->save("$destination/full_size/$image_name");
            // send the path to database model
            $image_path = url("$upload_dir/full_size/$image_name");

            $media = new Media();
            $media->src1 = $image_path;
         ## End Full size image ##
         ## 350x350 size image ##
            // make copy of image using the library to resize the image
            $image->resize(350, 350,
                function ($constraint) {
                    $constraint->aspectRatio();
                });
            $image->save("$destination/350x350/$image_name");
            // send the path to database model
            $image_path = url("$upload_dir/350x350/$image_name");
            $media->src2 = $image_path;
            ## end 350x350 size##

            if ($counter == 0) {
                $media->type = 'coverImage';
            } else {
                $media->type = 'image';
            }
            $media->path = $destination;
            $media->name = $image_name;
            if ($layoutName == 'Adoption'){
                $media->adoption_id = $id;
            }elseif ($layoutName == 'Rescue'){
                $media->rescue_id = $id;
            }elseif ($layoutName == 'Lost'){
                $media->lost_id = $id;
            }elseif ($layoutName == 'UserProfile'){
                $media->user_id = $id;
            }
            $media->save();
            $counter++;
        }
        }

        public static function makeVideos ($file, $id ,$upload_dir, $layoutName){
                // set name and path to save image in your storage
                $video = $file;
                $video_name = $layoutName . $id . '-'. time() . '.'. $video->extension();
                $destination = public_path("$upload_dir");
                $video->move($destination, $video_name);
                // send the path to database model
                $video_path = url("$upload_dir/$video_name");
                $media = new Media();
                $media->src1 = $video_path;
                $media->type = 'video';
                $media->path = $destination;
                $media->name = $video_name;
                 if ($layoutName == 'Adoption'){
                     $media->order_id = $id;
                 }elseif ($layoutName == 'Rescue'){
                     $media->rescue_id = $id;
                 }elseif ($layoutName == 'Lost'){
                     $media->lost_id = $id;
                 }
                $media->save();

        }


    public static function deleteAll ($media){
        if (!isset($media)){
            return true;
        }
        foreach ($media as $item){
            if (File::delete($item->path.'/'. $item->name)){
                $media = Media::find($item->id);
                $media->delete();
            }else{
                return false;
            }
        }
    }
    public static function deleteImages ($media){
        ## old delete before we make tow copies !!
          /*  if (!isset($media)){
                return true;
            }
            foreach ($media as $item){
                if ($item->type != 'video') {
                    if (File::delete($item->path . '/' . $item->name)) {
                        $media = Media::find($item->id);
                        $media->delete();
                    } else {
                        return false;
                    }
                }
            }
          */

        ## current delete after we make tow copies of the image !!
        if (!isset($media)){
            return true;
        }
        foreach ($media as $item){
            if ($item->type != 'video') {
                if (File::delete($item->path . '/full_size/' . $item->name) && File::delete($item->path . '/350x350/' . $item->name)) {
                    $media = Media::find($item->id);
                    $media->delete();
                } else {
                    return false;
                }
            }
        }
    }

    public static function deleteVideos ($media){
        if (!isset($media)){
            return true;
        }
        foreach ($media as $item){
            if ($item->type == 'video'){
                if (File::delete($item->path.'/'. $item->name)){
                    $media = Media::find($item->id);
                    $media->delete();
                }else{
                    return false;
                }
            }
          }
    }
}
