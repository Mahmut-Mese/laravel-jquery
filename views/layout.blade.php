
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

<div class="gallery karavan karavan_detail layout">

<div class="karavan_choose">
<div class="container">
  <div class="row">
    <div class="models">  @if(isset($category))<a href="{{url(App::getLocale()).'/'.transRoute('caravans').'/'.str_slug($category->slug)}}"> @endif
    <span><button class="leftbutton"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;&nbsp;
         @if(isset($category))
 

   {{$category->title}}

   @endif
   
    </button></span></a><span class="rightbutton"><a href="
    {{ url('/') . '/public/uploads/caravanproducts/'.$caravanProducts->Brochure}}"><button>{{ trans('general.pdfdownload') }}</button></a></span><span class="rightbutton"><a href="{{ url('/') . '/public/uploads/caravanproducts/'.$caravanProducts->Brochure}}"><button>{{ trans('general.brochures') }}</button></a></span></div>
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

<div class="gallery karavan karavan_detail">



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
 
 <div class="col-md-9">
  <div class=" bottom_image"><h1>{{$caravanProducts->model_name}}</h1> <h2>{{ trans('general.layoutsdata') }}</h2> 

</div>
<div  class="buttons">

 
<div class="btn-group one_layout"><a href="  {{url(App::getLocale()).'/'.transRoute('caravan').'/'.str_slug($category->slug).'/'.str_slug($caravanProducts->model_name_slug).'/layouts' }}"> <button class="btn">Layouts</button></a></div>



</div>
@if(isset($layouts))
 
 {!!$layouts->content!!} 
 
@endif

</div>

</div>



   
</div><!-- End container-fluid -->
   
</div>
</div>
@endsection

