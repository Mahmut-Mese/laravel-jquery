
   <div class="header-top">
      <div class="countries-box">
     
        <div class="countries">

          <div class="">
            
            <ul class="country_select">
                    <li><span class="choose leng"  href="#">{{ trans('general.chooselang') }}</span></li>
               <li><a href="{{ url('/language/tr') }}"><img alt="Eltesan" src="
               {{ url('fix').'/20xnull/'.'tr.jpg' }}" height="14" ="">&nbsp;<span class="leng">Türkçe</span></a></li> |
               <li><a href="{{ url('/language/en') }}"><img alt="Eltesan" src="{{ url('fix').'/20xnull/'.'en.png' }} " 
                >&nbsp;<span class="leng">English</span></a></li>
               
           
             
             </ul>
         
             <ul class="login_basket">
             
               <li><img alt="Eltesan" src="
               {{ url('fix').'/nullx24/'.'avatar.png' }} "  > &nbsp; 
        @if(!empty($user))  
                @if(!empty($user->userprofiles->fullname)) 
                    <span class="dropdown">
                     <a class=" dropdown-toggle"  data-toggle="dropdown">{{$user->userprofiles->fullname}}
                    <span class="caret"></span></a>
                     <ul class="dropdown-menu row ">
                     <li><a href="{{url('/profile') }}"> {{ trans('general.myaccount') }}</a></li>
    

    
                      <li class="exit">
                        <a href="{{url(App::getLocale().'/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                          {{ trans('general.exit') }}
                                        </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                      </li>
     
                             </ul>
                          </span>
                         &nbsp;  &nbsp; 

                 @endif  

      @else
                 <span><a href="{{ url('/signin') }}">{{ trans('general.login') }}</a></span>
      @endif  
    </li>
               <li><a href="{{ url('/cart') }}"><img alt="Eltesan" src="
               {{ url('fix').'/nullx24/'.'basket.png' }} "
                > <span class="items-count" id="items-count">
                 @if(!empty($countCart)) 
                {{$countCart}}
                @else
                0
                @endif 
                 </span>&nbsp;&nbsp;&nbsp;{{ trans('general.basket') }}</a></li>
               
               
             </ul>
           
             <div class="clearfix"></div>
        
         </div>

       </div><!-- End countries -->
     </div><!-- End countries-box -->
   </div><!-- End header-top -->


   <div class="menus-box colors">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="{{url(App::getLocale().'/')}}">
            <img alt="Eltesan" src="{{ url('photo') . '/168xnull/settings/'.  $setting->settings->logo  }}" ></a>
            <li> <form class="first-search none mobilshow" >
    <input type="text" onclick="openNav()">
</form></li>
          </div><!-- End navbar-header -->
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
            <li class="dropdown brands">
  <a class="dropdown-toggle"  href="javascript:void(0)" >{{ trans('general.company') }}</a>
  <ul class=" row dropdown-menu none about">
    <li> 
     <ul>

     @if(isset($menuCompany))
         @foreach($menuCompany as $item)
           
               <li class="abouttitle"><a href="{{url(App::getLocale()).'/'.$item->link}}"><?php
echo strtolower(" $item->title ");
?></a></li>
            
          @endforeach
    @endif

  <!--     <li><a href="#">Dometic</a></li>
      <li><a href="#">waeco</a></li>
      <li><a href="#">Sealand</a></li> -->
     

    </ul>
  </li>

</ul>
</li>
              <li class="dropdown">
                <a class="dropdown-toggle" href="javascript:void(0)" >{{ trans('general.products') }}</a>
                <ul  class="container row dropdown-menu none dropdown_menu product">

     @if(isset($menuProducts))
         @foreach($menuProducts as $product)
           <li class="col-md-3 ">
                  <ul>
                    <li class="products" >
                      <a style="color:{{$product->color}};" href="{{url(App::getLocale().'/').'/'.transRoute('products').'/'.str_slug($product->productcategorytranslates[0]->title)}}">
                     <?php
                     $title= $product->productcategorytranslates[0]->title ;
echo strtolower("$title");
?></a>
                      
                    </li>

               @foreach($product->productcategorychild as $item) 

               <li><a href="{{url(App::getLocale().'/').'/'.transRoute('products').'/'.str_slug($product->productcategorytranslates[0]->title).'/'.str_slug($item->title)}}"><?php
