@php
    $counter=0;
    if(isset($show[0])){
$allMedia = $show[0]->media;
    }
else{
    return;
}
@endphp
<div class="row ">
    <!-- tab list div for media-->
    <div style="min-width: fit-content">
        <!-- tab list to show the media -->
        <table id="tab_ul" class="nav nav-tabs my-3 tab_ul" >
            <tbody class="align-self-center">
            @foreach($allMedia as $media)
                <!-- make the first media active to show -->
                @if($loop->first)
                    <!-- if the media is video we will show video icon in the list -->
                    @if($media->type == 'video')
                        <tr class="active">
                            <td>
                                <a class="active_tablist_style px-2" id="image_tab{{$counter}}" data-toggle="tab" href="#image{{$counter}}" style="text-decoration: none; color: black; height: 50px; width: 50px;" onclick="imageStyle(event, '{{$counter++}}')" >
                                    <i class="far fa-play-circle thirdColor my-3" style="font-size: 30px"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- else show the image with small size -->
                    @else
                        <tr class="active">
                        <td>
                            <a class="active_tablist_style px-2" id="image_tab{{$counter}}" data-toggle="tab" href="#image{{$counter}}" style="text-decoration: none; color: black" onclick="imageStyle(event, '{{$counter++}}')" >
                                <img src="{{$media->src2}}" alt="" style="height: 50px; width: 50px; border-bottom: 1px solid #00BDAF">
                            </a>
                        </td>
                    </tr>
                    @endif
                    <!-- else if the media not the first one we will make it not active until the user choose it-->

                @else
                    <!-- if the media is video we will show video icon in the list -->
                    @if($media->type == 'video')
                        <tr class="mt-3">
                            <td>
                                <a id="image_tab{{$counter}}" data-toggle="tab" href="#image{{$counter}}" style="text-decoration: none; color: black;  height: 50px; width: 50px;" onclick="imageStyle(event, '{{$counter++}}')">
                                    <i class="far fa-play-circle thirdColor my-2" style="font-size: 30px"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- else show the image with small size -->
                    @else
                        <tr class="mt-3">
                        <td>
                            <a id="image_tab{{$counter}}" data-toggle="tab" href="#image{{$counter}}" style="text-decoration: none; color: black" onclick="imageStyle(event, '{{$counter++}}')">
                                <img src="{{$media->src2}}" alt="" style="height: 50px; width: 50px; border-bottom:1px solid #00BDAF">
                            </a>
                        </td>
                    </tr>
                    @endif
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- show media div -->
    <div class="tab-content col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <?php $counter =0; ?>
        @foreach($allMedia as $media)
            @if($loop->first)
                @if($media->type == 'video')
                        <div id="image{{$counter++}}" class="active show tab-pane fade in active p-3 text-center">
                            <video height="275" width="300" class="video-preview"  src="{{$media->src1}}" controls/>
                        </div>
                    @else
                        <div id="image{{$counter++}}" class="active show tab-pane fade in active p-3 text-center">
                    <img src="{{$media->src2}}" alt="" class="rounded" style="height: auto; max-height:300px; width: auto; max-width:325px;">
                </div>
                    @endif
            @else
                    @if($media->type == 'video')
                        <div id="image{{$counter++}}" class=" tab-pane fade p-3 text-center">
                            <video height="275" width="300" class="video-preview"  src="{{$media->src1}}" controls/>
                        </div>
                    @else
                <div id="image{{$counter++}}" class=" tab-pane fade p-3 text-center">
                    <img src="{{$media->src2}}" alt="" class="rounded" style="height: auto; max-height:300px; width: auto; max-width:325px;">
                </div>
                    @endif
            @endif
        @endforeach

    </div>
</div>

<script>
    function imageStyle(evt, type) {
        var images =6;
        for (i=0 ; i < images ; i++){
            if(i == type){
                document.getElementById('image_tab'+i).className = "active_tablist_style px-2"
            } else{
                document.getElementById('image_tab'+i).className = ""
            }
        }
    }
</script>

