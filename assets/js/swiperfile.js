

   var homepage_swiper = new Swiper('.homepage .newproducts .swiper-container', {
      pagination: '.swiper-pagination',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
      
        slidesPerView: 5,
 
            
            spaceBetween: 40,



            grabCursor: true,
            loop: false,

        breakpoints: {
            1024: {
                slidesPerView: 2,
                spaceBetween: 40
            },
        
         
            767: {
                slidesPerView: 1,
                spaceBetween: 0
            }
        }
    });



 
            var marketsproducts_swiper = new Swiper('.marketsproducts .market .swiper-container', {
              pagination: '.swiper-pagination',
              nextButton: '.swiper-button-next',
              prevButton: '.swiper-button-prev',
              paginationClickable: true,
              slidesPerView: 3,
              centeredSlides: true,
              paginationClickable: true,
              spaceBetween: 40,
              grabCursor: true,
              loop: true,

              breakpoints: {
                1024: {
                  slidesPerView: 2,
                  spaceBetween: 40
                },


                767: {
                  slidesPerView: 1,
                  spaceBetween: 0
                }
              }
            });
        
   
          
                

 

           var accessories_swiper = new Swiper('.accessories .swiper-container', {
            pagination: '.swiper-pagination',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            paginationClickable: true,
            slidesPerView: 4,
            spaceBetween: 40,
            grabCursor: true,
            loop:false,

 
   
        

              breakpoints: {
                 1024: {
                slidesPerView: 2,
                spaceBetween: 40
                },
                 767: {
                slidesPerView: 1,
                spaceBetween: 0
               }
            
             }
    });
 
         
 
  
 
     var relatedproducts_swiper = new Swiper('.relatedproducts .swiper-container', {
            pagination: '.swiper-pagination',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
        paginationClickable: true,
        slidesPerView: 4,
    
            paginationClickable: true,
            spaceBetween: 40,



            grabCursor: true,
            loop: false,

        breakpoints: {
            1024: {
                slidesPerView: 2,
                spaceBetween: 40
            },
        767: {
                slidesPerView: 1,
                spaceBetween: 0
            }
            
        }
    });
 
 
 

 
  var nws_swiper = new Swiper('.inside .swiper-container', {
           
                     nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            slidesPerView: 3,
            spaceBetween: 20,
            grabCursor: true,
            loop: false,
            centeredSlides: true,
              
           

        breakpoints: {
            1024: {
                slidesPerView: 2,
                spaceBetween: 40
            },
        767: {
                slidesPerView: 1,
                spaceBetween: 0
            }
            
        }
    });
