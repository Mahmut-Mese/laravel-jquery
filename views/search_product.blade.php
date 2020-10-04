@extends('layouts.master')

@section('head_extra') @endsection

@section('javascript_extra') 

@endsection

@section('header_extra') @endsection

@section('content')
<div class="search_product searchpage">
 
  <div class="container">
    <ul class="page-title"><li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span><li> {{ trans('general.search') }} </li></ul>
    <div class="clearfix"></div>
  </div>
<div class=" second-search" id="second_search" style="height:auto;">
 
<div id="search_container" class="container search_container">
<div class="search_text">{{ trans('general.search') }} </div>
    <input type="text" id="search_input" name="search_input" class="keyupsearchproduct" >

 

</div>
<div class="clearfix"></div>

</div>
<br><br>
<div class="search_list ">
  
       
         
        <div class="searchblade"  ></div>

 <div class=" row notfound" style="display:none" > 
                <div class="col-md-3"></div><div class="col-xs-12 col-md-8  ">
                    <div class=" "><h1> {{ trans('general.couldntfind') }}</h1></div>
                    <h4> {{ trans('general.suggestions') }} : </h4>
<ul>
    <li>{{ trans('general.spellcorrectly') }}</li>
    <li>{{ trans('general.synonymsword') }}</li>
     
</ul>
                </div>
            </div>
 
  <div class="loadmoreimg"></div>
  <div class="clearfix"></div>
 <a href="javascript:void(0)" class="load" id=" "><button class="btn">{{ trans('general.load_more') }}</button> </a><br><br>

</div> 
        </div>
@endsection
