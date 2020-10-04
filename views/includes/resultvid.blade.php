
                $.get('{{url("/")}}/{{App::getLocale()}}/videos?&keyword=' +keyword+'&date='+datefilt+'&title='+titlefilt+'&cat='+cat  , function(data) {
                  
       var   i,   x  = "";
     
      
       
        for (i in data.videos.data) {
        
      
     

x += ' <div class="col-sm-4 col-xs-12 profile"><div class="panel panel-default video"><div class="panel-thumbnail"><a   href="#" title="' +data.videos.data[i].title +'" class="thumb"><video controls class="img-responsive img-rounded" data-toggle="modal" data-target=".modal-profile-lg" alt="' +data.videos.data[i].description +'" title="' +data.videos.data[i].title +'" ><source src='+'"{{ url('photo') . '/'.'nullx250/galleryvideos/'}}' +data.videos.data[i].galleryvideos.video +'"></video></a></div><div class="panel-body"><div class="video_explanation"><h3>' +data.videos.data[i].title +'</h3><p>' +data.videos.data[i].description +'</p><p class="date">' +data.videos.data[i].title +'</p></div> </div> </div> </div>'; 

       $( ".newfilt" ).html(x);}});