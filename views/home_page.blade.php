@extends('layouts.master')

@section('head_extra') 
 <link rel="stylesheet" href="{{ url('resources/assets') }}/css/swiper.min.css">
 <link rel="stylesheet" href="{{ url('resources/assets') }}/css/swiper.css">
    @endsection

@section('javascript_extra')
<script src="{{ url('resources/assets') }}/js/swiper.min.js"></script>
<script src="{{ url('resources/assets') }}/js/swiperfile.js"></script>
<script  >
  var nws_leng = nws_swiper.slides.length  ;
if (nws_leng>2) {  

  if (nws_leng>6) {  
 for (var t = 7; t <= nws_leng; t++) {
  nws_swiper.removeSlide([t,t+1]); 
   
 } }

  var nws_swiper = new Swiper('.inside .swiper-container', {
           
         
            slidesPerView: 3,
            spaceBetween: 20,
            grabCursor: true,
            loop: true,
            
              
           

        breakpoints: {
            1024: {
                slidesPerView: 2,
                spaceBetween: 40
            },
        767: {
                slidesPerView: 1,
                spaceBetween: 0
            }
            
        }
    });
 }
 
</script>
  <script >

 
    var lenghglht = homepage_swiper.slides.length  ;
if (lenghglht>3) {  
 
  if (lenghglht>6) {  
 for (var i = 7; i <= lenghglht; i++) {
  homepage_swiper.removeSlide([i,i+1]); 
   
 } }
      var homepage_swiper = new Swiper('.homepage .newproducts .swiper-container', {
      pagination: '.swiper-pagination',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
      
        slidesPerView: 5,
 
            
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
                spaceBetween: 0
            }
        }
    });


 }
</script> @endsection

@section('header_extra')
 @endsection

@section('content')


@include('includes.general_slider')
<div class="homepage">
 <!-- section discover-our -->

  <section class="discover-our">
   
    <div class="discover"> <h2> {{ trans('general.discover_our_market') }}</h2>
     

    </div><!-- End idiscover -->
    <div class="container">

    <div class="discover-contents">
      <ul class="row">



      @if(isset($markets))
 @foreach($markets as $market) 
        <li class="col-md-4 col-xs-12"><a href="{{url(App::getLocale()).'/'.transRoute('market').'/'.$market->markettranslates[0]->slug }}"> 
       <div class="homepagemarketimage">
  @if(!empty($market->image))
    <img alt="{!!str_limit($market->markettranslates[0]->short_description, 160)!!}" title="{{$market->markettranslates[0]->title}}"
        src="{{ url('photo').'/334xnull/markets/'.$market->image }}"  onerror="this.src='{{ url('fix').'/334xnull/'.'no-picture_762.png' }}'"
         >
       @else

       
        <img   alt="{!!str_limit($market->markettranslates[0]->short_description, 160)!!}" title="{{$market->markettranslates[0]->title}}"
        src="{{ url('fix').'/334xnull/'.'no-picture_762.png' }} ">

       @endif
</div>

         <div style="background-color:{{$market->color}};" class="img-bottom "><h3>{{$market->markettranslates[0]->title}}</h3><div class="box_tri"></div></div></a></li>@endforeach

       @endif


      </ul></div><!-- End discover-contents -->
     </div></section><!-- end section discover-our -->
 
  <!-- section inside -->
  
    @if($news->count() )
  <section class="inside">
    <div class="inside-box">
      <h2> {{ trans('general.inside_word_of_dometic') }}</h2><hr>
    </div><!-- End inside-box -->
    <div class="container">
      <div class="discover-contents swiper-container">
        <ul class="swiper-wrapper">
       
@foreach($news as $new) 
         <li class=" swiper-slide col-md-4 col-xs-12"> <a href="{{url(App::getLocale()).'/'.transRoute('news').'/'.$new->slug}}">
         <div class="newsimage">
       @if(!empty($new->news->image))
              <img alt="{{str_limit($new->short_description, 160)}}" title="{!!$new->title!!}" src="
              {{ url('photo').'/353xnull/news/'.$new->news->image }}" onerror="this.src='{{ url('fix').'/353xnull/'.'no-picture_550.png' }}'">
       @else
              <img    alt="{{str_limit($new->short_description, 160)}}" title="{!!$new->title!!}"
              src="{{ url('fix').'/353xnull/'.'no-picture_550.png' }}">
       @endif
       </div>
             <div class="img-bottom"><div class="desc"><p class="title_bottom">{!!$new->title!!}</p>
           
           <p class="text_bottom"> {{str_limit($new->short_description, 80)}}</p>
             
             </div><p class="newsdate">
             <?php
$date = new DateTime($new->updated_at);
 
echo $date->format('d-m-Y');
?>
              </p></div></a></li>@endforeach

       


       </ul>
       <div class="swiper-button-next">
       
       </div>
       <div class="swiper-button-prev">
  
       </div>
     </div><!-- End discover-contents -->
   </div><!-- End container -->
 </section><!-- End section inside -->
 <!-- Swiper -->
