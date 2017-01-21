
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($imagesCarruselGallery as $key=>$image)
        @if($key == 0)
        <li data-target="#myCarousel" data-slide-to="{{$key}}" class="active"></li>
        @else
        <li data-target="#myCarousel" data-slide-to="{{$key}}"></li>
        @endif
        @endforeach

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @foreach($imagesCarruselGallery as $key => $image)
        @if($key == 0)
        <div class="item active">
            <img src="{{URL::to('/')}}/img/{{$image->location}}" alt="image" height="200">
        </div>
        @else
        <div class="item">
            <img src="{{URL::to('/')}}/img/{{$image->location}}" alt="image" height="200">
        </div>
        @endif
        @endforeach

    </div>


</div>