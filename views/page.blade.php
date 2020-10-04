@extends('layouts.master')
@if(isset($page))
@section('page_title', str_limit($page->title, 160) )

@section('head_extra') @endsection

@section('javascript_extra') @endsection

@section('meta-description', str_limit($page->meta_description, 160) )

@section('meta-keywords', str_limit($page->meta_keywords, 160) )
@endif
@section('header_extra') @endsection

@section('content')

   <div class="header_image">

      <img alt="Eltesan" title="Eltesan" src="{{ url('fit').'/1920x350/fix/'.'slider-marine-Kopie1.jpg' }}">
      <div class="container"><div class="about_caption">
      @if(isset($page))
      <h1>{{$page->title}}</h1>
      @endif
      </div></div>

   </div><!-- End header_image -->
 <div class="ik page">

 <!-- section discover-our -->


<div class="container">
<ul class="page-title"><li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span>@if(isset($page))<li> {{$page->title}} </li>@endif</ul>
<div class="clearfix"></div>
</div>
<hr>
<div class="container">
  <div class="row">
 
    <div class="col-md-4 col-xs-12 col-sm-4 leftmenu"><ul  class="buttons">

    @if(isset($menuPage))

 @foreach($menuPage as $one_menuPage)
<li class="dropdown catalog-button"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href=""><span class="text">{{$one_menuPage->title}}</span>
<i class="fa fa-angle-right" aria-hidden="true"></i></a>

<ul class="dropdown-menu">

 @foreach($one_menuPage->menuplugins as $one_menuplugin)
<li class="catalog-button second"><a href="{{url(App::getLocale()).$one_menuplugin->link}}"><span class="text">{{$one_menuplugin->title}}</span>
<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
@endforeach

</ul>
</li>
@endforeach
@endif







</ul>







<div class="clearfix"></div></div>
    @if(isset($page))
  



      <div class="col-md-8 col-xs-12 col-sm-8">
     
       <h2>{{$page->title}}</h2>
       
   {!!$page->content!!}
 

           
  
      </div> <!-- col-8 -->
      @endif

       
 
</div>
</div>



   
                </div><!-- End container-fluid -->
            



                <!-- section footer -->
@endsection