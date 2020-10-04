@extends('layouts.master')
@if(isset($caravanProducts))
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

<div class="gallery karavan karavan_detail">

<div class="karavan_choose">
<div class="container">
  <div class="row">
    <div class="models">@if(isset($category->slug))
    <a href="{{url(App::getLocale()).'/'.transRoute('caravans').'/'.str_slug($category->slug)}}">
    @endif <span><button class="leftbutton"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;&nbsp;
         @if(isset($category))
 

   {{$category->title}}

   @endif
   
    </button></span></a>
    @if(isset($caravanProducts->Brochure))
    <span class="rightbutton"><a href="
    {{ url('/') . '/public/uploads/caravanproducts/'.$caravanProducts->Brochure}}" target="_blank"><button> {{ trans('general.pdfdownload') }}</button></a></span> 
      @endif
    </div>
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
  
     
     <div class="container"><div class="about_caption"><h1>{{$caravanProducts->model_name}}</h1>
     <h5>{{$caravanProducts->caravanproducttranslates[0]->marketing_slug}}</h5></div></div>

   </div><!-- End header_image -->
</div>
<div class="gallery karavan karavan_detail onecaravan">



<div class="container karavan_detail_cotainer">
<div class="row">
    <div class="col-md-3 col-xs-12 col-sm-3 leftmenu">
    @if(isset($caravanProducts->caravansubpages))
    <ul  class="buttons">

<li class="catalog-button firstcatalogbutton"><a href=""><span class="text strng">{{ trans('general.highlights') }}</span></a></li>

@foreach($caravanProducts->caravansubpages as $one_caravansubpage)
@if($one_caravansubpage->type=='Normal')
<li class="catalog-button"><a href="{{url(App::getLocale()).'/'.transRoute('caravan').'/'.str_slug($category->slug).'/'.str_slug($caravanProducts->model_name_slug).'/'.str_slug($one_caravansubpage->slug)}}">


<span class="text">{{$one_caravansubpage->name}}</span></a></li>
@else
@php $type='Equipment'; @endphp
@endif
 
@endforeach
<li class="catalog-button"><a href="{{url(App::getLocale()).'/'.transRoute('caravan').'/'.str_slug($category->slug).'/'.str_slug($caravanProducts->model_name_slug).'/layouts'}}"><span class="text">{{ trans('general.layoutsdata') }}</span></a></li>

 
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
  <div class="col-md-9 col-sm-9 bottom_image"><h1>{{$caravanProducts->caravanproducttranslates[0]->highlight_page_title}}</h1>   <h5>{{$caravanProducts->caravanproducttranslates[0]->highlight_page_description}}</h5>
         <div class="col-md-6"><p>{!!$caravanProducts->caravanproducttranslates[0]->highlight_page!!}</p></div>
    <div class="col-md-6 col-xs-12 col-sm-12 leftmenu rightmenu">
 
@if(isset($caravanProducts->caravancharacteristics))
 <ul  class="buttons">
  <li class="catalog-button"><span class="text"><h3>Characteristics</h3></li>
@foreach($caravanProducts->caravancharacteristics as $one_characteristic)

<li class="catalog-button"><span class="text"><i class="fa fa-chevron-right" aria-hidden="true"></i>{{$one_characteristic->description}}</span></li>
@endforeach


</ul>
   @endif

@if(isset($caravanProducts->caravanhighlights))
 <ul  class="buttons">
  <li class="catalog-button"><span class="text"><h3>Highlights</h3></li>
@foreach($caravanProducts->caravanhighlights as $one_highlight)

<li class="catalog-button"><span class="text"><i class="fa fa-check" aria-hidden="true"></i>{{$one_highlight->description}}</span></li>
@endforeach
</ul>
   @endif</div></div>




</div>



   
</div><!-- End container-fluid -->
   
</div>
@endif
@endsection

