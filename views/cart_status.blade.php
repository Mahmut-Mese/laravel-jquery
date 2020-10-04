@extends('layouts.master')

@section('head_extra') @endsection

@section('javascript_extra') @endsection

@section('header_extra') @endsection
 
@section('content')

<div class="">

 <!-- section discover-our -->

<div class="container">
<ul class="page-title"><li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span><li>{{ trans('general.order_status') }}</li></ul>
<div class="clearfix"></div>
</div>
<hr>
<div class="container">
<div class="row order_status">
<div class="col-md-4"></div>
<div class="col-md-4">

@if((isset($ret)) && (($ret) == 'true'))
<div class="status ">
  <img alt="Eltesan" src="{{ url('fix').'/150x150/'.'tickconfirm.png' }}">

  <p> {{ trans('general.order_confirm') }}</p>
</div>

@else
<div class="status ">
  <img alt="Eltesan" src="{{ url('fix').'/150x150/'.'tickreject.png' }}">
  <p>{{ trans('general.order_not_confirm') }}</p>
</div>

@endif
 
          </div>
          <div class="col-md-4"></div></div></div>

   
                </div><!-- End container-fluid -->
            



@endsection