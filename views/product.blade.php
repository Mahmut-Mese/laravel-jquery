@extends('layouts.master')
@if(isset($product))
@section('page_title', str_limit($product->model_name, 160) )

@section('head_extra')

<link rel="stylesheet" href="{{ url('resources/assets') }}/css/sharetastic.css"> 
<link rel="stylesheet" href="{{ url('resources/assets') }}/css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{{ url('resources/assets') }}/css/swiper.min.css">
<link rel="stylesheet" href="{{ url('resources/assets') }}/css/swiper.css">
  <link rel="stylesheet" href="{{ url('resources/assets') }}/css/lity.css">
          @endsection

@section('meta-description', str_limit($product->meta_description, 160) )

@section('meta-keywords', str_limit($product->meta_keywords, 160) )
@endif
@section('javascript_extra')
<script src="{{ url('resources/assets') }}/js/swiper.min.js"></script>
 <script src="{{ url('resources/assets') }}/js/lity.js"></script>
  <script src="{{ url('resources/assets') }}/js/form.js"></script>
 

 <script>
       /* show lightbox when clicking a thumbnail */
    $('a.thumb').click(function(event){
     // event.preventDefault();
      var content = $('.modal-body');
      content.empty();
        var title = $(this).attr("title");
        $('.modal-title').html(title);        
        content.html($(this).html());
        $(".modal-profile").modal({show:true});
       
  
$('.modal-profile video').trigger('play');


    });
 </script>
 <script >
 

 </script>
 <script> $(function() {
  $(".modal").click(function(e) {
    if (e.target.id == "modal_body" || $(e.target).parents("#modal_body").length) {

    $('.modal-profile video').trigger( $('.modal-profile video').prop('paused') ? 'play' : 'pause');
    } else {
     $('.modal-profile video').trigger('pause');
    }
  });
})</script>

 
 
 @if($product->products->allow_order=='Yes')
<script >
 
    $('.add').on('click', function() {
  
 // event.preventDefault();
   
  var id  = $('.hidden').val();
  var quantity  = 1;
 
  $.get('{{url("/")}}/add-to-cart/' +id +'/' +quantity, function(data) {

}).done(function(data) {
    
  $('#items-count').text(Object.keys(data.data).length);
  })
 
 

 });
</script>
@endif
<script >
  $('.maximize').on('click', function() {
 

 
  setTimeout(function(){ 
    $(window).resize();
 
}, 100);
 })
 
</script>
 
 

<meta property="og:title" content=" {{str_limit($product->model_name, 160)}}" />
<meta property="og:description" content="{{str_limit($product->meta_description, 160)}}" />
<meta property="og:url" content="{{url()->current()}} " />
<meta property="og:image" content="{{ url('photo') .'/200xnull/productimages/'.$product->productimages['0']->image}}" />

     
   
<script src="{{ url('resources/assets') }}/js/sharetastic.js"></script>
<script> $('.sharetastic').sharetastic(); </script>
<script src="{{ url('resources/assets') }}/js/swiperfile.js"></script>
   @if($product->productaccessories->count() )
<script >

var leng_ac = accessories_swiper.slides.length  ;

if (leng_ac>3) {  

  if (leng_ac>6) {  
 for (var y = 7; y <= leng_ac; y++) {
  accessories_swiper.removeSlide([y,y+1]); 
   
 } }
  var accessories_swiper = new Swiper('.accessories  .swiper-container', {
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
    var leng = relatedproducts_swiper.slides.length  ;
if (leng>3) {  
 
  if (leng>6) {  
 for (var i = 7; i <= leng; i++) {
  relatedproducts_swiper.removeSlide([i,i+1]); 
   
 } }
  var relatedproducts_swiper = new Swiper('.relatedproducts .swiper-container', {
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
</script>
@endif
<script  >

 
function addcount( ) {
 @if(isset(Auth::user()->id))
   var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 4000);
    @else 
  var x = document.getElementById("snackbar2")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 4000);
      setTimeout(function(){ window.location.href= ' {{url("/")}}/signin' ; }, 2000);

 @endif
  
}
     function mailopen() {
      @if(isset(Auth::user()->id))
 $("#my_input").show();
 $('#recipient_email').val('');
document.getElementById("recipient_email").multiple = true;
@else
 window.location.href= ' {{url("/")}}/signin' ;
 @endif


}
function gobasket( ) {
   window.location.href= ' {{url("/")}}/cart' ;
}
</script>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ url('resources/assets') }}/js/libs/jquery-1.7.min.js">\x3C/script>')</script>
      <script>
  /*  $(function(){
      SyntaxHighlighter.all();
    });*/
    $(window).load(function(){
      $('.thumb #carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 132,
        itemMargin: 5,
        asNavFor: '#slider'
      });

      $('.product-picture #slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
       
             start: function(slider){
     /*     $('body').removeClass('loading');*/
       $(window).resize();
        },
        sync: "#carousel",
        after: function(slider){
     /*     $('body').removeClass('loading');*/
       $(window).resize();
        }
      });
    });
  </script>

 

 
 
  <script defer src="{{ url('resources/assets') }}/js/jquery.flexslider.js"></script>
  
 
