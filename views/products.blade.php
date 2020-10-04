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

@include('includes.categorylist_slider')
            


<div class="category_list">
  <div class="container">
 @if(isset($catProducts))
@foreach($catProducts as $product)
@php   $maintitle =   $product->productcategorytranslates[0]-> title;@endphp
 
 
    <ul class="page-title"><li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span><li><a href="{{url(App::getLocale().'/'.transRoute('categories'))}}">{{ trans('general.products') }}</a></li><span>/</span>
@if(isset($product->productcategoryparent))
@php  $parenttitle = $product->productcategoryparent->title ; @endphp
<li><a href="{{url(App::getLocale()).'/'.transRoute('products').'/'.str_slug($product->productcategoryparent->slug_title)}}"> <?php echo strtolower(" $parenttitle "); ?> </a></li><span>/</span>
@endif
       <li> <?php echo strtolower(" $maintitle "); ?> </li>
       </ul>
  @endforeach
    <div class="clearfix"></div>
  </div>
  <hr>
  <div class="container">
  <div class="row">
    <div class="col-md-3 col-sm-3 link">
      <div class="link-side">
         @foreach($catProducts as $product)
        
           @if(isset($product->productcategoryparent))
 @php $color= getColorById($menuProducts,  $product->productcategoryparent->productcategories_id)@endphp 
 @else
   @php    $color=$product->color  @endphp 
 @endif
 
  @endforeach
@endif
   @if(isset($catProducts))

    
  
         @foreach($catProducts as $product)

 @if(isset($product->productcategoryparent))
@php  $parent = '/'.str_slug($product->productcategoryparent->title); 

@endphp
 

           <div class="top-link">
                     @if(empty($brands)&&empty($markets))
            <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent }}" style="color:{{$color}}">
             @elseif(empty($brands)&& !empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'?markets='.$markets}}" style="color:{{$color}}">
             @elseif(!empty($brands)&& empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'?brands='.$brands}}" style="color:{{$color}}" style="color:{{$color}}">
             @elseif(!empty($brands)&& !empty($markets))
           <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'?brands='.$brands.'&markets='.$markets}}" style="color:{{$color}}">
             @endif
       {{$product->productcategoryparent->title}}</a></div><!-- End top-linlk -->
       @else
   @php  $parent = null @endphp   
@endif



        <ul>

        
            @if( empty($product->productcategorytranslates) &&!empty($markets))   
         @else
            
     
                @if( empty($product->productcategorytranslates) &&!empty($brands))
              @else

 <li class="bottom-link bold">
             @if(empty($brands)&&empty($markets))

             <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'/'.str_slug($product->productcategorytranslates[0]->slug_title)}}" style="color:{{$color}}">
             @elseif(empty($brands)&& !empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.'?markets='.$markets}}" style="color:{{$color}}">
             @elseif(!empty($brands)&& empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.'?brands='.$brands}}" style="color:{{$color}}">
             @elseif(!empty($brands)&& !empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.'?brands='.$brands.'&markets='.$markets}}" style="color:{{$color}}">
             @endif
            {{$product->productcategorytranslates[0]->title}}</a>

 <ul>
         @foreach($product->productcategorychild as $child_item) 
            @if( empty($child_item->toarray()) &&!empty($markets))   
         @else
            
     
                @if( empty($child_item->toarray()) &&!empty($brands))
              @else

 <li class="bottom-link">
             @if(empty($brands)&&empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.str_slug($child_item->slug_title)}}" style="color:{{$color}}">
             @elseif(empty($brands)&& !empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.str_slug($child_item->slug_title).'/'.'?markets='.$markets}}" style="color:{{$color}}">
             @elseif(!empty($brands)&& empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.str_slug($child_item->slug_title).'/'.'?brands='.$brands}}" style="color:{{$color}}">
             @elseif(!empty($brands)&& !empty($markets))
          <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.str_slug($child_item->slug_title).'/'.'?brands='.$brands.'&markets='.$markets}}" style="color:{{$color}}">
             @endif
            {{$child_item->title}}</a>
             </li>
             @endif
         @endif
              @endforeach
        </ul>
           
           </li>
             @endif
         @endif
             
        </ul>
                  @endforeach
    @endif 
            
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

    <img alt="Eltesan" src="
    {{ url('photo') . '/50x50/markets/'.$market_item['icon']}}" title="{{$market_item['title']}}" ><img alt="Eltesan" title="Eltesan" class="tick  {{ $markets == $market_item['id'] ? ' show' : 'none' }}" alt="eltesantick" src="
    {{ url('fix').'/24xnull/'.'tick.png' }}"></a></li>
       
                  @endforeach
    @endif
         

         </ul> 
       </div>
    
       <div class="clearfix"></div>
       <h4>{{ trans('general.select_brand') }}</h4>  
         <ul class="brand">
                     @if(isset($brandRelated))
         @foreach($brandRelated as $brand)
         <li class="waeco">
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
    
         <img alt="Eltesan" title="{{$brand['title']}}" src="
         {{ url('photo') . '/50x50/brands/'.$brand['icon']}}">
         <img alt="Eltesan" title="Eltesan" class="tick  {{ $brands == $brand['id'] ? ' show' : 'none' }}"  src="{{ url('fix').'/24xnull/'.'tick.png' }}"></a></li>
        
                           @endforeach
    @endif
       </ul> 
     </div><!-- link-side -->
   </div><!-- End col-md-4 -->
   
   <div class="col-md-9 col-sm-9">
    <div class="product-explanation">



