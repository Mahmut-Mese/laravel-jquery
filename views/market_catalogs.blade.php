@extends('layouts.master')

@section('head_extra') @endsection

@section('javascript_extra') @endsection

@section('header_extra') @endsection

@section('content')
 
<div class="page-catalog">
<div class="container">@if(isset($market))
<ul class="page-title"><li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span><li><a>{{ trans('general.markets') }}</a></li><span>/</span><li><a href="{{url(App::getLocale()).'/'.transRoute('market').'/'.$market->markets_id }}""> <?php echo strtolower(" $market->title "); ?></a></li><span>/</span><li> <?php echo strtolower(" $market->title "); ?> – {{ trans('general.cataloguesbrochues') }}</li></ul>@endif 
<div class="clearfix"></div>
</div>
<hr class="thin">

<div class="container">

<!-- <h2 class="main-title"><strong>Camping &amp; Caravan<br>
catalogues &amp; brochures</strong></h2> -->
@if(isset($market))
<h2 class="main-title" style="color:{{$market->markets['color']}}"><strong>
{{$market->title}}<br>
{{ trans('general.cataloguesbrochues') }}</strong></h2>
@endif 
 

  @if($catalogs->count() )
 @foreach($catalogs as $one_catalog) 
  <div class="row one-of-catalog">
   
<div class="catalog-title"><h2 style="color:{{$market->markets['color']}}">{{$one_catalog->catalogs->name}}</h2></div>
 <hr>
   <div class="col-xs-12 col-md-6 col-sm-6  catalog-picture ">
        @if(!empty( $one_catalog->catalogs->image))
                  <img alt="{!!str_limit($one_catalog->catalogs->description, 160)!!}" title="{{$one_catalog->catalogs->name}}" src="
                  {{ url('photo') . '/nullx800/catalogs/'.$one_catalog->catalogs->image}}" onerror="this.src='{{ url('fix').'/nullx800/'.'no-picture_800.png' }}'">
       @else
              <img   alt="{!!str_limit($one_catalog->catalogs->description, 160)!!}" title="{{$one_catalog->catalogs->name}}" 
              src="{{ url('fix').'/nullx800/'.'no-picture_800.png' }}">
       @endif 
 
   </div><!-- col-sm-4 -->
    <div class=" col-md-6 col-xs-12 col-sm-6 ">
    <p class="catalog-text "><strong>{{$one_catalog->catalogs->short_description}}</strong></p>
    <div class="product-list">{!!$one_catalog->catalogs->description!!}</div><!-- product-list -->
<div class="buttons">
{{--<a href="{{ url('/') . '/public/uploads/catalogs/'.$one_catalog->catalogs->file}}"><div class="catalog-button"><span class="text">{{ trans('general.online_catalogue') }}</span><i class="fa fa-angle-right" aria-hidden="true"></i></div></a>--}}<a href="
{{ url('/') . '/public/uploads/catalogs/'.$one_catalog->catalogs->file}}" target="_blank"><div class="catalog-button download" style="background-color:{{$market->markets['color']}}"><span class="text">{{ trans('general.download') }}</span><i class="fa fa-angle-right" aria-hidden="true" ></i></div></a>
<div class="clearfix"></div></div><!-- end buttons -->

   </div><!-- col-sm-6 -->
   </div><!-- row  -->
    @endforeach
   @endif

   </div><!-- End container -->
   <div class="guidebooks">
   <div class="container">
   
 
  @if($guidebooks->count() )
   <div><h2 style="color:{{$market->markets['color']}}">{{ trans('general.guidebooks') }}</h2></div>
    <hr>
   
   
 @foreach($guidebooks as $one_guidebook) 
    <div class="row one-of-catalog">
    
<div class="catalog-title"></div>
   <div class=" col-md-6 col-xs-12 col-sm-6 catalog-picture ">
           @if(!empty( $one_guidebook->catalogs->image))
                 <img alt="{!!str_limit($one_guidebook->catalogs->description, 160)!!}" title="{{$one_guidebook->catalogs->name}}"  src="
                 {{ url('photo') . '/800x800/catalogs/'.$one_guidebook->catalogs->image}}" onerror="this.src='{{ url('fix').'/nullx800/'.'no-picture_800.png' }}'">
       @else
              <img   alt="{!!str_limit($one_guidebook->catalogs->description, 160)!!}" title="{{$one_guidebook->catalogs->name}}" 
              src="{{ url('fix').'/nullx800/'.'no-picture_800.png' }}">
       @endif 
  
   </div><!-- col-sm-4 -->
    <div class=" col-md-6  col-sm-6  col-xs-12 col-sm-6 ">
    <h2 class="subtitle" style="color:{{$market->markets['color']}}">{{$one_guidebook->catalogs->name}}</h2>
    <p class="catalog-text">{{$one_guidebook->catalogs->short_description}}</p>
    <div class="product-list">{!!$one_guidebook->catalogs->description!!}</div><!-- end product-list -->
<div class="buttons">
{{--<a href="{{ url('/') . '/public/uploads/catalogs/'.$one_guidebook->catalogs->file}}"><div class="catalog-button"><span class="text">{{ trans('general.online_catalogue') }}</span><i class="fa fa-angle-right" aria-hidden="true"></i></div></a>--}}<a href="
{{ url('/') . '/public/uploads/catalogs/'.$one_guidebook->catalogs->file}}" target="_blank"><div class="catalog-button download" style="background-color:{{$market->markets['color']}}"><span class="text">{{ trans('general.download') }}</span><i class="fa fa-angle-right" aria-hidden="true" ></i></div></a>
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