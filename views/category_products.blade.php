@extends('layouts.master')
 @if(isset($catProducts[0]))
@section('page_title', str_limit($catProducts[0]->productcategorytranslates[0]->title, 160) )

@section('meta-description', str_limit($catProducts[0]->productcategorytranslates[0]->meta_description, 160) )

@section('meta-keywords', str_limit($catProducts[0]->productcategorytranslates[0]->meta_keywords, 160) )
@endif
@section('head_extra') @endsection

@section('javascript_extra')
  <script  >
       var bg = $(".second_slider .about_caption").css('background-color');
    
    var n = bg.indexOf("a");
 
if(n == -1){
    var new_rgba_str = bg.replace(')', ', 0.70)').replace('rgb', 'rgba');
    $(".second_slider .about_caption").css("background-color",new_rgba_str );
}
  </script>

 
 @endsection

@section('header_extra') @endsection

@section('content')

@include('includes.product_category_slider')

<div id="posts" class="categori">
<div class="container">
 @if(isset($catProducts))
@foreach($catProducts as $product)
@php   $maintitle =   $product->productcategorytranslates[0]-> title;
       $grandParenttitle = $grandParent->title ;
       $parenttitle = $product->productcategoryparent->title ; 
       $parent = '/'.str_slug($product->productcategoryparent->title);
       $grandparent = '/'.str_slug($grandParent->title);
       
@endphp
<ul class="page-title">
<li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span>
<li><a href="{{url(App::getLocale().'/'.transRoute('categories') )}}">{{ trans('general.products') }}</a></li><span>/</span>
<li><a href="{{url(App::getLocale()).'/'.transRoute('products').$grandparent }}"><?php echo strtolower(" $grandParenttitle "); ?> </a></li><span>/</span>
<li><a href="{{url(App::getLocale()).'/'.transRoute('products').$grandparent.'/'.str_slug($product->productcategoryparent->slug_title)}}" ><?php echo strtolower(" $parenttitle "); ?> </a></li><span>/</span>
<li> <?php echo strtolower(" $maintitle "); ?> </li></ul>
@endforeach
@endif
<div class="clearfix"></div>
</div>
<hr>

<div class="container categori">
	<div class="row">
		<div class="col-md-3 col-sm-3 col-xs-12 link category_list">
    <div class="link-side">
        @if(isset($grandParent))
 @php $color= getColorById($menuProducts,  $grandParent->productcategories_id)@endphp 
 @else
 @endif
 
   @if(isset($catProducts))

    
  
         @foreach($catProducts as $product)

 @if(isset($grandParent))
 

           <div class="top-link">
                     @if(empty($brands)&&empty($markets))
            <a href="{{url(App::getLocale()).'/'.transRoute('products').$grandparent }}" style="color:{{$color}}">
             @elseif(empty($brands)&& !empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$grandparent.'?markets='.$markets}}" style="color:{{$color}}">
             @elseif(!empty($brands)&& empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$grandparent.'?brands='.$brands}}" style="color:{{$color}}">
             @elseif(!empty($brands)&& !empty($markets))
           <a href="{{url(App::getLocale()).'/'.transRoute('products').$grandparent.'?brands='.$brands.'&markets='.$markets}}" style="color:{{$color}}">
             @endif
       {{$grandParent->title}}</a></div><!-- End top-linlk -->
       @else
      
   @php  $parent = null; $grandparent = null @endphp   
@endif



        <ul>

        
            @if( empty($product->productcategoryparent) &&!empty($markets))   
         @else
            
     
                @if( empty($product->productcategoryparent) &&!empty($brands))
              @else

 <li class="bottom-link ">
             @if(empty($brands)&&empty($markets))

             <a href="{{url(App::getLocale()).'/'.transRoute('products').$grandparent.'/'.str_slug($product->productcategoryparent->slug_title)}}" style="color:{{$color}}">
             @elseif(empty($brands)&& !empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$grandparent.'/'.str_slug($product->productcategoryparent->slug_title).'/'.'?markets='.$markets}}" style="color:{{$color}}">
             @elseif(!empty($brands)&& empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$grandparent.'/'.str_slug($product->productcategoryparent->slug_title).'/'.'?brands='.$brands}}" style="color:{{$color}}">
             @elseif(!empty($brands)&& !empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$grandparent.'/'.str_slug($product->productcategoryparent->slug_title).'/'.'?brands='.$brands.'&markets='.$markets}}" style="color:{{$color}}">
             @endif
            {{$product->productcategoryparent->title}}</a>

 <ul>
            @if( empty($product->productcategorytranslates) &&!empty($markets))   
         @else
            
     
                @if( empty($product->productcategorytranslates) &&!empty($brands))
              @else