@endif

 <!-- section newproducts -->
 
 @if($highlightproducts->count() )
    <section class="newproducts">
     <div class="newproduct-box">
     <h2><strong><span style="color: #b80c23;"> {{ trans('general.new') }}</span></strong>{{ trans('general.products') }}</h2><hr>
     </div><!-- End newproduct-box -->
     <div class="container">
      <div class="discover-contents swiper-container">
        <ul class="row swiper-wrapper">

   
 
   

 @foreach($highlightproducts as $one_highlightproduct) 

          <li class="col-md-3 col-xs-12 col-sm-6 swiper-slide " >  
          

@if(isset($one_highlightproduct->productimages[0]))
<div class="highlightimage">
       @if(!empty($one_highlightproduct->productimages[0]->image))
               <img alt="{{str_limit($one_highlightproduct->producttranslates['product_description'], 160)}}" title="{{$one_highlightproduct->producttranslates['model_name']}}" src="
               {{ url('photo') . '/200x200/productimages/'.$one_highlightproduct->productimages[0]->image  }}" onerror="this.src='{{ url('fix').'/200x200/'.'no-picture_800.png' }}'">
       @else
              <img    alt="{{str_limit($one_highlightproduct->producttranslates['product_description'], 160)}}" title="{{$one_highlightproduct->producttranslates['model_name']}}"
              src="{{ url('fix').'/200x200/'.'no-picture_800.png' }}">
       @endif 
       </div>
  @endif
          <div class="img-bottom newproducts">
           @if(isset($one_highlightproduct->products['pc1_slug'])&&isset($one_highlightproduct->products['pc2_slug'])&&isset($one_highlightproduct->products['pc3_slug'])&&isset($one_highlightproduct->products['pc4_slug']))
           <a href="{{url(App::getLocale()).'/'.transRoute('product').'/'.str_slug($one_highlightproduct->products['pc1_slug']).'/'.str_slug($one_highlightproduct->products['pc2_slug']).'/'.str_slug($one_highlightproduct->products['pc3_slug']).'/'.str_slug($one_highlightproduct->products['pc4_slug']).'/'.str_slug($one_highlightproduct->producttranslates['model_name']).'/'.str_slug($one_highlightproduct->products_id)}}">
            @endif <h2>{{$one_highlightproduct->producttranslates['model_name']}} <br></h2></a></div>
            <div class="img-bottom newproductstitle">
             @if(isset($one_highlightproduct->products['pc1_slug'])&&isset($one_highlightproduct->products['pc2_slug'])&&isset($one_highlightproduct->products['pc3_slug'])&&isset($one_highlightproduct->products['pc4_slug']))<a href="{{url(App::getLocale()).'/'.transRoute('product').'/'.str_slug($one_highlightproduct->products['pc1_slug']).'/'.str_slug($one_highlightproduct->products['pc2_slug']).'/'.str_slug($one_highlightproduct->products['pc3_slug']).'/'.str_slug($one_highlightproduct->products['pc4_slug']).'/'.str_slug($one_highlightproduct->producttranslates['model_name']).'/'.str_slug($one_highlightproduct->products_id)}}">
             @endif<p>{{$one_highlightproduct->producttranslates['product_description']}}</p>

         </a></div></li>
        @endforeach 
          
             
              

                  </ul>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div></div><!-- End newproduct-discover-contents -->
                </div><!-- End container -->
              </section><!-- End section newproducts -->

@endif 

          <!-- section at-your -->
          <section class="at-your">
            <div class="inside-box">
              <h2> {{ trans('general.at_your_service') }}</h2><hr>
            </div>
            <div class="container">
              <div class="discover-contents">
                <ul class="row">

                   <li class="col-md-4 col-xs-12"><a href="#"> <div class="homepagebottomimage"><img alt="Eltesan" title="{{ trans('general.dealerlocator') }}" src="{{ url('fix').'/nullx200/'.'dealer1.jpg' }}"  ></div><div class="img-bottom  your-service"><h3>{{ trans('general.dealerlocator') }}
                    <div class="box_tri"></div></div></a></li>
                    <li class="col-md-4 col-xs-12"> <a href="#"><div class="homepagebottomimage"><img alt="Eltesan" title="{{ trans('general.service') }}" 
                    src="{{ url('fix').'/nullx200/'.'service.jpg' }}"  ></div><div class="img-bottom your-service"><h3>{{ trans('general.service') }}</h3>
                      <div class="box_tri"></div></div></a></li>
                      <li class="col-md-4 col-xs-12"> <a href="{{url('/'.transRoute('contactus'))}}"><div class="homepagebottomimage"><img alt="Eltesan" title="{{ trans('general.contact') }}" 
                      src="{{ url('fix').'/nullx200/'.'contact.jpg' }}"  ></div><div class="img-bottom your-service"><h3>{{ trans('general.contact') }}</h3>
                        <div class="box_tri"></div></div></a></li>

                      </ul></div><!-- End at-your discover-contents -->
                    </div><!-- End container -->
                  </section><!-- End section at-your -->
                </div><!-- End container-fluid -->

                <!-- section footer -->
         
@endsection
