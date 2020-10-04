@extends('layouts.master')

@section('head_extra')
<!-- head_extra -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.min.js"></script>
<script>
$(document).ready(function(){

     setTimeout(function(){ 
      hideover();
 
    
},  4000);
 
 
 
});
 
 function hideover() {
  
 var tr = $("table.dataTable.display tbody tr").length;
    for (var num = 1; num <= tr; num++) {
        /*$("tr").eq(num).hide();*/
        var label=$("tr:eq("+num+") td:nth-child(2) .label-default");
        label.popover();
        
        var span =$("tr:eq("+num+") td:nth-child(2) .label-default").length;
        
         var result='<span class="label label-default"> ';
         for (var num2 = 0; num2 <= span; num2++) {
            var num2=parseInt(num2);

            var diverce=num2 % 3;
            
            if (diverce===0) {
                var text ='<br><span class="label label-default"> '+ label.eq(num2).text(); 
            } else {
                var text ='<span class="label label-default"> '+ label.eq(num2).text(); 
            }
      
        
       
         var result=result + text +'</span> ';
         label.eq(3).attr('data-content', result);
         if (num2>3) {
             $("tr:eq("+num+") td:nth-child(2) .label-default").eq(num2).hide();
         }  
        

        
         }
         var dote='...';
         $("tr:eq("+num+") td:nth-child(2) .label-default").eq(3).text(dote);
  
    }

 
    }  
   
 
</script>
 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.3/css/rowReorder.dataTables.min.css">
    

 
 

@endsection

@section('javascript_extra')



 <script>

    $(document).ready(function() {
    $('#ajaxtable')
     .on( 'page.dt search.dt order.dt',   function () {    setTimeout(function(){ 
      hideover();
 
    
},  2000);} )
     .DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{{ route('manuals.ajax') }}',
        language: {
            url: "{{ trans('quickadmin::strings.datatable_url_language') }}"
        },
        columns: [
            {data: 'create_date', name: 'create_date'},
            {data: 'skus', name: 'skus'},
            {data: 'brand_description', name: 'brand_description'},
            {data: 'short_description', name: 'short_description'},
            {data: 'group_cats', name: 'group_cats'},
            {data: 'languages', name: 'languages'},
            {data: 'file', name: 'file'},
            {data: 'hidden_description', name: 'hidden_description', visible:false}
        ]
    } );
} );
 </script>
 <script>
    $('#datatable').dataTable( {
        "language": {
            "url": "{{ trans('quickadmin::strings.datatable_url_language') }}"
        }
    });

  
</script>
@endsection

@section('header_extra') @endsection

@section('content')
 
   <div class="header_image">

    <img alt="Eltesan" title="Eltesan" src="{{ url('fit').'/1920x350/fix/'.'slider-marine-Kopie1.jpg' }}">
      <div class="container"><div class="about_caption"><h1>{{ trans('general.manuals') }}</h1></div></div>

   </div><!-- End header_image --> 

<div class="">

 <!-- section discover-our -->

<div class="container">
<ul class="page-title"><li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span><li>{{ trans('general.manuals') }}</li></ul>
<div class="clearfix"></div>
</div>
<hr>
<div class="container">
<!-- <div class="row news_title">
<h2>NEWS</h2>
</div> -->
<div class="row table homepage">

   <table id="ajaxtable" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>{{ trans('general.date') }}</th>
                        
            <th>{{ trans('general.sku') }}</th>
            <th>{{ trans('general.brand_product_name') }}</th>
            <th>{{ trans('general.short_description') }}</th>
            <th>{{ trans('general.documentation_ategory') }}</th>
        
            <th>{{ trans('general.languages') }}</th>
            
            <th>{{ trans('general.download') }}</th>
                    </tr>
    </thead>
    <tbody>
    
        </tbody></table>

</div>

</div><!-- End container -->



 <!-- Swiper -->

   
                </div><!-- End container-fluid -->




  
@endsection