@endsection

 
 

 
@section('content')
<div class="page-detail">
<div class="container">
 
 
    <ul class="page-title">
    <li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span>
    <li><a href="{{url(App::getLocale().'/'.transRoute('categories'))}}">{{ trans('general.products') }}</a></li><span>/</span>
     @foreach($path as $key => $value[]) 
     @endforeach
<li><a href="{{url(App::getLocale()).'/'.transRoute('products').'/'.str_slug($value[0]->slug_title)}}"> <?php
$title =  $value[0]->title; 
echo strtolower(" $title "); ?> </a></li><span>/</span>
<li><a href="{{url(App::getLocale()).'/'.transRoute('products').'/'.str_slug($value[0]->slug_title).'/'.str_slug($value[1]->slug_title)}}"> <?php
$title =  $value[1]->title; 
echo strtolower(" $title "); ?> </a></li><span>/</span>
<li><a href="{{url(App::getLocale()).'/'.transRoute('products').'/'.str_slug($value[0]->slug_title).'/'.str_slug($value[1]->slug_title).'/'.str_slug($value[2]->slug_title)}}"> <?php
$title =  $value[2]->title; 
echo strtolower(" $title "); ?> </a></li><span>/</span>
<li><a  > <?php
$title =  $value[3]->title; 
echo strtolower(" $title "); ?> </a></li><span>/</span>
<li><a  > <?php
$title =  $product->model_name; 
echo strtolower(" $title "); ?> </a></li> 

 
  
  
    
    
       </ul>
 
 
<div class="clearfix"></div>


</div>
<hr>


<div class="container">
	<div class="row">
    <div class="product-explanation none mobilshow ">
      <div class="title">
 <h2>{{$product->model_name}}</h2></div></div>
  <div class="col-md-6 product-picture">
   <a class="maximize" href="#slider" data-lity><img alt="Eltesan" title="Eltesan" src="
   {{ url('fix').'/24x24/'.'maximize.png' }}
   " /></a>
    <div id="slider" class="flexslider" >
    
          <ul  class="slides">
            @if(isset($product->productimages))
           @foreach($product->productimages as $proimage)
           <li>
      @if(!empty($proimage['image']))
                  <img alt="{{str_limit($product->product_description, 160)}}" title="{{$product->model_name}}" 
                  src="{{ url('photo') .'/800xnull/productimages/'.$proimage['image']}}"     onerror="this.src='{{ url('fix').'/800xnull/'.'no-picture_800.png' }}'" >
       @else
              <img   alt="{{str_limit($product->product_description, 160)}}" title="{{$product->model_name}}"
              src="{{ url('fix').'/800xnull/'.'no-picture_800.png' }}">
       @endif 
               
                </li>
             @endforeach
           
          </ul>
          
        </div>
         <section class=" thumb slider">
       
        <div id="carousel" class="flexslider">
          <ul class="slides">
            
             @foreach($product->productimages as $proimage)
           <li>
      @if(!empty($proimage['image']))
                   <img alt="{{str_limit($product->product_description, 160)}}" title="{{$product->model_name}}" 
                  src="{{ url('photo') .'/120xnull/productimages/'.$proimage['image']}}"      onerror="this.src='{{ url('fix').'/120xnull/'.'no-picture_800.png' }}'" >
       @else
             
              <img   alt="{{str_limit($product->product_description, 160)}}" title="{{$product->model_name}}"
              src="{{ url('fix').'/120xnull/'.'no-picture_800.png' }}">
       @endif 
               
               
                </li>
             @endforeach
               
          @endif
          </ul>
        </div>
      </section>
