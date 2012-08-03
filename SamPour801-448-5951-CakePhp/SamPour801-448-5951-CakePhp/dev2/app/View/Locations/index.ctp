<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <title>GeoLocation Example</title>
  <link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/print.css" rel="stylesheet" type="text/css" media="print" />
  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script src="js/geolocation.js"></script>
  <script src="js/modernizr-2.0.6.js"></script>
  <?php
    echo $this->Html->css('style.css');
  
  echo $this->Html->script('geolocation.js');
  echo $this->Html->script('modernizr-2.0.6.js');
  
  ?>
</head>
<body>
<div class="container">
  <header></header>
  <div class="main">
    <nav></nav>
    <section>
      <article></article>
      <aside class="sidebar1"></aside>
    </section>
    <section>
      <article id="content">
        <header>
          <h1>Share Your Location to Find the Best Beach in Hawaii (may take a few seconds)!</h1>
        </header>
       <div id="location"></div>
       <div id="distance"></div>
       <div id="map"></div>
      </article>
    </section>
    <footer>
      <div class="copyright">Copyright &copy; 
        <script type="text/javascript">
          var dteNow = new Date();
          var intYear = dteNow.getFullYear();
          document.write(intYear);
        </script>
      </div>
    </footer>
  </div>
</div>
</body>
</html>