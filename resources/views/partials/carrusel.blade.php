<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($carruselProducts as $key=>$carrusel)
        @if($key==0)
        <li data-target="#bs-carousel" data-slide-to="{{$key}}" class="active"></li>
        @else
        <li data-target="#bs-carousel" data-slide-to="{{$key}}"></li>
        @endif
        @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        @foreach($carruselProducts as $key=>$carrusel)
        
            @if($key==0)
            <div class="item slides active">
            @else
            <div class="item slides">
            @endif
                <div class="slide-{{$key + 1}}"></div>
                <div class="hero">
                    <hgroup>
                        <style>
                            .fade-carousel .slides .slide-{{$key+1}} {
                                background-image: url({{URL::to('/')}}/img/{{$carrusel->location}}); 
                                }
                            </style>
                            <h1>{{$carrusel->product->name}}</h1>        
                            <h3>Get start your next awesome project</h3>
                        </hgroup>

                  </div>
            </div>

                @endforeach
    </div>  
</div>