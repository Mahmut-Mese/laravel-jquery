@extends('layouts.master')
@section('head_extra')

 
<link href="{{ url('resources/vendors') }}/adminlte/css/datapicker/datepicker3.css">

@endsection


@section('javascript_extra')
   <!-- Data picker -->
   <script src="{{ url('resources/vendors') }}/adminlte/js/datapicker/bootstrap-datepicker.js"></script>
 

<script>

    $('#datepicker .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        format: "{{ config('quickadmin.date_format_jquery') }}"
    });
  $(".birthday").keypress(function (e) {
   
    if (e.which != 8 && e.which != 0 && e.which !=46) {
      if (e.which < 48 || e.which > 57) {   return false;}
   
    }

    
  })
  $(".phone-format").keypress(function (e) {
   
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      return false;
    }
    var curchr = this.value.length;
    var curval = $(this).val();
    if (curchr == 3 && curval.indexOf("(") <= -1) {
      $(this).val("(" + curval + ")" + "-");
    } else if (curchr == 4 && curval.indexOf("(") > -1) {
      $(this).val(curval + ")-");
    } else if (curchr == 5 && curval.indexOf(")") > -1) {
      $(this).val(curval + "-");
    } else if (curchr == 9) {
      $(this).val(curval + "-");
      $(this).attr('maxlength', '14');
    }
  });
</script>
  <script  >
    
    /* var numbermobile = document.getElementById('mobile');

numbermobile.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)||( e.shiftKey )) {
        return false;
    }

}
   
 */

 
  </script>
@endsection
@section('content')
<div class="profile">

 <!-- section discover-our -->


<div class="container">
<ul class="page-title"><li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span><li>{{ trans('general.profile') }}</li></ul>
<div class="clearfix"></div>
</div>
<hr>

  

<div class="container">
    <div class="row ">
  
   
     <div class="col-md-2"></div>
    <div class="col-md-8 col-xs-12 form_iframe">
    <h2  class="form_title">
    {{ trans('general.information_of_member') }}</h2>
<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
     

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
            </div>
        @endif
    </div>
</div>

{!! Form::model($userprofiles, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('profileupdate',(is_null($userprofiles)? 0 :$userprofiles->id) 
))) !!}
 <fieldset>
 {{ csrf_field() }}
<div class="col-md-6  col-xs-12">
            <div class="form-group">
                <div class="col-sm-12">
                 {!! Form::label('fullname', trans('general.name_and_surname') , array('class'=>' control-label')) !!}
                  {!! Form::text('fullname', old('fullname'), array('class'=>'form-control')) !!}
                </div>
            </div>

           <div class="form-group">
           <div class="col-sm-12">
               {!! Form::label('email', trans('general.e-posta'), array('class'=>' control-label')) !!}
              {!! Form::text('email', old('email', $user->email), array('class'=>'form-control')) !!}
            </div>
          </div>

         <div class="form-group">
           <div class="col-sm-12">
               {!! Form::label('mobile', trans('general.mobil_phone'), array('class'=>' control-label')) !!}
           {!! Form::text('mobile', old('mobile'), array('class'=>'form-control phone-format')) !!}
            </div>
          </div> 

           <div class="form-group" id="datepicker">
           <div class="col-sm-12 ">{!! Form::label('birthday', trans('general.birthday'), array('class'=>'control-label')) !!}</div>
           <div class="col-sm-12 ">
           <div class="input-group date">
               
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!! Form::text('birthday', old('birthday'), ['class'=>'form-control birthday']) !!} 
        </div>
        </div>
          </div>         
     <div class="form-group">
          
            <div class="col-sm-4 col-xs-3 sex">
              {!! Form::label('sex', trans('general.sex'), array('class'=>'control-label')) !!}</div>
              <div class="col-sm-2 col-xs-1"></div>
            <div class="col-sm-6 col-xs-8">
          
   <span class="male">{{ Form::radio('sex', '1') }}{{trans('general.male')}}</span>
 <span>{{ Form::radio('sex', '0') }}{{trans('general.female')}}</span>
            </div>
          </div>

   
        
        
    </div>




        <div class="password_change">
  <!-- Trigger the modal with a button -->
  <a class="password" href="{{url('/').'/change-pass'}}">{{trans('general.change_password')}}</a>

  <!-- Modal -->
 </div>
        <div class="col-md-6 col-xs-12">

          <div class="form-group">
          <div class="col-sm-12">
            {!! Form::label('company', trans('general.firm'), array('class'=>'control-label')) !!}</div>
            <div class="col-sm-12">
             {!! Form::text('company', old('company'), array('class'=>'form-control')) !!}
            </div>
          </div>

           <div class="form-group">
           <div class="col-sm-12">
               {!! Form::label('address', trans('general.address'), array('class'=>'control-label')) !!}
            {!! Form::textarea('address', old('address'), array('class'=>'form-control adres')) !!}
            </div>
          </div>
        <!--     <div class="form-group">
           <div class="col-sm-12">
           {{--
               {!! Form::label('address',  trans('general.address'), array('class'=>'control-label')) !!}
            {!! Form::textarea('address', old('address'), array('class'=>'form-control')) !!}--}}
            </div>
          </div> -->

             <div class="form-group">
           <div class="col-sm-6 col-xs-12">
          
               {!! Form::label('city', trans('general.city'), array('class'=>'col-xs-6 col-sm-12 control-label')) !!}
 {!! Form::select('city', $cities, old('city'), ['class'=>'form-control col-xs-6 col-sm-12']) !!}

            </div>

            
          <div class="col-sm-6">
            {!! Form::label('zip_code',trans('general.zip_code'), array('class'=>' control-label')) !!}
            {!! Form::text('zip_code', old('zip_code'), array('class'=>'form-control')) !!}
            </div>
</div>
        <div class="form-group">
            <div class="col-sm-1 col-xs-1">
                 {!! Form::hidden('is_newsletter','') !!}
                 {!! Form::checkbox('is_newsletter', 1) !!}
 
            </div>
            <div class="newsletter_label col-xs-10 col-sm-10">
          {!! Form::label('is_newsletter', trans('general.newsletter_want'), array('class'=>'control-label')) !!}</div>
           
          </div>
            <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
              
               
                    {!! Form::submit(trans('general.send'), array('class' => 'form_send btn')) !!}
              </div>
            </div>
          </div>
    </div>

{!! Form::hidden('user_id', $user->id) !!}

</fieldset>
{!! Form::close() !!}
<br><br><br>
    </div><!-- /.col-lg-12 -->
    <div class="col-md-2"></div>



</div><!-- /.row -->
</div>



   
                </div><!-- End container-fluid -->
            



                <!-- section footer -->
@endsection