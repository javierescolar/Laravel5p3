<div class="container zoneOffers">
@foreach($offerProducts as $key=>$offer)
   <div class="col-md-4 col-xs-12">
       <div class="col-md-6">
           <img class="img img-responsive" src="{{URL::to('/')}}/img/{{$offer->image}}"></img>
           <a href="{{URL::to('/')}}/brands/{{$offer->brand->slug}}/products/{{$offer->slug}}" class="btn buttons col-md-12">Show more</a>
       </div>
       <div class="col-md-6">
           <h3>{{$offer->name}}</h3>
           <p>{{$offer->description}}</p>
       </div>
   </div>   
@endforeach
</div>