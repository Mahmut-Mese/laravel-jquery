 
<script >
$(function(){
    setTimeout(function(){ 
  var num_img=$(".image_galeri .image img").length;
  if (num_img>12) {
      $( ".load" ).show(); }
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
current_page=1;
var keyword = getUrlParameter('keyword');
   
if(typeof keyword === "undefined")
{
    keyword='';

}
var cat = getUrlParameter('cat');
if(typeof cat === "undefined")
{
    cat='';

}
var datefilt = getUrlParameter('date');
if(typeof datefilt === "undefined")
{
    datefilt='asc';

} 
var titlefilt = getUrlParameter('title');
if(typeof titlefilt === "undefined")
{
    titlefilt='asc';

} 
var host = window.location.hostname;
 var path=window.location.pathname;

    $('.load').click(function(){
 current_page= current_page+1;
  
        //event.preventDefault();
         
              
                $.get('{{url("/")}}/{{App::getLocale()}}/images?&keyword=' +keyword+'&date='+datefilt+'&title='+titlefilt+'&cat='+cat+'&page='+current_page  , function(data) {
                  
       var   i = "";
          var x=  $( ".loadmoreimg" ).html();
     
      
      if (data.images.current_page==data.images.last_page) {
      
       $( ".load" ).css("opacity", "0");
      }  
        for (i in data.images.data) {
        
      
     

x += ' <div class="col-lg-4 col-sm-6 col-xs-12"><a class="hvr-float-shadow image item" href="javascript:void(0)"><img alt="' +data.images.data[i].description +' " title=" ' +data.images.data[i].title +'" class="thumbnail img-responsive"   src='+'"{{ url('photo') . '/'.'nullx250/galleryimages/'}}' +data.images.data[i].galleryimages.image +'"><div class="image_explanation"><h3>' +data.images.data[i].title +'</h3><p>' +data.images.data[i].description +'</p></div></a></div>';

       $( ".loadmoreimg" ).html(x);
       
       }
     
     
       
});  });

$('.filt button').on('click', function() {
 // event.preventDefault();
  var filt_text= $(this).text();

   if (filt_text=='Date') {
       if (datefilt=='asc') {
          datefilt='desc'; } 
       else { datefilt='asc'; }
  
 
   @include('includes.resultimg');
 

  } else {

   if (titlefilt=='asc') {
      titlefilt='desc'; } 
   else { titlefilt='asc'; }

   @include('includes.resultimgtitle'); }

  return [titlefilt, datefilt ,filt_text];

});
$('.cat').on('change', function() {
 // event.preventDefault();
  cat = this.value;

   @include('includes.resultimg');
     return cat;
});
$('.keyup').on('input', function(e) {
  
  //event.preventDefault();
   var len = this.value.length;
 
        if (len >= 3) {

          keyword=this.value;

 
       

       @include('includes.resultimg');
 return keyword;
       
            
        }  
});
});

</script>