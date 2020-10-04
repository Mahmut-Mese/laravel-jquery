 
 
     $(document).ready(function(){

 
  $(".more-detail a").on('click', function(event) {

 
    if (this.hash !== "") {
  
      event.preventDefault();

     
      var hash = this.hash;

           $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){
   
  
        window.location.hash = hash;
      });
    }  
  });
  if (window.matchMedia('(min-width: 768px)').matches) {

        //...
    
           var bigbrother = -1;
 
    $('.features_key .news-box').each(function() {
      for (var i = 0; i < 3; i++) {
       
     
      bigbrother = bigbrother > $('.features_key .news-box').eq(i).height() ? bigbrother : $('.features_key .news-box').eq(i).height();
     }
    });

    $('.features_key .news-box').each(function() {
      $('.features_key .news-box').height(bigbrother);
    });
    }
  
    
   /*  var bigkey = -1;
 
    $('.new .features_key').each(function() {
      for (var i = 0; i < 3; i++) {
       
     
      bigkey = bigkey > $('.new .features_key').eq(i).height() ? bigkey : $('.keyfeatures .features_key').eq(i).height();
     }
    });
 
    $('.new .features_key').each(function() {
      $('.new .features_key').height(bigkey);
    });
         */
    var lng= $('.sub-page .new_item .row').length;
 var bigbro = -1;
   for (var i = 0; i < lng; i++) {
    $(".sub-page .new_item .row:eq("+i+") .col-md-6").each(function() {
    
      
      bigbro = -1;
      for (var indx = 0; indx < 2; indx++) {
      bigbro = bigbro > $(".sub-page .new_item .row:eq("+i+") .col-md-6").eq(indx).height() ? bigbro : $(".sub-page .new_item .row:eq("+i+") .col-md-6").eq(indx).height();
      }
        $(".sub-page .new_item .row:eq("+i+") .col-md-6").height(bigbro);
        bigbro = -1;
 
   
    });
       $(".sub-page .new_item .row:eq("+i+") .col-md-4").each(function() {
    
      
      bigbro4 = -1;
       for (var indx = 0; indx < 3; indx++) {
      bigbro4 = bigbro4 > $(".sub-page .new_item .row:eq("+i+") .col-md-4").eq(indx).height() ? bigbro4 : $(".sub-page .new_item .row:eq("+i+") .col-md-4").eq(indx).height();
      }
        $(".sub-page .new_item .row:eq("+i+") .col-md-4").height(bigbro4);
        bigbro4 = -1;
 
   
    });
  }
 $('#form2 input[type=text]').on('change invalid', function() {
    var textfield = $(this).get(0);
    
    // 'setCustomValidity not only sets the message, but also marks
    // the field as invalid. In order to see whether the field really is
    // invalid, we have to remove the message first
    textfield.setCustomValidity('');
    
    if (!textfield.validity.valid) {
        var theLanguage = $('html').attr('lang');
        if (theLanguage=='en') {
     
      textfield.setCustomValidity('The field is required');  
      }
      else{
        textfield.setCustomValidity('Lütfen işaretli yerleri doldurunuz'); 
      }
    }
});
});
 


    function printFunction() {
    window.print();
}

 
  function openNav() {
     
    var path=window.location.pathname;
var pathsearch="/en/search"
 

 if( path!=pathsearch)  {
        $("#second_search").css("height", "77px") ;
       
        
     $( "#search_input" ).focus();
    }

   

}
 

function closeNav() {
    $("#second_search").css("height", "0");
 

   
}

  


 
 

 
$(function(){
 
  var numItems = $('.one_item').length;
   var total  = 0;
   for (var i = 0; i <  numItems; i++) {
   var count = $('.count').eq(i).val();
   var price  = $('.price').eq(i).text();
   var iprice=parseInt(price);
   var subcount  = price*count;
   $( '.subprice' ).eq(i).text( subcount);

   
    total=total+subcount;

 
   
   }
   $('#total').text( total);
$('button').on('click', function() {
   
  var result  = $('#total').text();
  var iresult=parseInt(result);
 
    myClass = $(this).attr("data-type");
  if (myClass==="plus") {
     var index = $( '.plus' ).index( this );
     var price  = $('.price').eq(index).text();
     var iprice=parseInt(price);
     var subprice  = $('.subprice').eq(index).text();
     var isubprice=parseInt(subprice);
     isubprice=isubprice+iprice;
     iresult=iresult+iprice;
  } 
  else if(myClass==="minus") {
       var index = $( '.minus' ).index( this );
       var price  = $('.price').eq(index).text();
       var iprice=parseInt(price);
       var subprice  = $('.subprice').eq(index).text();
       var isubprice=parseInt(subprice);
       isubprice=isubprice-iprice;
       iresult=iresult-iprice;
  }
 
  $( '.subprice' ).eq(index).text( isubprice);
  $('#total').text( iresult);
  
});
 

});