<!--    <img alt="Eltesan" src="{{ url('resources/assets') }}/images/product9.jpg" width=600  ></a> -->
   </div><!-- end col-md-6 -->

		<div class="col-md-6">
		<div class="product-explanation">
    
		
 



	<div class="title">@if(isset($product))
  <h2 class="mobilnone">{{$product->model_name}}</h2>
         <p><b>{{$product->product_description}}</b></p>
         <ul><li><p>{{$product->short_description}} 
     </p></li></ul>
     <div class="row keyfeatures">
     <input type="hidden" name="id"  class="hidden" value="{{$product->products_id}}">
       <div class="new">@if(!empty($product->key_feature1_text))
   
       <div class="features_key col-md-3"><h3 class="news-box">{{$product->key_feature1_text}}</h3><div class="clearfix"></div><h4>{{$product->key_feature1_title}}<h4></div>@endif
        @if(!empty($product->key_feature2_text))
        <div class="features_key col-md-3"><h3 class="news-box">{{$product->key_feature2_text}}</h3><div class="clearfix"></div><h4>{{$product->key_feature2_title}}</h4></div>@endif
        @if(!empty($product->key_feature3_title))
         <div id="last_features_key col-md-3" class="features_key"><h3 class="news-box">{{$product->key_feature3_text}}</h3> <div class="clearfix"></div><h4>{{$product->key_feature3_title}}</h4></div>@endif</div>
     </div>
       
       
         <div class="more-detail"><a href="#nav-pills" >{{ trans('general.more_details') }}</a></div>
         <hr>
         <div class="buttons">
         <div>
          <div><div class="find-a-dialer"><span >{{ trans('general.ref_no') }}{{$product->products->sku}} </span></div></div>
          <div class="money"><label class="text">
          @if(!empty($product->products->price))
          $&nbsp; {{$product->products->price}}<br>
          
          <span class="vat">({{ trans('general.vat_excluded') }} )</span>@endif
          </label></div>
         <div><div class="add-to-wish"><a href="javascript:void(0)" onclick="addcount()"><span class="text"><button class="btn add" >{{ trans('general.add_basket') }}</button></span></a></div></div>
        
         </div></div>
         <div class="feedback">
             @endif
            <ul><li></li><li></li></ul>
            <hr>
      
            <ul  ><li> {{ trans('general.need_help') }} <span><a href="{{url(App::getLocale()).'/'.transRoute('contactus')}}"  target="_blank">{{ trans('general.contact_us') }}</a></span></li><li ><div class="socialcontent"><div class="sharetastic"></div></div><a class="social-icon " onclick="printFunction()" ><i  class="fa fa-print"></a></i>&nbsp;<a class="social-icon  fa fa-envelope"     alt="Share with your friends" onclick="mailopen()"></a>&nbsp;</li></ul>
           
               <hr></div>
</div><!-- End title -->

  </div><!-- End product-explanation -->
 


 
 
   </div><!-- end col-md-6 -->
 
	</div><!-- End row -->
</div><!-- End conatiner categori -->
<div class="features_tabs">
<div class="container tabs  features_tabs">
<div class="col-md-12">

  <ul class="nav nav-pills" id="nav-pills">
  @if($product->galleryfeatures->count() )
    
    <li class="active"><a data-toggle="pill" href="#menu3">{{ trans('general.features') }}</a></li>
      @endif
      @if($product->producttechnicalfeatures->count() )
 
      <li><a data-toggle="pill" href="#home">{{ trans('general.tech_features') }}</a></li>
      @endif
      @if($manuals->count() )
        
    <li><a data-toggle="pill" href="#menu1">{{ trans('general.manuals') }}</a></li>
  @endif
   @if($productgalleryimages->count() || $productgalleryvideos->count()  )
    
    <li><a data-toggle="pill" href="#menu4" >{{ trans('general.media') }}</a></li>
@endif
  
  </ul>

  
  <div class="tab-content">
     @if($product->galleryfeatures->count() )
    <div id="menu3" class="tab-pane fade features in active ">
    <div class="row">
     
    @foreach($product->galleryfeatures as $feature)
      <div class="col-md-4 col-sm-4 feature">
