@extends('layouts.master')
@if(isset($market))
@section('page_title', str_limit($market->page_title, 160) )

@section('head_extra') 
<link rel="stylesheet" href="{{ url('resources/assets') }}/css/swiper.min.css">
<link rel="stylesheet" href="{{ url('resources/assets') }}/css/swiper.css">
   @endsection

@section('meta-description', str_limit($market->meta_description, 160) )

@section('meta-keywords', str_limit($market->meta_keywords, 160) )
@endif
@section('javascript_extra')
<script src="{{ url('resources/assets') }}/js/swiper.min.js"></script>
<script src="{{ url('resources/assets') }}/js/swiperfile.js"></script> 
 <script  >
       var bg = $(".second_slider .about_caption").css('background-color');
    
    var n = bg.indexOf("a");
 
if(n == -1){
    var new_rgba_str = bg.replace(')', ', 0.70)').replace('rgb', 'rgba');
    $(".second_slider .about_caption").css("background-color",new_rgba_str );
}
  </script>
  <script >

 
         var newproducts_swiper = new Swiper('.application .swiper-container', {
              pagination: '.swiper-pagination',
              nextButton: '.swiper-button-next',
              prevButton: '.swiper-button-prev',
              paginationClickable: true,
              slidesPerView: 4,
             
              paginationClickable: true,
              spaceBetween: 40,



              grabCursor: true,
              loop: false,

              breakpoints: {
                1024: {
                  slidesPerView: 2,
                  spaceBetween: 40
                },


                767: {
                  slidesPerView: 1,
                  spaceBetween: 10
                }
              }
            });
    var leng = newproducts_swiper.slides.length  ;
if (leng>3) {  
 
  if (leng>6) {  
 for (var i = 7; i <= leng; i++) {
  newproducts_swiper.removeSlide([i,i+1]); 
   
 } }
     var newproducts_swiper = new Swiper('.application  .swiper-container', {
              pagination: '.swiper-pagination',
              nextButton: '.swiper-button-next',
              prevButton: '.swiper-button-prev',
              paginationClickable: true,
              slidesPerView: 4,
             
              paginationClickable: true,
              spaceBetween: 40,



              grabCursor: true,
              loop: true,

              breakpoints: {
                1024: {
                  slidesPerView: 2,
                  spaceBetween: 40
                },


                767: {
                  slidesPerView: 1,
                  spaceBetween: 10
                }
              }
            });


 }
</script>@endsection


@section('header_extra') @endsection

@section('content')

@include('includes.marketproducts_slider')

  <div class="marketsproducts">
    <div class="container">
<ul class="page-title"><li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span><li><a>{{ trans('general.application') }}</a></li><span>/</span><li> <?php echo strtolower(" $market->page_title "); ?></li></ul>
<div class="clearfix"></div>
</div>
<hr>

     <!-- section discover-our -->

 <section class="discover-our">
     <div class="discover">
     @if(isset($market))
        <h1 style="text-align: center; color:{{$market->markets->color}};" ><strong>{{$market->page_title}}</strong></h1>
        <h2 style="text-align: center;color:{{$market->markets->color}};">{{$market->short_description}}</h2>
         @endif
        </div><!-- End idiscover -->
        <div class="container">

          <div class="discover-contents">
            <ul class="row">

 @if(isset($categoryRelated))
  @php  $count=0;@endphp
        @php  $op=null;@endphp
    @foreach($categoryRelated as $one_categoryrelated)
        @if(($op===$one_categoryrelated->ptitle))
           <li><a href="{{url(App::getLocale() ).'/'.transRoute('products').'/'.$one_categoryrelated->pslug_tilte.'/'.$one_categoryrelated->slug_title.'?markets='.str_slug($market->markets['id']) }}">{{$one_categoryrelated->title}}</a></li>
        @else
                 @php  $op=$one_categoryrelated->ptitle;@endphp
                   @if(($op===$categoryRelated[0]->ptitle))

                   @else
                     </ul> </div>
