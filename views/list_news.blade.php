@extends('layouts.master')

@section('head_extra') @endsection

@section('javascript_extra') @endsection

@section('header_extra') @endsection

@section('content')

  <div class="header_image">

      <img alt="Eltesan" title="Eltesan" src="{{ url('fit').'/1920x350/fix/'.'slider-marine-Kopie1.jpg' }}">
      <div class="container"><div class="about_caption"><h1>{{ trans('general.news_list') }}</h1></div></div>

   </div><!-- End header_image -->

<div class="news_list ">

 <!-- section discover-our -->

<div class="container">
<ul class="page-title"><li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span><li>{{ trans('general.news_list') }}</li></ul>
<div class="clearfix"></div>
</div>
<hr>
<div class="container">
<!-- <div class="row news_title">
<h2>NEWS</h2>
</div> -->

    @if(isset($news))

 @foreach($news as $one_news) 
<div class="row news">
  <div class="col-md-3 col-xs-12 col-sm-4" ><a href="{{url(App::getLocale()).'/'.transRoute('news').'/'.str_slug($one_news->slug)}}">

       @if(!empty( $one_news->news->image))
               <img alt="{{str_limit($one_news->short_description, 160)}}" title="{{$one_news->title}}"  src="{{ url('photo') . '/250xnull/news/'.$one_news->news->image}}"  onerror="this.src='{{ url('fix').'/250xnull/'.'no-picture_550.png' }}'" >
       @else
              <img    alt="{{str_limit($one_news->short_description, 160)}}" title="{{$one_news->title}}"   
              src="{{ url('fix').'/250xnull/'.'no-picture_550.png' }}">
       @endif 
  </a></div>
  <div class="col-md-9 col-xs-12 col-sm-8 "><ul><li>
   <a href="{{url(App::getLocale()).'/'.transRoute('news').'/'.str_slug($one_news->slug)}}">
  <h3>{{$one_news->title}}</h3></a></li><li ><p class="content">
  {!!str_limit($one_news->content, 200)!!}</p><a href="{{url(App::getLocale()).'/'.transRoute('news').'/'.str_slug($one_news->slug)}}" class="show_hide" data-content="toggle-text">{{ trans('general.read_more') }}</a></li><li class="date">             <?php
$date = new DateTime($one_news->updated_at);
 
echo $date->format('d-m-Y');
?></li></ul></div>
</div>
@endforeach
@endif


</div><!-- End container -->



 <!-- Swiper -->

   
                </div><!-- End container-fluid -->

                <!-- section footer -->
@endsection