<div class="featureimage">
            @if(!empty($feature->image))
                      <img alt="{!!str_limit($feature->description, 160)!!}" title="{{$feature->title}}" src="
                      {{ url('photo') .'/nullx350/galleryfeatures/'.$feature->image}}
                      "     onerror="this.src='{{ url('fix').'/nullx350/'.'no-picture_800.png' }}'" >
       @else
              <img    alt="{!!str_limit($feature->description, 160)!!}" title="{{$feature->title}}" 
              src="{{ url('fix').'/nullx350/'.'no-picture_800.png' }}">
       @endif 
       </div>
      <h4><b>{{$feature->title}}</b></h4><p>{{$feature->description}}</p></div>@endforeach
 
    </div>
    
         
    </div>
        @endif
        @if($product->producttechnicalfeatures->count() )
    <div id="home" class="tab-pane fade">
     
     @foreach($product->producttechnicalfeatures as $techfeature)
         <ul><li>{{$techfeature->title}}</li><li>{{$techfeature->value}}</li></ul>
  @endforeach
    </div>
    @endif
    @if($manuals->count() )
    <div id="menu1" class="tab-pane fade">
    
     @foreach($manuals  as $promanual)
      <ul class="media"> <li><a href="
      {{ url(App::getLocale()) . '/public/uploads/manuals/'.$promanual->productmanualtranslates[0]->file}}"><img alt="{!!str_limit($promanual->productmanualtranslates[0]->short_description, 160)!!}" title="{!!str_limit($promanual->productmanualtranslates[0]->short_description, 80)!!}" src="
      {{ url('fix').'/60xnull/'.'manuals.jpg' }}"  /></a></li>
     <li> <p>
     @foreach($promanual->manualcategories  as $promanualcat)
     <span>{{$promanualcat->title }}&nbsp;&nbsp;</span>
     @endforeach </p>
     <p><a href="
      {{ url('/public/uploads/manuals').'/'.$promanual->productmanualtranslates[0]->file}}">{{ trans('general.download') }}</a></p></li> 
  </ul> @endforeach
   
            <div class="clearfix"></div> </div>
            @endif
          @if($productgalleryimages->count() || $productgalleryvideos->count()  )
     <div id="menu4" class="tab-pane fade features ">
    <div class="row">
     
      @foreach($productgalleryimages as $proimage)
      <div class="col-md-3 col-sm-6 panel_detail">
      <div class="productgalleryimages">
      @if(!empty($proimage->image))
                        <img alt="{!!str_limit($proimage->description, 160)!!}" title="{{$proimage->title}}" src="
                        {{ url('photo') .'/nullx200/galleryimages/'.$proimage->image}}
                       "    onerror="this.src='{{ url('fix').'/nullx200/'.'no-picture_550.png' }}'" >
       @else
              <img   alt="{!!str_limit($proimage->description, 160)!!}" title="{{$proimage->title}}" 
              src="{{ url('fix').'/nullx200/'.'no-picture_550.png' }}">
       @endif 
       </div>
    <h4><b>{{$proimage->title}}</b></h4><p>{{$proimage->description}}</p></div>
     @endforeach

      @foreach($productgalleryvideos as $provideo)
      <!-- <div class="col-md-3 col-sm-6 panel_detail">
<video controls alt="Eltesan" title="{{$provideo->title}}" >
 
  <source src="
  {{ url('/') . '/public/uploads/galleryvideos/'.  $provideo->video}}" >


 
</video>

     <b>{{$provideo->title}}</b></h4></div> -->



     <div class="col-md-3 col-sm-6 panel_detail profile">
                <div class="panel panel-default video">
                  <div class="panel-thumbnail productgalleryimages">
                    <a href="#" title="{{$provideo->title}}" class="thumb">
                              <video controls   data-toggle="modal" data-target=".modal-profile-lg" alt=" " title="{{$provideo->title}}" >
 
  <source src="
  {{ url('/') . '/public/uploads/galleryvideos/'.$provideo->video}}" height="257" >
 

 
</video>
                    </a>
                  </div>
                  <div class="panel-body">
             <div class="video_explanation"><h4><b>{{$provideo->title}}</b></h4> <p class="date">{{$provideo->updated_at}}</p></div>
                  </div>
                </div>
            </div>

     @endforeach
     
    </div>
  
     <div class="modal fade modal-profile" tabindex="-1" role="dialog" aria-labelledby="modalProfile" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal">×</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body" id="modal_body">
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    
          <a href="#" class="load" id="more"><button class="btn">{{ trans('general.load_more') }}</button> </a>
<a href="#" class="load" id="less"><button class="btn">{{ trans('general.load_less') }}</button> </a>
    </div>
      @endif
   
  </div>

</div><!-- end col-md-8 -->

