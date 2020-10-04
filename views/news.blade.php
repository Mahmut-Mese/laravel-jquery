@extends('layouts.master')
 @if(isset($news))
@section('page_title', str_limit($news->title, 160) )

@section('head_extra') @endsection

@section('meta-description', str_limit($news->meta_description, 160) )

@section('meta-keywords', str_limit($news->meta_keywords, 160) )
@endif
@section('javascript_extra') @endsection

@section('header_extra') @endsection

@section('content')
  <div class="header_image">

      <img alt="Eltesan" title="Eltesan" src="{{ url('fit').'/1920x350/fix/'.'slider-marine-Kopie1.jpg' }}">
      <div class="container"><div class="about_caption"><h1>{{ trans('general.news') }} </h1></div></div>

   </div><!-- End header_image -->


<div class="news_detail ">

 <!-- section discover-our -->

<div class="container">
<ul class="page-title"><li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span><li><a href="{{url(App::getLocale().'/'.transRoute('news'))}}">{{ trans('general.news') }}</a></li><span>/</span>@if(isset($news))<li>{{$news->title}}</li>@endif</ul>
<div class="clearfix"></div>
</div>
<hr>
<div class="container">

<div class="row news_title">
  <div class="col-md-9">
  <div class="main_news main_news_imgs">

    @if(isset($news))
  <h2>{{$news->title}}</h2>
  <p class="news_update">
     <?php
$date = new DateTime($news->updated_at);
 
echo $date->format('d-m-Y');
?>
</p>

{!!$news->content!!}


 <!--  <div class="main_news_imgs">
  
    
  <img alt="Eltesan" src="">

  </div> --> @endif
   </div></div>
    @if(isset($lastNews))
  <div class="col-md-3 latest_news col-xs-12">
  <h2>{{ trans('general.latest_news') }}</h2>


 @foreach($lastNews as $one_lastNews) 
  <div class="other_news"><a href="{{url(App::getLocale()).'/'.transRoute('news').'/'.str_slug($one_lastNews->slug)}}">
        <div class="listnewsimage">  @if(!empty($one_lastNews->news->image))
                  <img alt="{{str_limit($one_lastNews->short_description, 160)}}" title="{{$one_lastNews->title}}" src="{{ url('photo') . '/200xnull/news/'.$one_lastNews->news->image}}"  onerror="this.src='{{ url('fix').'/200xnull/'.'no-picture_550.png' }}'" >
       @else
              <img  alt="{{str_limit($one_lastNews->short_description, 160)}}" title="{{$one_lastNews->title}}"
              src="{{ url('fix').'/200xnull/'.'no-picture_550.png' }}">
       @endif 
       </div>

  <h3>{{$one_lastNews->title}}</h3></a>
  </div>
   @endforeach
  
  </div>
   @endif

</div>

</div><!-- End container -->



 <!-- Swiper -->

   
                </div><!-- End container-fluid -->

                <!-- section footer -->
               
@endsection