</div>
</div>
<div class="box_tri"></div>
</div><!-- End market-box --></li>
                   @endif
                @if(!empty(  $one_categoryrelated->title ))
                  @php  $count=$count+1; @endphp
                  @if ($count % 3 == 1) 
 <div class="clearfix"></div> 
 @endif
 

 
             <li class="col-md-4 col-xs-12 col-sm-6">
              <div class="market-box">
                 <div class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown"  > 
               <div class="marketrelated">  
                <a  href="{{url(App::getLocale()).'/'.transRoute('products').'/'.$one_categoryrelated->pslug_tilte.'?markets='.str_slug($market->markets['id'])  }}">    
       @if(!empty( $one_categoryrelated->market_image))
               <img alt="{!!str_limit($one_categoryrelated->long_description, 160)!!}" title="{{$one_categoryrelated->title}}" src="
               {{ url('photo') . '/346xnull/productcategories/'.$one_categoryrelated->market_image}}"  onerror="this.src='{{ url('fix').'/346xnull/'.'no-picture_762.png' }}'"  >

       @else
              <img  alt="{!!str_limit($one_categoryrelated->long_description, 160)!!}" title="{{$one_categoryrelated->title}}"   
              src="{{ url('fix').'/346xnull/'.'no-picture_762.png' }}">
       @endif </a> </div></a>
                    <div class="img-bottom " style=" background-color:{{$one_categoryrelated->p_color}} !important;  "> 
                    <a   href="{{url(App::getLocale()).'/'.transRoute('products').'/'.$one_categoryrelated->pslug_tilte.'?markets='.str_slug($market->markets['id'])  }}">   <h3>{{$one_categoryrelated->ptitle}}</h3></a>
                     <div class="dropdown-menu ">
                       <ul>
                       <li><a href="{{url(App::getLocale() ).'/'.transRoute('products').'/'.$one_categoryrelated->pslug_tilte.'/'.$one_categoryrelated->slug_title.'?markets='.str_slug($market->markets['id'])  }}">{{$one_categoryrelated->title}}</a></li>
                        @endif
        @endif
    @endforeach
                     </ul>
                     </div>
</div>

</div><!-- End market-box -->
<div class="box_tri"></div>
               </li>
  @endif


     </ul><!-- End container -->
    </div><!-- End discover-contents -->
   </div>
</section><!-- end section discover-our -->

<!-- section inside -->

 



      @if(isset($catalog->catalogs))

   
<section class="freedom">
  <div class="container">
    <div class="row">
    <div class="col-md-6 col-xs-12 col-sm-6  catalog-picture ">
 
       @if(!empty( $catalog->catalogs->image))
               <img alt="{!!str_limit($catalog->catalogs->description, 160)!!}" title="{{$catalog->catalogs->name}}"  src="{{ url('photo') . '/nullx800/catalogs/'.$catalog->catalogs->image}}" onerror="this.src='{{ url('fix').'/nullx800/'.'no-picture_800.png' }}'">
       @else
              <img  alt="{!!str_limit($catalog->catalogs->description, 160)!!}" title="{{$catalog->catalogs->name}}"    
              src="{{ url('fix').'/nullx800/'.'no-picture_800.png' }}">
       @endif 
    </div>
    <div class="col-md-6 col-xs-12 col-sm-6"><h2 style=" color:{{$market->markets->color}};">{{$catalog->catalogs->name}}</h2><h3>{!!$catalog->catalogs->short_description !!}</h3>
      <div class="product-list">{!!$catalog->catalogs->description!!}</div><div class="buttons">

   {{--  <a href="{{ url('/') . '/public/uploads/catalogs/'.$catalog->catalogs->file}}"> <div class="catalog-button" style=" background-color:{{$market->markets->color}} !important;  "><span class="text">{{ trans('general.online_catalogue') }}</span><i class="fa fa-angle-right" aria-hidden="true"></i></div></a>--}}

     <a href="{{ url('/') . '/public/uploads/catalogs/'.$catalog->catalogs->file}}" target="_blank"> <div class="catalog-button " style=" background-color:{{$market->markets->color}} !important;  "><span class="text">{{ trans('general.download') }}</span><i class="fa fa-angle-right" aria-hidden="true"></i></div></a>
     <a href="{{url(App::getLocale()).'/'.transRoute('catalogs').'/'.$market->markets_id}}"> <div class="catalog-button " style=" background-color:{{$market->markets->color}} !important;  "><span class="text"> {{ trans('general.more_cataloge') }}</span><i class="fa fa-angle-right" aria-hidden="true"></i></div></a>
      <div class="clearfix"></div></div></div></div>
     
    </div>

  </section>

     

       @endif
 

 