$(function(){

 

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
      
 
});





 


  $(function(){
      setTimeout(function(){ 
   
$( ".loading" ).css("opacity", "1");
 
     
}, 3000);
    
   if($(".panel_detail:hidden").length <= 9){
     $("#more").hide();
          $("#less").hide();
          $(".panel_detail").slice(0, 9).show(); 
 }
 else{
 $("#less").hide();
    $(".panel_detail").slice(0, 9).show(); 
    $(".load").click(function(e){ 
        e.preventDefault();
  
        if($(".panel_detail:hidden").length == 0){ 
      
        
        $(".panel_detail").slice(9).hide();
        
          $("#more").show();
          $("#less").hide();
        
        }
        else if($(".panel_detail:hidden").length < 9){
        $(".panel_detail:hidden").slice().show();
        if($(".panel_detail:hidden").length == 0){ $("#more").hide();
         $("#less").show();}
        }
        
        else if($(".panel_detail:hidden").length >= 9){ 
         $(".panel_detail:hidden").slice(0,9).show();
           if($(".panel_detail:hidden").length == 0){ $("#more").hide();
         $("#less").show();}
       }
    });}
});


$(function(){
   var num_group=$(".panel_group").length;

 for (var num = 0; num <= num_group; num++) {

   if($(".panel_group:eq("+num+") .panel:hidden").length <= 6){
          $(".more").eq(num).hide();
          $(".less").eq(num).hide();
          $(".loading_col").eq(num).hide();
          
          $(".panel_group:eq("+num+") .panel").slice(0, 6).addClass("inline_block"); 
 }
 else{
  var numproducts=$(".panel_group:eq("+num+") .panel:hidden").length;
 
  numproducts=numproducts-5;
  $( ".loading .more span" ).eq(num).text( numproducts);
          $(".loading_col").eq(num).show();
          $(".less").eq(num).hide();
          $(".panel_group:eq("+num+") .panel").slice(0, 5).addClass("inline_block"); // select the first ten
 
     }
   $( ".loading .more" ).click(function() {

          var index = $( ".loading .more" ).index( this );
          if(index>=0){
           
          $(".panel_group:eq("+index+") .panel:hidden").slice().addClass("inline_block");
          $(".more").eq(index).hide();
          $(".less").eq(index).show();   }
       
          });

          $( ".loading .less" ).click(function() {

           var index = $( ".loading .less" ).index( this );
           if(index>=0){
         
          $(".panel_group:eq("+index+") .panel").slice(5).removeClass("inline_block");
          $(".more").eq(index).show();
          $(".less").eq(index).hide();    }
         
         });
    }
});

  $( "a" ).click(function(){
   var index_num = $( ".leftmenu .buttons .dropdown-toggle" ).index( this );

  $(".leftmenu .buttons .dropdown-menu").eq(index_num).toggle(400);

});
 

var myDiv = $('.content');
myDiv.text(myDiv.text().substring(0,200));
   

function isread( ) {
  if (true) {
 
  }  
    
}
function isread() {
    
 
 if ($('#is_read').is(':checked') == false) {
   var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 11000);
 } 
   
}
 $(document).ready(function() {
    $('.menus-box .dropdown').click(function() {

        var index_menu = $( ".menus-box .dropdown" ).index( this );

   
  $(".menus-box .dropdown:not(:eq("+index_menu+")) .dropdown-menu").removeClass("show");
     
   
      $(".menus-box .dropdown:eq("+index_menu+") .dropdown-menu").toggleClass('show');
    });
       
      
      $(document).click(function(event) {
    if (!$(event.target).is("header .navbar-default .navbar-nav>li>a")) {
        $(".menus-box .dropdown  .dropdown-menu").removeClass("show");
    }
});

  if (window.matchMedia('(min-width: 768px)').matches) {
   
     var child_lng= $('header .menus-box .dropdown-menu li').length;
       
    for (var child = 5; child <= child_lng; child++) {
       
     $("header .menus-box .dropdown-menu li:nth-child("+child+")").css('margin-top' , '30px'  );
     var mode=child % 4;
     if (mode==1) {
      $("header .menus-box .dropdown-menu li:nth-child("+child+")").addClass("clearfix"); 
     }
  
    }
  }
         
  });


 function mailclose() {
  $("#my_input").hide();}

  $('.footer').css('position', $(document).height() > $(window).height() ? "inherit" : "relative");
 $('.searchpage').css('position' , 'relative'  );
  
   $('.page-detail .nav-pills>li:first-child').addClass("active"); 
   $('.page-detail .tab-content>.tab-pane:first-child').addClass("in active"); 
 
     
   