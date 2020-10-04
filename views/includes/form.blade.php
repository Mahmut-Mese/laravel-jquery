<div class=" form_iframe" id="my_input">
 

<img alt="Eltesan"  class="multiply" onclick="mailclose()" src="
{{ url('fix').'/nullx16/'.'cancel.png' }} ">
 <div class="clearfix"></div>
 <h2 class="form_title">
{{ trans('general.send_your_friends') }}</h2>
 
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

       <form class="form-horizontal" method="POST" action="{{ route('product.sharing') }}">
                        {{ csrf_field() }}
   @foreach($product->productimages as $proimage)
          @endforeach
         <input type="hidden" name="product_url" value="{{url()->current()}}">
         <input type="hidden" name="product_name" value="{{$product->model_name}}">
         <input type="hidden" name="product_desc" value="{{$product->product_description}}">
         <input type="hidden" name="product_img" value="{{ url('photo') .'/200xnull/productimages/'.$proimage['image']}}">
         <input type="hidden" name="product_short" value="{{$product->short_description}}">
          <input type="hidden" name="product_price" value="{{$product->products->price}}">
           
          
         
         <fieldset>
         <div class="form-group">
                     
<label class="  control-label">{{ trans('general.write_addresses') }}</label>
                            <div class=" ">
                            <input  placeholder="write here mail address" name="product_send_emails" id="recipient_email" class="form-control">

                            
                            </div>
                        </div>
                          <div class="form-group">
                     
                  <label class="  control-label">{{ trans('general.write_message') }}</label>
                             
                            <textarea placeholder="write here you message" name="product_send_message" id="recipient_email" class="form-control"> </textarea>

                            
                           
                        </div>

                        <div class="form-group">
                             
  
                  <img alt=" {{str_limit($product->product_description, 60)}}" title="{{$product->model_name}}" 
                  src="{{ url('photo') .'/100xnull/productimages/'.$proimage['image']}}"  />
     <strong><h4 >{{$product->model_name}}</h4></strong> 
      <p  >{{str_limit($product->product_description, 100)}}</p>
                 
               
            
            
               </div>

           <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
              
                <button type="submit" class="btn form_send "> {{ trans('general.share') }}</button>
              </div>
            </div>
          </div>
          </fieldset>
          </form>
          </div>