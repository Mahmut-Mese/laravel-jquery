@extends('layouts.master')

@section('head_extra')
<!-- head_extra -->
    <link rel="stylesheet" href="{{ url('resources/assets') }}/css/hover.css">
@endsection

@section('javascript_extra')
 <script src="{{ url('resources/assets') }}/js/lity.js"></script>
  

 <script>
   /* copy loaded thumbnails into carousel */
$('.row .thumbnail').on('load', function() {
  
}).each(function(i) {
  if(this.complete) {
    var item = $('<div class="item"></div>');
    var itemDiv = $(this).parents('div');
    var title = $(this).parent('a').attr("title");
    
    item.attr("title",title);
    $(itemDiv.html()).appendTo(item);
    item.appendTo('.carousel-inner'); 
    if (i==0){ // set first item active
     item.addClass('active');
    }
  }
});

/* activate the carousel */
$('#modalCarousel').carousel({interval:false});

/* change modal title when slide changes */
$('#modalCarousel').on('slid.bs.carousel', function () {
  $('.modal-title').html($(this).find('.active').attr("title"));
})

/* when clicking a thumbnail */
$('.row .thumbnail').click(function(){
    var idx = $(this).parents('div').index();
    var id = parseInt(idx);
    $('#myModal').modal('show'); // show the modal
    $('#modalCarousel').carousel(id); // slide carousel to selected
    
});

 </script>
 
 @include('includes.ajax_imgs')
 
@endsection
 

@section('header_extra') @endsection

@section('content')

   <div class="header_image">

      <img alt="Eltesan" title="Eltesan" src="{{ url('fit').'/1920x350/fix/'.'slider-marine-Kopie1.jpg' }}">
      <div class="container"><div class="about_caption"><h1>{{ trans('general.imagesgallery') }}</h1></div></div>

   </div><!-- End header_image -->

    
   


<div class="gallery">

 <!-- section discover-our -->

<div class="container">
<ul class="page-title"><li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span><li>{{ trans('general.imagesgallery') }}</li></ul>
<div class="clearfix"></div>
</div>
<hr>
<div class="container image_galeri">


<div class="row filters">
 <div class="col-md-4 col-xs-12 col-sm-4">
 <select id="cat" class="category cat" >
 <option >{{ trans('general.category') }}</option>
  @if(isset($galleryCategories))
  @foreach($galleryCategories as $key => $value) 

  <option value="{{$key}}">{{$value}}</option>
  @endforeach
 @endif
</select></div>
 <div class="col-md-4 col-xs-12 col-sm-4">
 <span id="filter" class="filt" >

 
 <button  >{{ trans('general.date') }}</button><button >{{ trans('general.alphabetical') }}</button></span>
{{-- <select id="filter" class="filt " >
  <option >{{ trans('general.filter') }}</option>
 
   @if(empty($date))
    @php   $param['date']='asc'; @endphp 
   
    @endif
    @if(empty($title))
    @php  $param['title']='asc'; @endphp 
   
    @endif  
 
  

   <option value="{{$param['date']}}">{{ trans('general.date') }}</option>
    <option value="{{$param['title']}}">{{ trans('general.alphabetical') }}</option>

 
</select>--}}</div>
 <div class="col-md-4 col-xs-12 col-sm-4">
   <input type="search" class="keyup "  name="search_image" placeholder="{{ trans('general.search') }}" >
 </div>

</div>

 
 
    <div class="row newfilt" id="">
    
       @if(isset($images))
  @foreach($images as $one_image) 
 


   <div class="col-lg-4 col-sm-6 col-xs-12"><a class="hvr-float-shadow image item" href="javascript:void(0)">
          @if(!empty( $one_image->galleryimages->image))
               <img alt="{{str_limit($one_image->description, 160)}}" title="{{$one_image->title}}"  class="thumbnail img-responsive"   src="
       {{ url('photo') . '/nullx250/galleryimages/'.$one_image->galleryimages->image}}" onerror="this.src='{{ url('fix').'/nullx250/'.'no-picture_550.png' }}'">
       @else
              <img    alt="{{str_limit($one_image->description, 160)}}" title="{{$one_image->title}}"    
              src="{{ url('fix').'/nullx250/'.'no-picture_550.png' }}">
       @endif 
       
   
   <div class="image_explanation"><h3> {{$one_image->title}}</h3><p>{{$one_image->description}}
     </p></div></a></div>

  @endforeach
  
  @endif
     <div class="loadmoreimg"></div>
    </div>
    <hr>
{{--{!! $images->render() !!} --}}

 <a href="javascript:void(0)" class="load" id=" "><button class="btn">{{ trans('general.load_more') }}</button> </a><br><br>
    <hr>


<div class="modal" id="myModal" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
    <button class="close" type="button" data-dismiss="modal">×</button>
    <h3 class="modal-title"></h3>
  </div>
  <div class="modal-body">
    <div id="modalCarousel" class="carousel">
 
          <div class="carousel-inner">
           
          </div>
          
          <a class="carousel-control left" href="#modalCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
          <a class="carousel-control right" href="#modalCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
          
        </div>
  </div>
 
   </div>
  </div>
</div>



</div><!-- End container -->



 <!-- Swiper -->

   
                </div><!-- End container-fluid -->
   

 


@endsection