echo strtolower(" $item->title ");
?> </a></li>
             @endforeach
              
                  </ul>
                </li>
            
          @endforeach
    @endif
               

       
   
                
              


              <!--second row of mega menu-->
             
            
             <div class="clearfix"></div>
          <div class="more-product"><a href="{{url(App::getLocale().'/').'/'.transRoute('categories')}}"> {{ trans('general.all_products') }}</a></div>
        </ul>
          </li>

        <li class="dropdown">
         <a class="dropdown-toggle" href="javascript:void(0)" >{{ trans('general.application') }}</a>
         <ul  class=" row dropdown-menu none dropdown_menu markets">
         @if(isset($menuMarket))
         @foreach($menuMarket as $oneMarket) 
          <li  class="col-md-3">
           <ul>
 @foreach($oneMarket->markettranslates as $item) 
             <li style="color:{{$oneMarket->color}};" class="markets products "><?php
echo strtolower(" $item->title ");
?></li>
             
       <li><a href="{{url(App::getLocale()).'/'.transRoute('market').'/'.$item->slug }}">{{ trans('general.homeandproduct') }}</a></li>
 <li><a href="{{url(App::getLocale()).'/'.transRoute('catalogs').'/'.$item->markets_id }}">{{ trans('general.catalogandbrosure') }}</a></li>
        @endforeach
               

          </ul>

        </li>
          @endforeach
 @endif
          <br>
         <div class="clearfix"></div>



    

   
 </ul>
</li>
<li class="dropdown  brands">
  <a class="dropdown-toggle" href="javascript:void(0)">{{ trans('general.brands') }}</a>
  <ul class=" row dropdown-menu none brand">
    <li> 
     <ul>
      @if(isset($menuBrands))
         @foreach($menuBrands as $brand) 
           <li class="brands"><a target="_blank" href="{{ $brand->link}} "><?php
echo strtolower(" $brand->title ");
?></a></li>
          @endforeach
       @endif
    

    </ul>
  </li>

</ul>
</li>
<li class="dropdown  brands">
  <a class="dropdown-toggle" href="javascript:void(0)" >{{ trans('general.caravan') }}</a>
  <ul class=" row dropdown-menu none">
    <li> 
     <ul>
          @if(isset($menuCaravan))
         @foreach($menuCaravan as $one_caravan)
           
               <li class="abouttitle"><a href="{{url(App::getLocale()).'/'.$one_caravan->link}} " ><?php
echo strtolower(" $one_caravan->title ");
?></a></li>
            
          @endforeach
    @endif

    

    </ul>
  </li>

</ul>
</li>
<li class="dropdown">
 <a class="dropdown-toggle" href="javascript:void(0)" >{{ trans('general.service_and_support') }}</a>
 <ul  class=" row dropdown-menu dropdown_menu service none">




  @if(isset($menuService))
        @foreach($menuService as $service) 
   <li  class="col-md-3">
    <ul>
      <li class="service">{{$service->title}}</li>
        @foreach($service->menuplugins as $item) 
       <li ><a href="{{url(App::getLocale()).'/'.$item->link}}  "><?php
echo strtolower(" $item->title ");
?></a></li>
        @endforeach
                   
    </ul>
  </li>
  @endforeach    @endif

  
   <div class="clearfix"></div>
   <br> 
 
</ul>
</li>
<li> <form class="first-search mobilnone" >
    <input type="text" onclick="openNav()">
</form></li>
  
</ul>

</div>
</div>
 
</nav>

</div><!-- End menus-box -->
<div class=" second-search" id="second_search">
<div id="search_container" class="container search_container">
<div class="search_text">{{ trans('general.search') }} </div>
    <input type="text" id="search_input" name="search_input" class="keyupsearchproduct" >

<img alt="Eltesan"  class="multiply" onclick="closeNav()" src="
{{ url('fix').'/nullx24/'.'multiply.png' }} ">

</div>
<div class="clearfix"></div>
<div class="search_list" id="search_list"  style="display:block !important">


<div class="searchblade"></div>
 <div class=" row notfound" style="display:none" > 
                <div class="col-md-2"></div><div class="col-xs-12 col-md-8  ">
                    <div class=" "><h1> {{ trans('general.couldntfind') }}</h1></div>
                    <h4> {{ trans('general.suggestions') }} : </h4>
<ul>
    <li>{{ trans('general.spellcorrectly') }}</li>
    <li>{{ trans('general.synonymsword') }}</li>
     
</ul>
                </div>
            </div>

<div class="see_more" style="display:none;"><a href="javascript:void(0)" onclick="see_more()">{{ trans('general.see_more_result') }}</a></div>
</div>
</div>