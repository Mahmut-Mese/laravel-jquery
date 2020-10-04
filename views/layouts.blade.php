@extends('layouts.master')
 @if(isset($caravanProducts->caravanproducttranslates[0]))
@section('page_title', str_limit($caravanProducts->caravanproducttranslates[0]->highlight_page_title, 160) )

@section('meta-description', str_limit($caravanProducts->caravanproducttranslates[0]->meta_description, 160) )

@section('meta-keywords', str_limit($caravanProducts->caravanproducttranslates[0]->meta_keywords, 160) )
@endif
@section('head_extra')
<!-- head_extra -->
    <link rel="stylesheet" href="{{ url('resources/assets') }}/css/hover.css">
@endsection

@section('javascript_extra') @endsection
 
@section('content')
<div class="layout">
<div class="gallery karavan karavan_detail karavan_gallery">
<div class="karavan_choose">
<div class="container">
  <div class="row">
    <div class="models">
    @if(isset($category))<a href="{{url(App::getLocale()).'/'.transRoute('caravans').'/'.str_slug($category->slug)}}"> @endif
     <span><button class="leftbutton"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;&nbsp;
         @if(isset($category))
 

   {{$category->title}}

   @endif
   
    </button></span></a><span class="rightbutton">@if(isset($caravanProducts))
    <a href="{{ url('/') . '/public/uploads/caravanproducts/'.$caravanProducts->Brochure}}" target="_blank"> @endif
    <button>{{ trans('general.pdfdownload') }}</button></a></span> </div>
  </div>
</div>

</div>
 <div class="header_image">
  @if(isset($caravanProducts))

        @if(!empty($caravanProducts->Cover_Picture))
       <img alt="Eltesan" title="{{$caravanProducts->model_name}}" src="{{ url('fit') . '/1600x640/caravanproducts/'.$caravanProducts->Cover_Picture}}"   >
       @else

        <img alt="Eltesan" title="{{$caravanProducts->model_name}}" src="{{ url('fit').'/1600x640/fix/'.'no-picture_1600x640.png' }}"  >

       @endif
  @endif
     

   </div><!-- End header_image -->
<div class="container karavan_detail_cotainer">
<div class="row">
  <div class="col-md-3 col-xs-12 col-sm-3 leftmenu">
    @if(isset($caravanProducts->caravansubpages))
    <ul  class="buttons">

<li class="catalog-button firstcatalogbutton"><a href="{{url(App::getLocale()).'/'.transRoute('caravan').'/'.str_slug($category->slug).'/'.str_slug($caravanProducts->model_name_slug) }}"><span class="text ">{{ trans('general.highlights') }}</span></a></li>

@foreach($caravanProducts->caravansubpages as $one_caravansubpage)
@if($one_caravansubpage->type=='Normal')
<li class="catalog-button"><a href="{{url(App::getLocale()).'/'.transRoute('caravan').'/'.str_slug($category->slug).'/'.str_slug($caravanProducts->model_name_slug).'/'.str_slug($one_caravansubpage->slug)}}">


<span class="text">{{$one_caravansubpage->name}}</span></a></li>
@else
@php $type='Equipment'; @endphp
@endif
 
@endforeach
<li class="catalog-button"><a href="{{url(App::getLocale()).'/'.transRoute('caravan').'/'.str_slug($category->slug).'/'.str_slug($caravanProducts->model_name_slug).'/layouts'}}"><span class="text strng">{{ trans('general.layoutsdata') }}</span></a></li>

 
 @if((isset($type)) && (($type) == 'Equipment'))
<div class="dropdown catalog-button"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href=""><span class="text">{{ trans('general.equipment') }}</span>
</a>


<ul class="dropdown-menu">
 @foreach($caravanProducts->caravansubpages as $one_caravansubpage)
 @if($one_caravansubpage->type=='Equipment')
  
 
<li class="catalog-button second"><a href="{{url(App::getLocale()).'/'.transRoute('caravan').'/'.str_slug($category->slug).'/'.str_slug($caravanProducts->model_name_slug).'/'.str_slug($one_caravansubpage->slug)}}"><span class="text">{{$one_caravansubpage->name}}</span></a></li>

@endif
@endforeach

</ul>

</div>
 @endif

</ul>
@endif



<div class="clearfix"></div></div>
<div class="col-md-9 col-sm-9">
  <div class=" bottom_image"><h1>
  @if(isset($caravanProducts))
  {{$caravanProducts->model_name}}
  @endif</h1> <h2>{{ trans('general.layoutsdata') }}</h2> 

</div>
@if(isset($layouts))
@foreach($layouts as $one_layout)
<div class="row">
<hr>
<br><br><br>
<div class=" col-md-7 new_item">
 @if(!empty($one_layout->image))
       <img alt="Eltesan" title="{{$one_layout->title}}" src="{{ url('photo') . '/450xnull/caravanlayouts/'.$one_layout->image}}"  onerror="this.src='{{ url('fix').'/450xnull/'.'no-picture_762.png' }}'"  >
       @else

        <img alt="Eltesan" title="{{$one_layout->title}}" src="{{ url('fix').'/450xnull/'.'no-picture_762.png' }}"  >

       @endif

 </div>
<div class="col-md-5 col-xs-12 col-sm-12 leftmenu rightmenu">


<h3>{{$one_layout->title}}</h3><ul  class="buttons">


<li class="catalog-button"><span class=""><strong>
{{ trans('general.vehicle') }}</strong></span><span class="seconddesc">{{$one_layout->price}}</span></li>
<li class="catalog-button"><span class=""><strong>{{ trans('general.measure') }}</strong></span><span class="seconddesc">{{$one_layout->measure}}</span></li>
<li class="catalog-button"><span class=""><strong>{{ trans('general.berths') }}</strong></span><span class="seconddesc">{{$one_layout->berths}}</span></li>
<div class="btn-group"><a href="  {{url(App::getLocale()).'/'.transRoute('caravan').'/'.str_slug($category->slug).'/'.str_slug($caravanProducts->model_name_slug).'/layout'.'/'.str_slug($one_layout->slug)}}"><button class="btn">{{ trans('general.characteristics') }}</button ></a>
  @if(isset($one_layout->link360))
  <a href="{{$one_layout->link360}}"><button class="btn">360°</button></a></div>
@endif


</ul>
</div>
</div>
@endforeach
   @endif


</div>

</div>



   
</div><!-- End container-fluid -->
   
</div>
</div>
@endsection

