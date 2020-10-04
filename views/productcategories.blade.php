@extends('layouts.master')

@section('head_extra') @endsection

@section('javascript_extra') @endsection

@section('header_extra') @endsection

@section('content')
<div class="container">
<ul class="page-title"><li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span><li>{{ trans('general.products') }}</li></ul>
<div class="clearfix"></div>
</div>
<div class="productcategories discover-our container discover-contents">
<div class="form_title">
                <h1>{{ trans('general.products') }}</h1>
                </div>
                <ul class="row">

    @if(isset($productcategories))
        @foreach($productcategories as $product_cat)

    <li class="col-md-4 col-xs-12 col-sm-6">
              <div class="market-box">
         <div class="dropdown">
                @if(App::getLocale() == 'en')
               <a class="dropdown-toggle"  href="{{url(App::getLocale()).'/'.transRoute('products').'/'.str_slug($product_cat->productcategorytranslates[0]->slug_title )}}" >
                @else
                <a class="dropdown-toggle"  href="{{url(App::getLocale()).'/'.transRoute('products').'/'.str_slug($product_cat->productcategorytranslates[1]->slug_title )}}">
                @endif
         <div class="productcategoriesimage">
          @if(!empty($product_cat->list_image))
  
                    <img alt="{!!str_limit($product_cat->long_description, 160)!!}" title="{{$product_cat->productcategorytranslates[0]->title}}" src="
                    {{ url('photo') . '/nullx250/productcategories/'.$product_cat->list_image}}"   onerror="this.src='{{ url('fix').'/nullx250/'.'no-picture_550.png' }}'">
       @else
              <img    alt="{!!str_limit($product_cat->long_description, 160)!!}" title="{{$product_cat->productcategorytranslates[0]->title}}" 
              src="{{ url('fix').'/nullx250/'.'no-picture_550.png' }}">
       @endif </div> 

        <div class="img-bottom cooling " style="background-color:{{$product_cat->color}} !important;"> 

                 @if(App::getLocale() == 'en')

         <h3> {{$product_cat->productcategorytranslates[0]->title}}</h3>

@else <h3> {{$product_cat->productcategorytranslates[1]->title}}</h3>
@endif
                    </a>
                <div class="dropdown-menu ">
                  <ul>
                   
                   @foreach($product_cat->productcategorychild as $item) 

            <li><a href="{{url(App::getLocale()).'/'.transRoute('products').str_slug($product_cat->proproductcategorytranslates['slug_title']).'/'.str_slug($item->slug_title)}}">{{$item->title}}</a></li>
             @endforeach
              </ul>
  </div>
</div>
</div>
<div class="box_tri"></div>
</div><!-- End market-box --></li>


          @endforeach
    @endif

        </ul>
</div>
@endsection