</div><!-- end container -->
</div><!-- end container-fluid -->
 <!-- section newproducts -->
    
   @if($product->productaccessories->count() )
  <section class="accessories ">
 <div class="newproducts">
  <div class="newproduct-box">
    <h2>{{ trans('general.accessories') }}</h2>
  </div><!-- End newproduct-box -->
  <div class="container">
    <div class="discover-contents swiper-container">
      <ul class="row swiper-wrapper">
    
       @foreach($product->productaccessories as $proacces)
         
  
<li class="col-md-3 col-xs-12 col-sm-6 swiper-slide " >
<div class="accesoryimage">
      @if(!empty($proacces->productimages[0]->image))
                      <img alt="{!!str_limit($proacces->product_description, 160)!!}" title="{{$proacces->model_name}}"  src="
                      {{ url('photo') .'/nullx257/productimages/'.$proacces->productimages[0]->image}}
                     "   onerror="this.src='{{ url('fix').'/nullx257/'.'no-picture_800.png' }}'" >
       @else
              <img   alt="{!!str_limit($proacces->product_description, 160)!!}" title="{{$proacces->model_name}}"  
              src="{{ url('fix').'/nullx257/'.'no-picture_800.png' }}">
       @endif 
       </div>
        <div class="img-bottom newproducts"><a href="{{url(App::getLocale()).'/'.transRoute('product').'/'.str_slug($proacces->products['pc1_slug']).'/'.str_slug($proacces->products['pc2_slug']).'/'.str_slug($proacces->products['pc3_slug']).'/'.str_slug($proacces->products['pc4_slug']).'/'.str_slug($proacces->model_name).'/'.str_slug($proacces->products_id)}}">{{$proacces->model_name}}<br>
</a></div>
    <div class="img-bottom newproductstitle"><p>{{$proacces->product_description}} </p></div></li>


 
         @endforeach
      
              </ul>
                 <div class="swiper-button-next"></div>
       <div class="swiper-button-prev"></div></div><!-- End newproduct-discover-contents -->
            </div><!-- End container -->
          </div><!-- End section newproducts -->
          </section>
             @endif
           
             @if($productbrothers->count() )
 <section class="relatedproducts">
 <div class="newproducts">
  <div class="newproduct-box">
    <h2>{{ trans('general.related_products') }}</h2>
  </div><!-- End newproduct-box -->
  <div class="container">
    <div class="discover-contents swiper-container">
      <ul class="row swiper-wrapper">
      
            @foreach($productbrothers as $prorelated)
            @if(isset($prorelated))
<li class="col-md-3 col-xs-12 col-sm-6 swiper-slide " >
<div class="highlightimage">
      @if(!empty($prorelated->productimages[0]->image))
                       <img alt="{!!str_limit($prorelated->product_description, 160)!!}" title="{{$prorelated->model_name}}"  src="

               {{ url('photo') . '/nullx257/productimages/'.$prorelated->productimages[0]->image  }}
              "   onerror="this.src='{{ url('fix').'/nullx257/'.'no-picture_800.png' }}'" >
       @else
              <img   alt="{!!str_limit($prorelated->product_description, 160)!!}" title="{{$prorelated->model_name}}"   
              src="{{ url('fix').'/nullx257/'.'no-picture_800.png' }}">
       @endif 
       </div>
<div class="img-bottom newproducts"><a href="{{url(App::getLocale()).'/'.transRoute('product').'/'.str_slug($value[0]->slug_title).'/'.str_slug($value[1]->slug_title).'/'.str_slug($value[2]->slug_title).'/'.str_slug($value[3]->slug_title).'/'.str_slug($prorelated->model_name).'/'.str_slug($prorelated->products_id)}}">{{$prorelated->model_name}} <br></a></div>
            <div class="img-bottom newproductstitle"><p>{{$prorelated->product_description}}</p></div></li>
          @endif
          @endforeach
       
              </ul>
                 <div class="swiper-button-next"></div>
       <div class="swiper-button-prev"></div></div><!-- End newproduct-discover-contents -->
            </div><!-- End container -->
          </div><!-- End section newproducts -->
          </section>
   @endif
<!-- section footer -->
 

@include('includes.form')
 
        </div><!-- End pagedetail -->


<div id="snackbar">
<div  class="add-to-wish gobasket">{{ trans('general.product_added') }} <br>
<button class="btn" onclick="gobasket()">{{ trans('general.go_basket') }} </button> </div></div>
<div id="snackbar2">
<div  class="add-to-wish gobasket">{{ trans('general.pleaselogin') }} <br>
  </div></div>

@endsection
 