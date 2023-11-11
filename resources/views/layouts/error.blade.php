
<!DOCTYPE html>
<html>
<head>
  <title> @yield('code') | @yield('title') </title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="author" content="EXILEDNONAME">
  <meta name="description" content="Page Error Animations"/>
  <meta name="keywords" content="Page Error">
  <meta name="robots" content="all">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/errors/404/css/animate.css">
  <link rel="stylesheet" href="/assets/errors/404/css/stylesheet.css">
</head>
<body>
  <div class="wrapper wow" >
    <div id="texture" class="bg-image"  data-bg-image="/assets/errors/404/images/texture.png" ></div>
    <div id="clouds"></div>
    <div id="hole" class="wow bounceInUp" data-wow-delay="3s"></div>
    <div id="moon" class="wow bounceInUp" data-wow-delay="2s"></div>

    <div id="hand" class="wow bounceInUp" data-wow-delay="3.5s">
      <div class="text">
        @yield('code')
        <h5> @yield('message') </h5><br>
        <a class="le-btn" href="{{ URL::previous() }}"> {{ __('default.label.back') }} </a>
      </div>
    </div>
    <div id="grass" class="wow bounceInUp" data-wow-delay="1s"></div>
    <div id="grass2" class="wow bounceInUp" data-wow-delay="1.5s" ></div>
  </div>

  <a class="goto-top" href="#gotop"></a>
  <script src="/assets/errors/404/js/jquery-1.9.0.min.js"></script>
  <script src="/assets/errors/404/js/jquery-migrate-1.4.1.min.js"></script>
  <script type="text/javascript" src="/assets/errors/404/js/plax.js"></script>
  <script type="text/javascript" src="/assets/errors/404/js/wow.min.js"></script>
  <script type="text/javascript" src="/assets/errors/404/js/fontsmoothie.min.js"></script>
  <script type="text/javascript" src="/assets/errors/404/js/jquery.spritely.js"></script>
  <script type="text/javascript" src="/assets/errors/404/js/script.js"></script>

</body>
</html>
