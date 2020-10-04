@extends('layouts.master')
@if(isset($category))
@section('page_title', str_limit($category->title, 160) )

@section('meta-description', str_limit($category->meta_description, 160) )

@section('meta-keywords', str_limit($category->meta_keywords, 160) )
@endif
@section('head_extra')
<!-- head_extra -->
    <link rel="stylesheet" href="{{ url('resources/assets') }}/css/hover.css">
@endsection

@section('javascript_extra') @endsection

@section('content')

<div class="gallery karavan karavanproducts">


<div class="karavan_choose">
<div class="container">
  <div class="row">
  
          
    <div class="models">
     @if(isset($categories))
   @foreach($categories as $one_category)

  <span><a href="{{url(App::getLocale()).'/'.transRoute('caravans').'/'.str_slug($one_category->slug)}}"><button>{{$one_category->title}}</button></a></span>
   @endforeach
   @endif
  
   
    </div>
  </div>
</div>



</div>

   <div class="header_image">

  
          @if(!empty($category->image))
         
      <img alt="Eltesan" title="{!!$category->title!!}"  src="
      {{ url('fit') . '/1600x570/caravancategories/'.$category->image}}"  >

      
      @else
       <img alt="Eltesan" title="{!!$category->title!!}"   src="{{ url('fit').'/1600x570/fix/'.'no-picture_1600x640.png' }}"   >
     @endif

   </div><!-- End header_image -->
   </div>
<div class="gallery karavan">

 <!-- section discover-our -->


<div class="container image_galeri">


<div class="row">
 @if(!empty($category->titr))
<h1>{{$category->titr}}</h1>
@endif
@if(!empty($category->sub_titr))
<h4>{{$category->sub_titr}}</h4>
@endif
</div>

 
 
    <div class="row">
    @if(!empty($caravanProducts))
     @foreach($caravanProducts as $one_caravanproduct)
      <div class="col-lg-4 col-sm-6 col-xs-12"><div class="hvr-float-shadow image item" ><a href="{{url(App::getLocale()).'/'.transRoute('caravan').'/'.str_slug($category->slug).'/'.str_slug($one_caravanproduct->model_name_slug)}}">
      <div class="caravanimage">
        @if(!empty($one_caravanproduct->Cover_Picture))
       <img alt="{{str_limit($one_caravanproduct->caravanproducttranslates[0]->list_short_description, 160)}}" title="{{$one_caravanproduct->model_name}}" class="thumbnail img-responsive" src="
       {{ url('photo') . '/nullx250/caravanproducts/'.$one_caravanproduct->list_image}}
        " onerror="this.src='{{ url('fix').'/nullx250/'.'no-picture_550.png' }}'">
       @else

        <img alt="{{str_limit($one_caravanproduct->caravanproducttranslates[0]->list_short_description, 160)}}" title="{{$one_caravanproduct->model_name}}" class="thumbnail img-responsive" src="{{ url('fix').'/nullx250/'.'no-picture_550.png' }}">

       @endif
       </div></a>
      <div class="image_explanation">
      @if(!empty($one_caravanproduct->model_name))
      <h3>{{$one_caravanproduct->model_name}}</h3>
      @endif
      <hr>
        <ul>
            @if(!empty($one_caravanproduct->caravanproducttranslates[0]->size))
        <li><span> {{ trans('general.size') }}</span> <span>
      
        {{$one_caravanproduct->caravanproducttranslates[0]->size}}  </span></li> @endif 
            @if(!empty($one_caravanproduct->caravanproducttranslates[0]->weight))
        <li><span> {{ trans('general.weight') }}</span><span>
    
        {{$one_caravanproduct->caravanproducttranslates[0]->weight}} </span></li>@endif
        @if(!empty($one_caravanproduct->caravanproducttranslates[0]->people))
        <li><span> {{ trans('general.people') }}</span><span> 
        
        {{$one_caravanproduct->caravanproducttranslates[0]->people}} </span></li>@endif
        @if(!empty($one_caravanproduct->caravanproducttranslates[0]->body_work))
        <li><span> {{ trans('general.bodywork') }}</span><span>
        
        {{$one_caravanproduct->caravanproducttranslates[0]->body_work}} </span></li>@endif
         @if(!empty($one_caravanproduct->caravanproducttranslates[0]->chassis))
        <li><span> {{ trans('general.chassis') }}</span><span>
       
        {{$one_caravanproduct->caravanproducttranslates[0]->chassis}} </span></li>@endif
         @if(!empty($one_caravanproduct->caravanproducttranslates[0]->class))
        <li><span> {{ trans('general.class') }}</span><span>
       
        {{$one_caravanproduct->caravanproducttranslates[0]->class}}</span></li> @endif
        </ul><hr>
         @if(!empty($one_caravanproduct->caravanproducttranslates[0]->list_short_description))
        <p>{{$one_caravanproduct->caravanproducttranslates[0]->list_short_description}}
      </p>
      @endif
     </div> @if(!empty($one_caravanproduct->model_name_slug)&&!empty($category->slug))<a href="{{url(App::getLocale()).'/'.transRoute('caravan').'/'.str_slug($category->slug).'/'.str_slug($one_caravanproduct->model_name_slug)}}">
        @endif
        <button> {{ trans('general.learn_more') }}</button></a></div></div>

     @endforeach
      
@endif
  

    </div>







</div><!-- End container -->



 <!-- Swiper -->

   
                </div><!-- End container-fluid -->
   


@endsection
