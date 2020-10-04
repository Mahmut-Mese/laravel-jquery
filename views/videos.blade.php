@extends('layouts.master')

@section('head_extra') @endsection

@section('javascript_extra')
   
 <script src="{{ url('resources/assets') }}/js/lity.js"></script>

 <script>
       /* show lightbox when clicking a thumbnail */
    $('a.thumb').click(function(event){
      event.preventDefault();
      var content = $('.modal-body');
      content.empty();
        var title = $(this).attr("title");
        $('.modal-title').html(title);        
        content.html($(this).html());
        $(".modal-profile").modal({show:true});
       
  
$('.modal-profile video').trigger('play');


    });
 </script>
 <script> $(function() {
  $(".modal").click(function(e) {
    if (e.target.id == "modal_body" || $(e.target).parents("#modal_body").length) {

    $('.modal-profile video').trigger( $('.modal-profile video').prop('paused') ? 'play' : 'pause');
    } else {
     $('.modal-profile video').trigger('pause');
    }
  });
})</script>

<script>
$(document).ready(function(){
   $(window).scroll(lazyload);
   lazyload();
});
  function lazyload(){
   var wt = $(window).scrollTop();    //* top of the window
   var wb = wt + $(window).height();  //* bottom of the window

   $(".item").each(function(){
      var ot = $(this).offset().top;  //* top of object (i.e. advertising div)
      var ob = ot + $(this).height(); //* bottom of object

      if(!$(this).attr("loaded") && wt<=ob && wb >= ot){
      $(".item").show(1000);
         $(this).attr("loaded",true);
      }
   });
}
</script>
@include('includes.ajax_vids')

@endsection

@section('header_extra') @endsection
 
@section('content')

   <div class="header_image">

      <img alt="Eltesan" title="Eltesan" src="{{ url('fit').'/1920x350/fix/'.'slider-marine-Kopie1.jpg' }}">
      <div class="container"><div class="about_caption"><h1>{{ trans('general.videogallery') }}</h1></div></div>

   </div><!-- End header_image -->

<div class="gallery">

 <!-- section discover-our -->

<div class="container">
<ul class="page-title"><li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span><li>{{ trans('general.videogallery') }}</li></ul>
<div class="clearfix"></div>
</div>
<hr>
<div class="container video_galeri">


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
<section id="profiles" class="page row ">
  
    <div class="">
          
      
        
      <div class="container">
        <div class="row newfilt" id="profile-grid">
        @if(isset($videos))
  @foreach($videos as $one_video) 
  
          <div class="col-sm-4 col-xs-12 profile">
                <div class="panel panel-default video">
                  <div class="panel-thumbnail">
                    <a href="#" title="{{$one_video->title}}" class="thumb">
                              <video controls class="img-responsive img-rounded" data-toggle="modal" data-target=".modal-profile-lg" alt="{{str_limit($one_video->description, 160)}}" title="{{$one_video->title}}" >
 
  <source src="
  {{ url('/') . '/public/uploads/galleryvideos/'.$one_video->galleryvideos->video}}"  >
 

 
</video>
                    </a>
                  </div>
                  <div class="panel-body">
             <div class="video_explanation"><h3>{{$one_video->title}}</h3><p>{{$one_video->description}}
.</p><p class="date">{{$one_video->updated_at}}</p></div>
                  </div>
                </div>
            </div>
                  
  @endforeach
  @endif
  <div class="loadmoreimg"></div>



                  
           </div>
      </div>
    </div>

  </section>
   <a href="javascript:void(0)" class="load" id=" "><button class="btn">{{ trans('general.load_more') }}</button> </a><br><br>
    <hr>
  
  <!-- .modal-profile -->
  <div class="modal fade modal-profile" tabindex="-1" role="dialog" aria-labelledby="modalProfile" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal">×</button>
            <h3 class="modal-title"></h3>
          </div>
          <div class="modal-body" id="modal_body">
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <!-- //.modal-profile -->




</div><!-- End container -->



 <!-- Swiper -->

   
                </div><!-- End container-fluid -->

@endsection