@if($highlightproducts->count() )
 

   <!-- section newproducts -->
   <section class="newproducts application">
     <div class="newproduct-box">
      <h2 style=" color:{{$market->markets->color}} !important;">{{$market->page_title}}
       {{ trans('general.product_highlights') }}</h2><hr>
     </div><!-- End newproduct-box -->
     <div class="container">
      <div class="discover-contents swiper-container">
        <ul class="row swiper-wrapper">

   
 
 
           

 @foreach($highlightproducts as $one_highlightproduct) 
          <li class="col-md-3 col-xs-12 col-sm-6 swiper-slide " > 
          <div class="highlightimage">
      @if(!empty($one_highlightproduct->productimages[0]->image))
                <img  alt="{{str_limit($one_highlightproduct->producttranslates['product_description'], 160)}}" title="{{$one_highlightproduct->producttranslates['model_name']}}" src=" 
                {{ url('photo') . '/238x238/productimages/'.$one_highlightproduct->productimages[0]->image  }} "  onerror="this.src='{{ url('fix').'/238x238/'.'no-picture_800.png' }}'" >
       @else
              <img   alt="{{str_limit($one_highlightproduct->producttranslates['product_description'], 160)}}" title="{{$one_highlightproduct->producttranslates['model_name']}}"   
              src="{{ url('fix').'/238x238/'.'no-picture_800.png' }}">
       @endif 
       </div>
          

           <div class="img-bottom newproducts"><a href="{{url(App::getLocale()).'/'.transRoute('product').'/'.str_slug($one_highlightproduct->products['pc1_slug']).'/'.str_slug($one_highlightproduct->products['pc2_slug']).'/'.str_slug($one_highlightproduct->products['pc3_slug']).'/'.str_slug($one_highlightproduct->products['pc4_slug']).'/'.str_slug($one_highlightproduct->producttranslates['model_name']).'/'.str_slug($one_highlightproduct->products_id)}}"><h2  >{{$one_highlightproduct->producttranslates->model_name}} <br></h2></a></div>
            <div class="img-bottom newproductstitle"><a href="{{url(App::getLocale()).'/'.transRoute('product').'/'.str_slug($one_highlightproduct->products['pc1_slug']).'/'.str_slug($one_highlightproduct->products['pc2_slug']).'/'.str_slug($one_highlightproduct->products['pc3_slug']).'/'.str_slug($one_highlightproduct->products['pc4_slug']).'/'.str_slug($one_highlightproduct->producttranslates['model_name']).'/'.str_slug($one_highlightproduct->products_id)}}"><p>{{$one_highlightproduct->producttranslates->product_description}}</p>

         </a></div></li>@endforeach 
             
              

                  </ul>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div></div><!-- End newproduct-discover-contents -->
                </div><!-- End container -->
              </section><!-- End section newproducts -->



              <!-- section at-your -->

@endif 

 
 

                     
                  
   


    @if(isset($guidebook->catalogs))


              <section class="">
               <div class="guidebooks">
                 <div class="container">
                  <div class="row">
                    <div><h2 style=" color:{{$market->markets->color}};"> {{ trans('general.our_guide') }}</h2></div>
                    <hr>

  <div class="col-md-6 col-xs-12 col-sm-6 catalog-picture ">
     @if(!empty($guidebook->catalogs->image))
                <img alt="{!!str_limit($guidebook->catalogs->description, 160)!!}" title="{{$guidebook->catalogs->name}}" src="
                {{ url('photo') . '/nullx800/catalogs/'.$guidebook->catalogs->image}}"  onerror="this.src='{{ url('fix').'/nullx800/'.'no-picture_800.png' }}'">
       @else
              <img   alt="{!!str_limit($guidebook->catalogs->description, 160)!!}" title="{{$guidebook->catalogs->name}}" 
              src="{{ url('fix').'/nullx800/'.'no-picture_800.png' }}">
       @endif 
                        
                       </div><!-- col-sm-4 -->

                    <div class="col-md-6 col-xs-12 col-sm-6">
                      


                        <div class="catalog-title">
                          <h3 style=" color:{{$market->markets->color}};">{{ trans('general.see_our_guidebooks') }}</h3></div>

                        <p class="catalog-text">{{ trans('general.you_know_the_feeling') }}</p>
                        <div class="product-list"><ul>
                          <li>{{ trans('general.system_comparison') }}</li>
                          <li>{{ trans('general.function') }}</li>
                          <li>{{ trans('general.requirements') }}</li>
                          <li>{{ trans('general.performance_data') }}</li>
                          <li>{{ trans('general.operating_costs') }}</li>
                        </ul></div>
                        <div class="buttons">
                          <div class="catalog-button" style=" background-color:{{$market->markets->color}} !important;  "><a href="{{url(App::getLocale()).'/'.transRoute('catalogs').'/'.$market->markets_id}}"><span class="text">{{ trans('general.our_guide') }}</span><i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                          <div class="clearfix"></div></div>

                        </div><!-- col-sm-6 -->
                      

                     </div><!-- End row -->
                   </div><!-- End container -->
                 </div><!-- End guidebox -->
               </section><!-- End pagecatalog row -->
               @endif 
             </div><!-- End container-fluid -->

             <!-- section footer -->
@endsection