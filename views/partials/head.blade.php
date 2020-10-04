

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="@yield('meta-description', $setting->meta_description)" />
<meta name="keyword" content="@yield('meta-keywords', $setting->meta_keywords)" />

<title> @yield('page_title', $setting->header_title) </title>



    <link rel="stylesheet" href="{{ url('resources/assets') }}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('resources/assets') }}/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{ url('resources/assets') }}/css/custom.css">
    <link rel="stylesheet" href="{{ url('resources/assets') }}/css/animate.css">
   
    <link rel="stylesheet" href="{{ url('resources/assets') }}/css/fonts.css">
  

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/30da691cb5.js"></script>
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_DE7tJqZLDZTfArTveXnL923TzUef550&callback=initMap" type="text/javascript"></script> -->
  
<!-- Google Analytics -->
<script>
window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
ga('create', '{{$setting->settings->analytics_code}}', 'auto');
ga('send', 'pageview');
</script>
<script async src='https://www.google-analytics.com/analytics.js'></script>
<!-- End Google Analytics -->
