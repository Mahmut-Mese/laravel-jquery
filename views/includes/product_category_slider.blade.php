
<br>
<div class="top_slider colors second_slider">
<div id="myCarousel" class="market carousel slide " data-ride="carousel">

  <ol class="carousel-indicators">
    @if(isset($catProducts))
    @foreach($catProducts as $product) 
  @if(isset($product->productcategorytranslates[0]->sliderimages))

  @php  $active = 0; $slide_number = 0 @endphp 
 @foreach($product->productcategorytranslates[0]->sliderimages as $slide) 
    <li data-target="#myCarousel"  class="{{(empty($active++)) ? 'active' : ''}}" data-slide-to="{{$slide_number++}}"></li>
  
    @endforeach @endif @endforeach 
  </ol>
  <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
   
 @foreach($catProducts as $product) 
  @if(isset($product->productcategorytranslates[0]->sliderimages))
@php $active = 0;  @endphp 
 @if(empty($product->color))
     @php $slidercolor= getColorById($menuProducts,  $product->productcategoryparent->productcategories_id);@endphp 
 @else
     @php $slidercolor= $product->color; @endphp
 @endif
 @foreach($product->productcategorytranslates[0]->sliderimages as $slide) 
    <div class="item  {{(empty($active++)) ? 'active' : ''}}">
 
   <img alt="Eltesan" src="
   {{ url('fit') .'/1920x570/sliderimages/'.$slide['image']}}
   "   title="{{$slide['title']}}" >
 
   <div class="container">
        <div class="about_caption  "  ><h2>{{$slide['title']}}</h2></div></div>
     
    </div><!-- End item active -->@endforeach @endif @endforeach  @endif
  

<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><img alt="Eltesan" title="img_eltesan" src="{{ url('resources/assets') }}/images/dometic-left.png" alt="left" width="40" height="40"></span>
  <span class="sr-only">{{trans('admin.includes_previous')}}</span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"> <img alt="Eltesan" title="img_eltesan" src="{{ url('resources/assets') }}/images/dometic-right.png" alt="right" width="40" height="40"></span>
  <span class="sr-only">{{trans('admin.includes_next')}}</span>
</a>
    

  
</div><!-- End id myCarousel -->
</div><!-- End id myCarousel -->

<!-- Left and right controls -->

</div>