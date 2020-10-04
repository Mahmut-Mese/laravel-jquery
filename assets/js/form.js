 
function validateEmail(email) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(email);
}
     
   /*   $('li.multipleInput-email').click(function() {
           var email=$(this).val();
         var before= $('#recipient_email').val();
         if (before==null) {
         $('#recipient_email').val(email);}     
               });

*/


(function( $ ){
     $.fn.multipleInput = function() {
          return this.each(function() {
               // list of email addresses as unordered list
               $list = $('<ul/>');
               // input
              // var $input = $('<input type="email" id="email_search" class="email_search multiemail"/>').keyup(function(event) { 
               var $input =  $('<input type="email" id="email_search" class="email_search multiemail"/>').on("keypress keyup input  change focus", function(event) {
                    if(event.which == 13 || event.which == 32 ) {                        
                         if(event.which==13|| event.which == 188){
    event.preventDefault();
  
                          
                         }
                         
                         var val = $(this).val().slice(0, -1); // key press is space or comma                        
                                                
                         if(validateEmail(val)){
                         // append to list of emails with remove button
                         $list.append($('<li class="multipleInput-email"><span>' + val + '</span></li>')
                              .append($('<a href="#" class="multipleInput-close" title="Remove"><i class="glyphicon glyphicon-remove-sign"></i></a>')
                                   .click(function(e) {
                                        $(this).parent().remove();
                                        
                                   })
                              )
                         );
                         $(this).attr('placeholder', '');
                         // empty input
                         var email=$(this).val();
                         var before= $('#recipient_email').val();


                         if (before.length!=0) {

                           var b = before.includes(email);
                           var e=  email.includes(before);
                              if (!b && !e) {

                         before=before+','+email;
                       $('#recipient_email').val(before);
                              } 

                          
                         } 
                         else{
                          $('#recipient_email').val(email);
                         }
                    
                         $(this).val('');
                          
                          }
                          
                    } 
                    else
                    {
                          var opt_email=$(this).val();
                             var opt_before= $('#recipient_email').val();

if(validateEmail(opt_email)){
                         if (opt_before.length!=0) {
                            var n = opt_before.includes(opt_email);
                            var m=  opt_email.includes(opt_before);
                              if (m) {
                         opt_before=opt_before+','+opt_email;
                       $('#recipient_email').val(opt_email);
                              } 
                          /*    else if (!m) {
                        opt_email=opt_email+','+opt_before;
                       $('#recipient_email').val(opt_email);
                              }*/
                        
                          
                      
                   
                         } 
                         else{
                       $('#recipient_email').val(opt_email);
                       } 
                       }
                    }
                   
               });
               // container div
               var $container = $('<div class="multipleInput-container" />').click(function() {
                    $input.focus();
               });
               // insert elements into DOM
               $container.append($list).append($input).insertAfter($(this));
               return $(this).hide();
          });
     };
})( jQuery );
$('#recipient_email').multipleInput();