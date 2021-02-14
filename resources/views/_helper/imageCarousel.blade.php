
@php
    $counter=0;
    if(isset($show[0])){
$allMedia = $show[0]->media;
    }

else{
    return;
}
@endphp

<div id="myCarousel" class="carousel slide justify-content-center col-8 col-sm-8 col-md-8 col-lg-9 col-xl-10" data-ride="carousel" style="min-width: fit-content; min-height: fit-content; max-width: fit-content; max-height: fit-content; ">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($allMedia as $media)
            @if($loop->first)
                <li data-target="#myCarousel" data-slide-to="{{$counter++}}" class="active"></li>
            @else
                <li data-target="#myCarousel" data-slide-to="{{$counter++}}" class=""></li>
            @endif
        @endforeach
    </ol>
    <!-- Wrapper for slides --> <?php $counter=1 ?>
    <div class="carousel-inner">
       @foreach($allMedia as $media)
           @if($loop->first)
        <div class="carousel-item active ">
            <img src="{{$media['src']}}" alt="Los Angeles " style="width:100%;height: auto;  max-height: 500px">
        </div>
            @else
                <div class="carousel-item">
                    <img src="{{$media['src']}}" alt="Chicago" style="width:100%;height: auto;  max-height: 500px">
                </div>
            @endif

        @endforeach

    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev " href="#myCarousel" role="button" data-slide="prev">
        <i class="fas fa-angle-right mainColor"></i>    </a>
    <a class="carousel-control-next mainColor" href="#myCarousel" role="button" data-slide="next">
        <i class="fas fa-angle-left"></i>    </a>
</div>
