
                $.get('{{url("/")}}/{{App::getLocale()}}/images?&keyword=' +keyword+'&title='+titlefilt+'&cat='+cat  , function(data) {
                  
       var   i,   x  = "";
     
      
       
        for (i in data.images.data) {
        
      
     

x += ' <div class="col-lg-4 col-sm-6 col-xs-12"><a class="hvr-float-shadow image item" href="javascript:void(0)"><img alt="' +data.images.data[i].description +' " title=" ' +data.images.data[i].title +'" class="thumbnail img-responsive"   src='+'"{{ url('photo') . '/'.'nullx250/galleryimages/'}}' +data.images.data[i].galleryimages.image +'"><div class="image_explanation"><h3>' +data.images.data[i].title +'</h3><p>' +data.images.data[i].description +'</p></div></a></div>';

       $( ".newfilt" ).html(x);}});