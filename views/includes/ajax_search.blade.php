<script  >
    function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
}
  setTimeout(function(){ 
  var num_search=$(".search_list .searchblade .search_list_text").length;
  if (num_search>7) {
      $( ".load" ).show();
     
      }
  else{
     
      $( ".load" ).hide(); }
     
}, 4000);

 var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
var keyword = getUrlParameter('keyword');
 $(".keyupsearchproduct").val(keyword);
  setTimeout(function(){ 
   
$( ".keyupsearchproduct" ).focus();
 /*   var slider1 = $('.product-picture #slider').data('flexslider');
    slider1.resize();*/
     
}, 1000);

  function see_more()  { 
 
  
        window.location.href= ' {{url("/")}}/{{App::getLocale()}}/{{ trans("general.search_ajx") }}?keyword='+ keyword
        
};
current_page=1;

    $('.load').click(function(){

 current_page= current_page+1;
  
        //event.preventDefault();
         
              
       $.get('{{url("/")}}/{{App::getLocale()}}/{{ trans("general.search_ajx") }}?keyword='+ keyword+'&page='+current_page, function(data) { 
                  
       var   i = "";
          var y=  $( ".loadmoreimg" ).html();
     
      
      if (data.search_product.current_page==data.search_product.last_page) {
      
       $( ".load" ).css("opacity", "0");
     }
     for (i in data.search_product.data) {
  
    
     
  
 y +='<div class="list_items container"><a href="'+'{{url(App::getLocale())}}'+'/{{ trans("general.product_ajx") }}/'+data.search_product.data[i].products['pc1_slug']+'/'+data.search_product.data[i].products['pc2_slug']+'/'+data.search_product.data[i].products['pc3_slug']+'/'+data.search_product.data[i].products['pc4_slug']+'/'+convertToSlug(data.search_product.data[i].model_name)+'/'+data.search_product.data[i].products_id+'" > '
 y +='<div class="searchimage"><img' 
 +' title='+'"' +data.search_product.data[i].model_name + '"' 
 +' alt='+'"' +data.search_product.data[i].short_description.substring(0, 35) + '"'
/* +' src='+'"{{url('/public/uploads') . '/'.''}}'+data.search_product[i].productimages[0].image + '"'+'> </div>'*/
+' src='+'"{{ url('photo') . '/'.'nullx120/productimages/'}}'+data.search_product.data[i].productimages[0].image + '"'+'> </div>'
 +'<div class="search_list_text"><h3>'+ data.search_product.data[i].model_name +'</h3> ' ;
      y += '<p>'+ data.search_product.data[i].short_description +'</p><p class="searchlink">'+'{{url(App::getLocale())}}'+'/{{ trans("general.product_ajx") }}/'+data.search_product.data[i].products['pc1_slug']+'/'+data.search_product.data[i].products['pc2_slug']+'/'+data.search_product.data[i].products['pc3_slug']+'/'+data.search_product.data[i].products['pc4_slug']+'/'+convertToSlug(data.search_product.data[i].model_name)+'/'+data.search_product.data[i].products_id+'</p></div></a></div> ' ;
   
       
 
  $( ".loadmoreimg" ).html(y);
}

       });
       });
    $(".keyupsearchproduct").bind("keyup input  change focus", function(e) {

 
var path=window.location.pathname;
var host = window.location.hostname;
var pathsearch="/{{App::getLocale()}}/{{ trans('general.search_ajx') }}";
var length;
var search_input;
 
/*/eltesan-admin/en/search*/
  if(e.which == 13) {
/*         
       var search_input = localStorage.getItem('search_input');
console.log(search_input);
var search_input = document.getElementById('search_input').value;
localStorage.setItem('search_input', 'search_input ');*/
 keyword=this.value ; 
        window.location.href= ' {{url("/")}}/{{App::getLocale()}}/{{ trans("general.search_ajx") }}?keyword='+ keyword
          
/*
         $(".keyupsearchproduct").val(search_input);*/
    }
/*    if (search_input!=null) { 
      $(".keyupsearchproduct").val(search_input);
    }  */
    
  
     var len = this.value.length;
        if (len >= 3) {
          
          $( ".loadmoreimg" ).html('');
           if (path!=pathsearch) {
        
 $("#second_search").css("height", "auto") ; }

             keyword=this.value ; 
 
                
                $.get('{{url("/")}}/{{App::getLocale()}}/{{ trans("general.search_ajx") }}?keyword='+ keyword+'&page='+current_page, function(data) { 
  
var   i, j, x  = "";
var count=0;
 length=data.search_product.data.length;



if (length===0) {
  $(".notfound").show();
  $( ".loadmoreimg" ).html('');
   $(".searchblade").hide();
   $( ".load" ).hide();

  
 }else{
   $(".searchblade").show();
   if (path===pathsearch) {

total_length=7;
if (length>7) { $( ".load" ).show(); }
  $(".first-search").hide();
  $("#second_search").hide();
 
 
 } else {
total_length=4; 


 }
  $(".notfound").hide();

for (i in data.search_product.data) {
  if (count<total_length) {
 
     
  
 x +='<div class="list_items container"><a href="'+'{{url(App::getLocale())}}'+'/{{ trans("general.product_ajx") }}/'+data.search_product.data[i].products['pc1_slug']+'/'+data.search_product.data[i].products['pc2_slug']+'/'+data.search_product.data[i].products['pc3_slug']+'/'+data.search_product.data[i].products['pc4_slug']+'/'+convertToSlug(data.search_product.data[i].model_name)+'/'+data.search_product.data[i].products_id+'" > '
 x +='<div class="searchimage"><img' 
 +' title='+'"' +data.search_product.data[i].model_name + '"' 
 +' alt='+'"' +data.search_product.data[i].short_description.substring(0, 35) + '"'
/* +' src='+'"{{url('/public/uploads') . '/'.''}}'+data.search_product[i].productimages[0].image + '"'+'> </div>'*/
+' src='+'"{{ url('photo') . '/'.'nullx120/productimages/'}}'+data.search_product.data[i].productimages[0].image + '"'+'> </div>'
 +'<div class="search_list_text"><h3>'+ data.search_product.data[i].model_name +'</h3> ' ;
      x += '<p>'+ data.search_product.data[i].short_description +'</p><p class="searchlink">'+'{{url(App::getLocale())}}'+'/{{ trans("general.product_ajx") }}/'+data.search_product.data[i].products['pc1_slug']+'/'+data.search_product.data[i].products['pc2_slug']+'/'+data.search_product.data[i].products['pc3_slug']+'/'+data.search_product.data[i].products['pc4_slug']+'/'+convertToSlug(data.search_product.data[i].model_name)+'/'+data.search_product.data[i].products_id+'</p></div></a></div> ' ;

   
       count=count+1; 
 }  
}

/*document.getElementById("searchblade").innerHTML = x;*/
 
 $( ".searchblade" ).html(x);
 

}
                     
                });
     
     
      $( ".see_more" ).css("display", "block");
       } 
       

});

</script>
 