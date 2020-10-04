 
<script >
$(function(){
   setTimeout(function(){ 
    var num_vid=$(".gallery .panel .img-responsive").length;
  if (num_vid>12) {
  
   
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
  
 
 
 
    
     //   event.preventDefault();
         
              
                $.get('{{url("/")}}/{{App::getLocale()}}/videos?&keyword=' +keyword+'&date='+datefilt+'&title='+titlefilt+'&cat='+cat+'&page='+current_page  , function(data) {
                  
       var   i   = "";
       var x=  $( ".loadmoreimg" ).html();
     
      
      if (data.videos.current_page==data.videos.last_page) {
      
       $( ".load" ).css("display", "none");
      }  
        for (i in data.videos.data) {
        
      
     

x += ' <div class="col-sm-4 col-xs-12 profile"><div class="panel panel-default video"><div class="panel-thumbnail"><a   href="#" title="' +data.videos.data[i].title +'" class="thumb"><video controls class="img-responsive img-rounded" data-toggle="modal" data-target=".modal-profile-lg" alt="' +data.videos.data[i].description +'" title="' +data.videos.data[i].title +'" ><source src='+'"{{ url('photo') . '/'.'nullx250/galleryvideos/'}}' +data.videos.data[i].galleryvideos.video +'"></video></a></div><div class="panel-body"><div class="video_explanation"><h3>' +data.videos.data[i].title +'</h3><p>' +data.videos.data[i].description +'</p><p class="date">' +data.videos.data[i].title +'</p></div> </div> </div> </div>'; 

       $( ".loadmoreimg" ).html(x);

       
       }
     
     
       
});  });

$('.filt button').on('click', function() {
  //event.preventDefault();
  var filt_text= $(this).text();

   if (filt_text=='Date') {
       if (datefilt=='asc') {
          datefilt='desc'; } 
       else { datefilt='asc'; }
  
 
   @include('includes.resultvid');
 

  } else {

   if (titlefilt=='asc') {
      titlefilt='desc'; } 
   else { titlefilt='asc'; }

   @include('includes.resultvidtitle'); }

  return [titlefilt, datefilt ,filt_text];

});
$('.cat').on('change', function() {
  //event.preventDefault();
  cat = this.value;

   @include('includes.resultvid');
     return cat;
});
$('.keyup').on('input', function(e) {
  
  //event.preventDefault();
   var len = this.value.length;
 
        if (len >= 3) {

          keyword=this.value;

 
       

       @include('includes.resultvid');
 return keyword;
       
            
        }  
});
});

</script>