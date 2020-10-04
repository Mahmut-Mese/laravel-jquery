@extends('layouts.master')
@if(isset($contactus->contactustranslates[0]))
@section('page_title', str_limit($contactus->contactustranslates[0]->title, 160) )
@endif
@section('head_extra') @endsection

@section('javascript_extra') @endsection

@section('content') 

  @if(isset($contactus))

<div class="header_image">

   <div class="inner-contact-location-map">
            <div id="googleMap" ">

            <iframe style="width:100%;height:445px;"  
  
  
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCpa2TTEA1dF2p9kM1TC30dx1D4ps9JbN8
    &q={{$contactus->google_map}}" allowfullscreen>
</iframe>
          </div>
          </div>

   </div><!-- End header_image --> 
  <div class="contact-us">
          

 <!-- section discover-our -->

      <div class="container">
         <ul class="page-title"><li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span><li>{{ trans('general.contact_us') }}</li></ul>
         <hr>
         <div class="clearfix"></div>
      </div>

    <div class="aboutus">
     <div class="container">
       <div class="row">
         
         <div class="col-md-12 ">
            <h2>{{ $contactus->contactustranslates[0]->title }}</h2>
              <div class="icons">
                <ul>
                  <li class="col-md-3 col-sm-3 col-xs-12"> <div class="round round-lg"> <span class="glyphicon glyphicon-map-marker"></span> </div>
                                 {!!$contactus->address!!} 
                           </li> 
                          <li class="col-md-3 col-sm-3 col-xs-12"> <div class="round round-lg">
                             <span class="glyphicon glyphicon-phone-alt"></span> </div>
                          
                                {!!$contactus->phone_nombers!!}
                                <p> {{$contactus->fax_nomber}}&nbsp;(f) </p>
                           </li>
                              <li class="col-md-3 col-sm-3 col-xs-12"><div class="round round-lg">  <span class="glyphicon glyphicon-envelope"></span></div>
 
                              <p>{{$contactus->email}}</p>
                          
                           </li>
                             <li class="col-md-3 col-sm-3 col-xs-12"> <div class="round round-lg">
                             <span class="glyphicon  ">
                               <i class="fa  fa-share-alt"></i>
                             </span> <br></div>
                             <div class="clearfix"></div>
                             <ul class="social"  >      
                             @if(!empty($contactUs->facebook))<li ><a class="social-icon  fa fa-facebook"  href="{{$contactus->facebook}}" target="_blank" ></a>&nbsp;</li>@endif
                             @if(!empty($contactUs->twitterf))<li ><a class="social-icon  fa fa-twitter"  href="{{$contactus->twitterf}}" target="_blank" ></a>&nbsp;</li>@endif
                             @if(!empty($contactUs->linkedin))<li ><a class="social-icon  fa fa-linkedin"  href="{{$contactus->linkedin}}" target="_blank" ></a>&nbsp;</li>@endif
                             @if(!empty($contactUs->instagram))<li ><a class="social-icon  fa fa-instagram"  href="{{$contactus->instagram}}" target="_blank" ></a>&nbsp;</li>@endif</ul>
                           </li>
                         
                            
                </ul>
              </div> <!-- icons-->
        </div> <!-- col-md-8-->
       </div> <!-- row-->
       <div class="row">
            <div class="col-md-6 col-xs-12">
                              <h3>{{$contactus->contactustranslates[0]->headline}} </h3>
                              <p>{!!$contactus->contactustranslates[0]->description!!}</p>
            </div> <!-- col-md-5-->
            <div class="col-md-6 col-xs-12">
                    <div class="panel panel-default">
                          <div class="panel-body">                            
                                @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
          </div>
        @endif
        {!! Form::open(array('route' => 'contact.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}
                                   
{{ csrf_field() }}
                                  <div class="form-group">
                                    <div class="">
                               {!! Form::text('fullname', old('fullname'), array('class'=>'form-control', 'id'=>'name' ,'required' => 'required','autofocus' => 'autofocus','placeholder'=> trans('general.form_fullname'))) !!}

                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="">
                                
                                      {!! Form::email('email', old('email'), array('class'=>'form-control', 'id'=>'email' ,'required' => 'required','placeholder'=> trans('general.form_email'))) !!} 

                                   </div>
                                 </div>


  

                                   <div class="form-group">
                                     <div class="">
                                

{{ Form::select('category', [
   'department_1' =>  trans('general.sell') ,
   'department_2' =>  trans('general.support') ,
   'department_3' =>  trans('general.advice') ,
   'department_4' =>  trans('general.complaint') ,
   'department_5' =>  trans('general.other')  ], old('email'), ['class'=>'form-control', 'id'=>'department' ,'required' => 'required','placeholder'=> trans('general.form_category')]
) }}
                                    </div>
                          
                                  </div>
                               <div class="form-group">
                                    <div class="">
                                  
                                       {!! Form::text('subject', old('subject'), array('class'=>'form-control','id'=>'subject' ,'required' => 'required', 'placeholder'=> trans('general.form_subject'))) !!}
                                    </div>
                                  </div>
                                
                                 <div class="form-group">
                                  <div class="">

                                      {!! Form::textarea('body', old('body'), array('class'=>'form-control','id'=>'body' , 'rows'=>'5' ,'cols'=>'30' ,'placeholder'=> trans('general.form_message'))) !!}

                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-md-6 col-md-offset-6">
                             
                                      {!! Form::submit( trans('general.send') , array('class' => 'btn')) !!}
                                  </div>
                                </div>   
                             {!! Form::close() !!}


                          </div>    <!-- panel-body-->                            
                    </div> <!-- panel-->           
            </div> <!-- col-md-7-->
    
       </div> <!-- row-->
     </div> <!-- container-->
    </div><!-- aboutus-->
   </div>   <!-- End container-fluid -->



                <!-- Swiper -->



@endif
@endsection