<h1>{{$maintitle}}</h1>
<br>
@if(!empty($product->productcategorytranslates[0]->short_description) )
 <p class="short_title"> {!!$product->productcategorytranslates[0]->short_description!!} </p> 
@endif

@if(!empty($product->productcategorytranslates[0]->long_description) )
<p>{!!$product->productcategorytranslates[0]->long_description!!}</p>
@endif
<br> 

     <ul>
         @foreach($product->productcategorychild as $item) 
             @if( empty($item->productcategories->productcategorychild->toarray()) &&!empty($markets))   
         @else
            
     
                @if( empty($item->productcategories->productcategorychild->toarray()) &&!empty($brands))
              @else
         <li><h2 style="color:{{$color}}">{{$item->title}}</h2>
           @if($parent==null) 
           <p class="upper">
             @else
             <p >
           @endif
   {!!$item->short_description!!} </p> 
      <p>{!!$item->long_description!!}</p>

           @if(empty($brands)&&empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.str_slug($item->slug_title)}}">
             @elseif(empty($brands)&& !empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.str_slug($item->slug_title).'/'.'?markets='.$markets}}">
             @elseif(!empty($brands)&& empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.str_slug($item->slug_title).'/'.'?brands='.$brands}}">
             @elseif(!empty($brands)&& !empty($markets))
          <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.str_slug($item->slug_title).'/'.'?brands='.$brands.'&markets='.$markets}}">
             @endif
             <div class="productsimage">
            @if(!empty($item->productcategories->list_image))
                     <img alt="{!!str_limit($item->long_description, 160)!!}" 
                       title="{{$item->title}}" src="{{ url('photo') . '/763xnull/productcategories/'.$item->productcategories->list_image}}"  onerror="this.src='{{ url('fix').'/763xnull/'.'no-picture_762.png' }}'">
       @else
              <img    alt="{!!str_limit($item->long_description, 160)!!}" 
                       title="{{$item->title}}" 
              src="{{ url('fix').'/763xnull/'.'no-picture_762.png' }}">
       @endif 
</div>
      <div class="img-bottom" style="background-color:{{$color}}" > <h3>{{$item->title}}</h3> </div> </a>
       <div class="img-bottom" style="background-color:{{$color}}">
      @if(empty($product->productcategoryparent))
        @foreach($item->productcategories->productcategorychild as $child_item) 

  <ul>
              <li>
               @if(empty($brands)&&empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.str_slug($item->slug_title).'/'.str_slug($child_item->slug_title)}}">
             @elseif(empty($brands)&& !empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.str_slug($item->slug_title).'/'.str_slug($child_item->slug_title).'/'.'?markets='.$markets}}">
             @elseif(!empty($brands)&& empty($markets))
             <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.str_slug($item->slug_title).'/'.str_slug($child_item->slug_title).'/'.'?brands='.$brands}}">
             @elseif(!empty($brands)&& !empty($markets))
          <a href="{{url(App::getLocale()).'/'.transRoute('products').$parent.'/'.str_slug($product->productcategorytranslates[0]->slug_title).'/'.str_slug($item->slug_title).'/'.str_slug($child_item->slug_title).'/'.'?brands='.$brands.'&markets='.$markets}}">
             @endif
              {{$child_item->title}}</a></li>
          
          
            </ul>
      
       @endforeach
       @endif
        <div class="box_tri"></div></div></a></li>      @endif  @endif  @endforeach
          

       
          </ul>
            
            
          </div><!-- End product-explanation -->
          
        </div><!-- end col-md-8 -->
        </div>
      </div><!-- End conatiner  -->

    </div><!-- End conatiner categori -->

@endsection