@extends('layouts.master')

@section('head_extra') @endsection

@section('javascript_extra') @endsection

@section('header_extra') @endsection

@section('content')
 
<div class="page-catalog">
<div class="container">
<ul class="page-title"><li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span>  <li> {{ trans('general.cataloguesbrochues') }}</li></ul>
<div class="clearfix"></div>
</div>
<hr class="thin">

<div class="container">

<!-- <h2 class="main-title"><strong>Camping &amp; Caravan<br>
catalogues &amp; brochures</strong></h2> -->
<h2 class="main-title"><strong>
{{ trans('general.cataloguesbrochues') }}</strong></h2>
@if(isset($catalogs))
 @foreach($catalogs as $one_catalog) 
  <div class="row one-of-catalog">
   
<div class="catalog-title"><h2>{{$one_catalog->name}}</h2></div>
 <hr>
   <div class="col-md-6 col-xs-12 col-sm-6 catalog-picture ">


        @if(!empty($one_catalog->image))
    <img alt="{!!str_limit($one_catalog->description, 160)!!}" title="{{$one_catalog->name}}"  src="
     {{ url('photo') . '/nullx800/catalogs/'.$one_catalog->image}}" onerror="this.src='{{ url('fix').'/nullx800/'.'no-picture_800.png' }}'">
       @else

       
        <img alt="{!!str_limit($one_catalog->description, 160)!!}" title="{{$one_catalog->name}}"  src="{{ url('fix').'/nullx800/'.'no-picture_800.png' }}" >

       @endif

  
   </div><!-- col-sm-4 -->
    <div class="col-md-6 col-xs-12 col-sm-6 ">
    <p class="catalog-text "><strong>{{$one_catalog->short_description}}</strong></p>
    <div class="product-list">{!!$one_catalog->description!!}</div><!-- product-list -->
<div class="buttons">
{{--<a href="
{{ url('/') . '/public/uploads/catalogs/'. $one_catalog->file}}"><div class="catalog-button"><span class="text">{{ trans('general.online_catalogue') }}</span><i class="fa fa-angle-right" aria-hidden="true"></i></div></a>--}}
<a href="{{ url('/') . '/public/uploads/catalogs/'. $one_catalog->file}}" target="_blank"><div class="catalog-button download"><span class="text">{{ trans('general.download') }}</span><i class="fa fa-angle-right" aria-hidden="true" ></i></div></a>
<div class="clearfix"></div></div><!-- end buttons -->

   </div><!-- col-sm-6 -->
   </div><!-- row  -->
    @endforeach
   @endif

   </div><!-- End container -->
    @if($guidebooks->count())
   <div class="guidebooks">
   <div class="container">
   
   <div><h2>{{ trans('general.guidebooks') }}</h2></div>
    <hr>
  
 @foreach($guidebooks as $one_guidebook) 
    <div class="row one-of-catalog">
    
<div class="catalog-title"></div>
   <div class="col-md-6 col-xs-12 col-sm-6 catalog-picture ">

    @if(!empty($one_guidebook->image))
    <img  alt="{!!str_limit($one_guidebook->description, 160)!!}" title="{{$one_guidebook->name}}"  src="{{ url('photo') . '/nullx800/catalogs/'.$one_guidebook->image}}" onerror="this.src='{{ url('fix').'/nullx800/'.'no-picture_800.png' }}'">
       @else

       
        <img   alt="{!!str_limit($one_guidebook->description, 160)!!}" title="{{$one_guidebook->name}}"  src="{{ url('fix').'/nullx800/'.'no-picture_800.png' }}" >

       @endif
       

   </div><!-- col-sm-4 -->
    <div class="col-md-6 col-xs-12 col-sm-6 ">
    <h2 class="subtitle">{{$one_guidebook->name}}</h2>
    <p class="catalog-text">{{$one_guidebook->short_description}}</p>
    <div class="product-list">{!!$one_guidebook->description!!}</div><!-- end product-list -->
<div class="buttons">
{{--<a href="{{ url('/') . '/public/uploads/catalogs/'.  $one_guidebook->file}}"><div class="catalog-button"><span class="text">{{ trans('general.online_catalogue') }}</span><i class="fa fa-angle-right" aria-hidden="true"></i></div></a>--}}
<a href="{{ url('/') . '/public/uploads/catalogs/'.  $one_guidebook->file}}" target="_blank"><div class="catalog-button download"><span class="text">{{ trans('general.download') }}</span><i class="fa fa-angle-right" aria-hidden="true" ></i></div></a>
<div class="clearfix"></div></div><!-- end button-->

   </div><!-- col-sm-6 -->

   </div><!-- End row -->
      @endforeach
   @endif
  
   </div><!-- End container -->
   </div><!-- End guidebox -->
</div><!-- End page-catalog -->



<!-- section footer -->
@endsection