<li class="bottom-link bold">
       @if(empty($brands)&&empty($markets))

             <a href="{{url(App::getLocale()).'/'.transRoute('products').$grandparent.'/'.str_slug($product->productcategoryparent->slug_title).'/'.str_slug($product->productcategorytranslates[0]->slug_title)}}" style="color:{{$color}}">
             @elseif(empty($brands)&& !empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$grandparent.'/'.str_slug($product->productcategoryparent->slug_title).'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.'?markets='.$markets}}" style="color:{{$color}}">
             @elseif(!empty($brands)&& empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$grandparent.'/'.str_slug($product->productcategoryparent->slug_title).'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.'?brands='.$brands}}" style="color:{{$color}}">
             @elseif(!empty($brands)&& !empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$grandparent.'/'.str_slug($product->productcategoryparent->slug_title).'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.'?brands='.$brands.'&markets='.$markets}}" style="color:{{$color}}">
             @endif
            {{$product->productcategorytranslates[0]->title}}</a>
             </li>
             @endif
         @endif
          
        </ul>
           
           </li>
             @endif
         @endif
             
        </ul>
                  @endforeach
    @endif 
    <div class="clearfix"></div>
		     <div>
      
         <h4>{{ trans('general.select_application') }}</h4>  
          <ul class="application">
        
              @if(isset($marketRelated))
         @foreach($marketRelated as $market_item)
         <li class=" "  style="background-color:{{$market_item['color']}}">


        @if(empty($brands))
             @if($markets==$market_item['id'])
             <a href="{{url()->current()}}">
             @else
             <a href="{{url()->current().'?markets='.str_slug($market_item['id'])}}">
             @endif
        @else
            @if($markets==$market_item['id'])
            <a href="{{url()->current().'?brands='.$brands}}">
            @else
            <a href="{{url()->current().'?markets='.str_slug($market_item['id']).'&brands='.$brands}}">
            @endif
        @endif

    <img alt="Eltesan" src="{{ url('photo').'/50x50/markets/'.$market_item['icon']}}" title="{{$market_item['title']}}" ><img alt="Eltesan" title="Eltesan" class="tick  {{ $markets == $market_item['id'] ? ' show' : 'none' }}" alt="eltesantick" src="{{ url('fix').'/24xnull/'.'tick.png' }}"></a></li>
       
                  @endforeach
    @endif
         

         </ul> 
       </div>
      <br>
        <div class="clearfix">
    <h4>{{ trans('general.select_brand') }}</h4>  
         <ul class="brand">
                     @if(isset($brandRelated))
         @foreach($brandRelated as $brand)
         <li class="waeco ">
                 @if(empty($markets))
             @if($brands==$brand['id'])
             <a href="{{url()->current()}}">
             @else
             <a href="{{url()->current().'?brands='.str_slug($brand['id'])}}">
             @endif
        @else
            @if($brands==$brand['id'])
            <a href="{{url()->current().'?markets='.$markets}}">
            @else
            <a href="{{url()->current().'?brands='.str_slug($brand['id']).'&markets='.$markets}}">
            @endif
        @endif
    
         <img alt="Eltesan" title="{{$brand['title']}}" src="{{ url('photo').'/50x50/brands/'.$brand['icon']}}"  >
         <img alt="Eltesan" title="Eltesan" class="tick  {{ $brands == $brand['id'] ? ' show' : 'none' }}" alt="eltesantick" src="{{ url('fix').'/24xnull/'.'tick.png' }}">
         </a></li>
        
                           @endforeach
    @endif
       </ul>  
      </div>
      </div><!-- link-side -->
		</div><!-- End col-md-4 col-sm-6 -->
		<div class="col-md-9 col-sm-9 col-xs-12 ">
		<div class="product-explanation">
	<!-- 		<p>Equipped with high-tech compressors, the well-proven refrigerators of the WAECO CoolMatic series provide outstandingly intensive, long-lasting refrigeration for mobile applications. Their operation is perfectly reliable even in tilted positions and high ambient temperatures. They work economically, extremely quietly, and on solar energy, too. The various models of the WAECO CoolMatic series satisfy all requirements a camper fridge has to meet. There’s a matching appliance for every size of vehicle and for every room situation. The interior features compare extremely well with your domestic fridge …</p>
 -->




      <div id="categori">
  <!--   <div class="buttons views "><button class="list"><i class="fa fa-align-justify fa-2x"></button></i>
        <button class="grid "> <i class="fa fa-th-large fa-2x"></i></button>
        
    </div> -->
    
    <section class="grid">
    <h1>{{$product->productcategorytranslates[0]->title}}</h1>
  


      
    @foreach($product->productcategorychild as $child)
    <div class="clearfix"></div>
<div  id="deneme" class=" panel_group ">
     
      <h2 class="product_short" style="color:{{$color}}">{!!$child->title!!}</h2>
      <p class="short_title">{!!$child->short_description!!} </p> 
      <p class="product_long">{!!$child->long_description!!}</p>
     @if(isset($child->productcategories->list_image))
      <img alt="{!!str_limit($child->long_description, 160)!!}"  title="{!!$child->title!!}" src="{{ url('photo').'/848xnull/productcategories/'.$child->productcategories->list_image}}" onerror="this.src='{{ url('fix').'/848xnull/'.'no-picture_1600x640.png' }}'" 
       ><br><br>
      <div class="clearfix"></div>
 @endif

 
 @if(isset($productcategoryProducts))

    @foreach($productcategoryProducts as $key => $value)
           
             @if($child->productcategories_id == $key) 
                
                 @foreach($value as $key2 => $value2)
                

      <div class="col-md-4 col-sm-6 title panel "><div class=" product-picture"><a href=" {{url(App::getLocale()).'/'.transRoute('product').$grandparent.'/'.str_slug($product->productcategoryparent->slug_title).'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.str_slug($child->slug_title).'/'.str_slug($value2['model_name']).'/'.str_slug($value2['products_id'])}}">
  
 @foreach($value2['productimages'] as $key3 => $value3 )

 
           @if(!empty($value3['image']))
         
      <img alt="{!!str_limit($value2['product_description'], 160)!!}" title="{!! $value2['model_name'] !!}"  src="
       {{ url('photo').'/nullx262/productimages/'.$value3['image']}}" onerror="this.src='{{ url('fix').'/nullx262/'.'no-picture_800.png' }}'">

      
      @else
       <img alt="{!!str_limit($value2['product_description'], 160)!!}" title="{!! $value2['model_name'] !!}"  src="{{ url('fix').'/nullx262/'.'no-picture_800.png' }}"  >
     @endif
    @endforeach
   
      </a></div><!-- end product picrutre --><h2><a href=" {{url(App::getLocale()).'/'.transRoute('product').$grandparent.'/'.str_slug($product->productcategoryparent->slug_title).'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.str_slug($child->slug_title).'/'.str_slug($value2['model_name']).'/'.str_slug($value2['products_id'])}}">{!! $value2['model_name'] !!}
      </a></h2>
         <p><b>{{  $value2['product_description']}}</b></p>
         <hr>
         <ul>
          @foreach($value2['productqualityfeatures'] as $key4 => $value4 )
           <li>{{$value4['title']}}</li>
            
           @endforeach
    
         </ul>
          {{--  <div class="more-detail"><a href="{{url(App::getLocale()).'/'.transRoute('product').$grandparent.'/'.str_slug($product->productcategoryparent->slug_title).'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.str_slug($child->slug_title).'/'.str_slug($value2['model_name']).'/'.str_slug($value2['products_id'])}}"><p>{{ trans('general.more_details') }}</p></a></div>
       --}}
      
        </div><!-- End title -->
     
  

 

             @endforeach
                                   
             @endif
               
             @endforeach
          @endif
 
          
    
 
        
    
        
  
 
     
     
        <div class="col-md-4 col-sm-6 loading_col"  >
       <div class="loading">
              <a  class="more" id=""><img alt="Eltesan" src="{{ url('fix').'/25xnull/'.'add.png' }}"><span></span>&nbsp;{{ trans('general.more') }}</a>
<a class="less" id=""><img alt="Eltesan" title="see less"  src="{{ url('fix').'/25xnull/'.'remove.png' }}">&nbsp;{{ trans('general.less') }}</a></div></div>
     
           </div><!-- End row -->
   

   

  @endforeach

 




      </section><!-- section gridlist-->
      </div>     <!--  <p id="loading">
  <img alt="Eltesan" src="{{ url('resources/assets') }}/images/loading.gif" alt="Loading…" />
</p> -->
      </div><!-- End product-explanation -->
  </div><!-- end col-md-8 -->
  </div><!-- End row -->
  </div><!-- End conatiner -->
</div><!-- End conatiner-fluid -->
<!-- section footer -->
@endsection
