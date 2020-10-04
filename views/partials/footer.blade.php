 
   <section class="footer">

                  <div class="footer-top ">
                    <div class="container">
                    <div class="row">
                    


          @if(isset($menuFooter[0]  ))
           @if(isset($menuFooter[0]->menuplugins  ))
         @foreach($menuFooter[0]->menuplugins as $footer) 
         <div class="col-md-4 col-xs-4 col-sm-4"><a href="{{url(App::getLocale().'/'.$footer->link)}}"><h6>{{$footer->title }}</h6></a>
        
        </div>
          @endforeach
          @endif
 @endif
                


               

 <!-- End CONTACT-->
                 </div><!-- end row-->
                   <div class="row">
                   <div class="col-md-4 col-sm-4 "></div>
                    <div class="col-md-4 col-xs-6 col-sm-4 social">
                       
                        <ul  > <li ><div class=" socialicons">
                          <span> <p> Eltesan Mobil</p>
                         @if(!empty($contactUs->facebook))
                          
                         <a href="{{$contactUs->facebook}}"><i class="  fa-facebook fa "></i></a>
                         @endif
                         @if(!empty($contactUs->twitter))
                       
                         <a href="{{$contactUs->twitter}}"><i class=" fa-twitter  fa"></i></a>@endif
                         @if(!empty($contactUs->linkedin))
                         <a href="{{$contactUs->linkedin}}"><i class=" fa-linkedin fa "></i></a>@endif
                         @if(!empty($contactUs->instagram))
                        
                         <a href="{{$contactUs->instagram}}"><i class=" fa-instagram fa "></i></a>@endif  
                         </span>
                        <span class="navber"></span>
                               <span><p> Hymer</p>
                         @if(!empty($contactUs->facebook2))
                         <a href="{{$contactUs->facebook2}}"><i class="  fa-facebook fa "></i></a>
                         @endif
                        
                         @if(!empty($contactUs->instagram2))
                         <a href="{{$contactUs->instagram2}}"><i class=" fa-instagram fa "></i></a>@endif
                       </span></div>  </li></ul>
                    </div><!-- End SEARCH FOR PRODUCTS -->

                   </div>
                   <br>
                   <div class="row">
                     <div class="col-md-12">
                       
                    
                      <div class="adresphone">
                   @if(isset($contactUs->address))
                      <span>   {!!$contactUs->address!!}  </span> @endif 
                   
                      @if(isset($contactUs->phone_nombers))
                     <span class="firstype">t</span> <span> {!!$contactUs->phone_nombers!!}</span> @endif 
                     <br clear="xxx"> 
                     @if(isset($contactUs->fax_nomber))
                      <span class="firstype">f </span> <span>  {!!$contactUs->fax_nomber!!}</span>  @endif 
                      @if(isset($contactUs->fax_nomber))
                     <span> </span> <span> {!!$contactUs->email!!} </span>  @endif 
                   
                   </div>
                     </div>
                   </div>
                    <br>
                    <div class="row">
                   <div class="col-md-4"></div>
                    <div class="col-md-4 col-xs-6 col-sm-4  "><a href="{{url(App::getLocale().'/')}}">
               <img alt="Eltesan" src="{{ url('photo') . '/177xnull/settings/'.  $setting->settings->logo_footer }} " 
                width="177" ></a>
                      
                    </div><!-- End SEARCH FOR PRODUCTS -->

                   </div>
               <br>
                

               </div><!-- end container-->
                 
                     
                       
                    
                      

<div class="col-md-12">
@if(isset($setting->copy_right))
                <span class=" copyright "> {!!$setting->copy_right!!}  </span>
@endif
<span class="animated  terms bounce">version: {{ session('version') }}</span></div>
                   
                   
             </div><!-- End footer top-->


             
    

        </section><!-- End section footer -->
        {{-- 
         <section class="footer">

                  <div class="footer-top ">
                    <div class="container">
                    <div class="row">
                     <div class="col-md-3 col-xs-6 col-sm-3 social">
                       <h6> {{ trans('general.share') }}</h6>
                        <ul  > <li ><div class=" socialicons">
                         @if(!empty($contactUs->facebook))
                         <a href="{{$contactUs->facebook}}"><i class="  fa-facebook fa "></i></a>
                         @endif
                         @if(!empty($contactUs->twitterf))
                         <a href="{{$contactUs->twitterf}}"><i class=" fa-twitter  fa"></i></a>@endif
                         @if(!empty($contactUs->linkedin))
                         <a href="{{$contactUs->linkedin}}"><i class=" fa-linkedin fa "></i></a>@endif
                         @if(!empty($contactUs->instagram))
                         <a href="{{$contactUs->instagram}}"><i class=" fa-instagram fa "></i></a>@endif</div>  </li></ul>
                    </div><!-- End SEARCH FOR PRODUCTS -->


          @if(isset($menuFooter))
         @foreach($menuFooter as $footer) 
         <div class="col-md-3 col-xs-6 col-sm-3"><h6>{{$footer->title}}</h6>
        
        </div>
          @endforeach
 @endif
                


               


                   <div class="col-md-3 col-xs-6 col-sm-3 last">
                    <h6>{{ trans('general.contact') }}</h6>


                    
                   
                    
                    <ul>
                      <li>Dometic WAECO
                      <br>
                        International GmbH
@if(isset($contactUs->address))
                        {!!$contactUs->address!!}  @endif 
                      </li>
                    </ul>
                    <ul>
@if(isset($contactUs->phone_nombers))
                     <li><span>Phone</span> <span> {!!$contactUs->phone_nombers!!}</span>
                     <br>@endif 
                     @if(isset($contactUs->fax_nomber))
                     Fax {!!$contactUs->fax_nomber!!}<br> @endif 
                      @if(isset($contactUs->fax_nomber))
                     E-Mail: {!!$contactUs->email!!}</li>@endif 
                   </ul>
                 </div><!-- End CONTACT-->
                 </div><!-- end row-->
               </div><!-- end container-->
             </div><!-- End footer top-->


             <div class="footer-bottom ">

              <div class="container">
              <div class="row">
               <div class="col-md-3">
                <img alt="Eltesan" src="{{ url('photo') . '/177xnull/settings/'.  $setting->settings->logo_footer }} " 
                width="177" >
              </div>
            @if(isset($setting->footer_text))
              <div class="col-md-9">{!!$setting->footer_text!!}
          @endif 
              @if(isset($setting->copy_right))
                <div class="col-md-6 col-xs-12 copyright">{!!$setting->copy_right!!} </div> @endif <div  class="col-md-3 col-xs-12 terms">version 0.0.1</div>
              </div></div><!-- End row -->
            </div><!-- End container -->
          </div><!-- End footer-bottom -->
    

        </section><!-- End section footer --> --}}