 
@extends('layouts.master')

@section('page_title', '')

@section('head_extra')
<!-- head_extra -->
   <link rel="stylesheet" href="{{ url('resources/assets') }}/css/table_responsive.css">
@endsection

@section('javascript_extra')
<script src="{{ url('resources/assets') }}/js/basket.js"></script>
<script  >
 $('.count').on('change', function() {
  
 // event.preventDefault();
  var index = $( '.count').index( this );
  var id  = $('.hidden').eq(index).val();
  var quantity  = $('.count').eq(index).val();
     
 
  $.get('{{url("/")}}/add-to-cart/' +id +'/' +quantity, function(data) {
 
}); });
  $('.delete').on('click', function() {
  
 // event.preventDefault();
  var index = $( '.delete').index( this );
  var id  = $('.hidden').eq(index).val();
  var quantity  = 0;
   
 
  $.get('{{url("/")}}/add-to-cart/' +id +'/' +quantity, function(data) {
      var index = $( '.delete').index( this );
    var subprice  = $('.subprice').eq(index).text();
    var isubprice=parseInt(subprice);
    var result  = $('#total').text();
    var iresult=parseInt(result);
    iresult=iresult-isubprice;
    $('#total').text( iresult);
$('.one_item').eq(index).hide();
var itemscount  = $('#items-count').text();
var intemscount=parseInt(itemscount);
intemscount=intemscount-1;
$('#items-count').text(intemscount);
}).done(function(data) {
     //alert(Object.keys(data.data).length);
  //$('#items-count').text(Object.keys(data.data).length);
  })
  setTimeout(function(){ window.location.href= ' {{url("/")}}/cart' ; }, 1000);
 
});
</script>
@endsection
 

@section('header_extra')


@endsection

 
@section('content')

<div class="basket">

 <!-- section discover-our -->


<div class="container">
<ul class="page-title"><li><a href="{{url(App::getLocale().'/')}}">{{ trans('general.home') }}</a></li><span>/</span><li>{{ trans('general.basket') }}</li></ul>
<div class="clearfix"></div>
</div>
<hr>
   @if(isset($cart))


 




<div class="container">
  <div class="row">
   
    <div class="col-xs-12 col-md-12 form_iframe">
<h2 class="form_title">{{ trans('general.basket_detail') }}</h2>
   <table class="table table-bordered">
    <thead>
      <tr>
        <th>{{ trans('general.product') }}</th>
        <th>{{ trans('general.product_number') }}</th>
        <th>{{ trans('general.price') }}</th>
        <th>{{ trans('general.total_price') }}</th>
     
      </tr>
    </thead>
    <tbody>
    @php $x=1 ; @endphp
     @foreach($cart as $one_cart) 
      <tr class="one_item">
        <td class="product_name"><span class="first_span"><a href="#">
           @if(!empty( $one_cart->productimages->image))
               <img alt="{{str_limit($one_cart->producttranslates->short_description, 40)}}" title="{{$one_cart->producttranslates->model_name}}"  src="
               {{ url('photo') . '/150xnull/productimages/'.$one_cart->productimages->image}}" onerror="this.src='{{ url('fix').'/150xnull/'.'no-picture_550.png' }}'">
       @else
              <img    alt="{{str_limit($one_cart->producttranslates->short_description, 40)}}" title="{{$one_cart->producttranslates->model_name}}"   
              src="{{ url('fix').'/150xnull/'.'no-picture_550.png' }}"> 
       @endif 
        <input type="hidden" name="id"  class="hidden" value="{{$one_cart->products_id}}">
        </a></span><span><div class="product_text"><a href="{{url(App::getLocale()).'/'.transRoute('product', App::getLocale()).'/'.str_slug($one_cart->products['pc1_slug']).'/'.str_slug($one_cart->products['pc2_slug']).'/'.str_slug($one_cart->products['pc3_slug']).'/'.str_slug($one_cart->products['pc4_slug']).'/'.str_slug($one_cart->producttranslates['model_name']).'/'.str_slug($one_cart->producttranslates['products_id'])}}"><h5>{{$one_cart->producttranslates->model_name}}</h5></a>
        <p  class="explanation">{{$one_cart->producttranslates->short_description}} </p> 
        <a class="delete" href="javascript:void(0)">{{ trans('general.delete') }}</a></div></span></td>
     
        <td  class="small"><div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number minus " disabled="disabled" data-type="minus" data-field= "{{'quant['.$x.']'}}">
                  <i class="fa fa-minus"></i>
              </button>
          </span>
          <input type="text" name="{{'quant['.$x.']'}}" class="form-control count input-number" value="{{$one_cart->quantity}}" min="1" max="100" maxlength="2" >
          <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number plus" data-type="plus" data-field="{{'quant['.$x.']'}}">
                  <i class="fa fa-plus"></i>
              </button>
          </span>
      </div></td>
         <td class="small_td "><span class="price">{{$one_cart->products->price}} </span><span> $</span></td>
        <td  class="small_td "><span  class="subprice"> </span><span> $</span></td>
      </tr>
     @php $x=$x+1 ;
       @endphp
        @endforeach
     
         <tr class="last_row">
        <td></td>
        <td></td>
 
          <td class="total" ><span><b>{{ trans('general.total') }}:</b></span></td>
        <td class="total" ><span  id="total"><b> </b></span><span> $</span></td>
      </tr>

    </tbody>
  </table>
  
 {!! Form::open(array('action' => 'OrdersController@addToCart', 'id' => 'cart-order','method' => 'POST' )) !!}
                                   
{{ csrf_field() }}

 <div class="row offer">

      <div class="col-md-12">  
      <label>{{ trans('general.quote_description') }}</label><br> 
      {!! Form::textarea( 'note',old('note'))  !!}</div>
  </div>
  <div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3"><a href="order_status">
    {!! Form::submit(trans('general.get_a_quote') , array('class' => 'btn order_btn form_send')) !!}
     </a></div>
  </div>
 
  {!! Form::close() !!}
    </div>

  </div>
 
</div>

   
                </div><!-- End container-fluid -->
            
@endif


@endsection
 