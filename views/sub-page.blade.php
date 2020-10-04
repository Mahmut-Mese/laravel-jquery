@extends('layouts.master')
@if(isset($subPage))
@section('page_title', str_limit($subPage->title, 160) )

@section('meta-description', str_limit($subPage->meta_description, 160) )

@section('meta-keywords', str_limit($subPage->meta_keywords, 160) )
@endif
@section('head_extra' )
<link rel="stylesheet" href="{{ url('resources/vendors') }}/lightbox/css/lightbox.css">
 
@endsection
<!-- head_extra -->
@section('javascript_extra')
<script src="{{ url('resources/vendors') }}/lightbox/js/lightbox.js"></script>
<script  >
 
 var img_length  = $("p img").length;

 for (var i =0; i <= img_length; i++) {
  var src= $('p img').eq(i).attr('src') ;
  	$("p img").eq(i).replaceWith($('<p> <a href="'+src+'" data-lightbox="kozzy"><img src="'+src+'" title="{{$caravanProducts->model_name}}" alt="{{$subPage->title}}"></a></p>'));
  } 
 
</script>
  @endsection 
<!-- javascript_extra -->

@section('content')

<div class="gallery karavan karavan_detail karavan_gallery sub-page">
<div class="karavan_choose">
<div class="container">
  <div class="row">
    <div class="models">
    @if(isset($category))
    <a href="{{url(App::getLocale()).'/'.transRoute('caravans').'/'.str_slug($category->slug)}}">@endif
     <span><button class="leftbutton"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;&nbsp;
         @if(isset($category))
 

   {{$category->title}}

   @endif
   
    </button></span></a><span class="rightbutton"><a href="{{ url('/') . '/public/uploads/caravanproducts/'.$caravanProducts->Brochure}}" target="_blank"><button>{{ trans('general.pdfdownload') }}</button></a></span> </div>
  </div>
</div>

</div>
<div class="container karavan_detail_cotainer">
<div class="row">
    <div class="col-md-3 col-xs-12 col-sm-3 leftmenu">
    @if(isset($caravanProducts->caravansubpages))
    <ul  class="buttons">

<li class="catalog-button firstcatalogbutton"><a href="{{url(App::getLocale()).'/'.transRoute('caravan').'/'.str_slug($category->slug).'/'.str_slug($caravanProducts->model_name_slug) }}"><span class="text  ">{{ trans('general.highlights') }}</span></a></li>

@foreach($caravanProducts->caravansubpages as $one_caravansubpage)
@if($one_caravansubpage->type=='Normal')
<li class="catalog-button"><a href="{{url(App::getLocale()).'/'.transRoute('caravan').'/'.str_slug($category->slug).'/'.str_slug($caravanProducts->model_name_slug).'/'.str_slug($one_caravansubpage->slug)}}">

@if($one_caravansubpage->name==$subPage->name)
<span class="text strng">{{$one_caravansubpage->name}}</span>
@else
<span class="text">{{$one_caravansubpage->name}}</span>
@endif
 </a></li>
@else
@php $type='Equipment'; @endphp
@endif
 
@endforeach
<li class="catalog-button"><a href="{{url(App::getLocale()).'/'.transRoute('caravan').'/'.str_slug($category->slug).'/'.str_slug($caravanProducts->model_name_slug).'/layouts'}}"><span class="text">{{ trans('general.layoutsdata') }}</span></a></li>

 
 @if((isset($type)) && (($type) == 'Equipment'))
   @if($subPage->type=='Equipment')
   <div class="dropdown catalog-button open">
   @else
   <div class="dropdown catalog-button">
    @endif

  <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href=""><span class="text">{{ trans('general.equipment') }}</span>
</a>


<ul class="dropdown-menu">
 @foreach($caravanProducts->caravansubpages as $one_caravansubpage)
 @if($one_caravansubpage->type=='Equipment')
 


  
  <li class="catalog-button second">
 
  <a href="{{url(App::getLocale()).'/'.transRoute('caravan').'/'.str_slug($category->slug).'/'.str_slug($caravanProducts->model_name_slug).'/'.str_slug($one_caravansubpage->slug)}}">

@if($one_caravansubpage->name==$subPage->name)
<span class="text strng">{{$one_caravansubpage->name}}</span>
@else
<span class="text">{{$one_caravansubpage->name}}</span>
@endif
 
  </a></li>

@endif
@endforeach

</ul>

</div>
 @endif

</ul>
@endif



<div class="clearfix"></div></div>
<div class="col-md-9 col-sm-9"><h1>  @if(isset($caravanProducts))
{{--{{$caravanProducts->model_name}}--}}
@endif</h1>
@if(isset($subPage))
<h2>{{$subPage->title}}</h2>
<h5>{{$subPage->description}}</h5>








<div class="new_item">

{!!$subPage->content!!}
</div>

@endif

<div class="clearfix"></div>






</div>


</div>



   
</div><!-- End container-fluid -->
<br><br>
 </div>  

@endsection

