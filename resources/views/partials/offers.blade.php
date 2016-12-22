<div class="container zoneOffers">
@foreach($offerProducts as $key=>$offer)
   <div class="col-md-4 col-xs-12">
       <div class="col-md-6">
           <img class="img img-responsive" src="{{URL::to('/')}}/img/{{$offer->image}}"></img>
       </div>
       <div class="col-md-6">
           <h3>{{$offer->name}}</h3>
           <p>{{$offer->description}}</p>
           <a href="{{URL::to('/')}}" class="btn buttons">Show more</a>
       </div>
   </div>   
@endforeach
</div>