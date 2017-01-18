<div class="container zoneOffers">
    @foreach($offerProducts as $key=>$offer)
    @if($offer->product->appears_on_offer == 1)
    <div class="col-md-4 col-xs-12">
        <div class="col-md-6">
            <img class="img img-responsive" src="{{URL::to('/')}}/img/{{$offer->location}}"></img>
            @if ($offer->product->discount > 0)
            <p>
                Descuento del {{$offer->product->discount}}%
            </p>
            @endif

        </div>
        <div class="col-md-6">
            <h3>{{$offer->product->name}}</h3>
            <p class="offerDescription">{{$offer->product->description}}</p>
            <a class="btn buttons col-md-12" href="{{ route('brands.products.show', [$offer->product->brand->slug, $offer->product->slug]) }}">Show more</a>
        </div>
    </div>   
    @endif

    @endforeach
</div>