<!-- File: /app/views/tasks/view.ctp -->
  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
 
  <script src="js/modernizr-2.0.6.js"></script>
  
  <?php
    echo $this->Html->css('style.css');
  
 // echo $this->Html->script('geolocation.js');
  echo $this->Html->script('modernizr-2.0.6.js');
 
  ?>


<p><?php echo $this->Html->link("Back To All todos", array('action' => 'index')); ?></p>

<h2><p><?php echo $task['Task']['title']?></p></h2>

<p><small>Created: <?php echo $task['Task']['created']?></small></p>

<h3><p><?php echo $task['Task']['body']?></p></h3>

<p> Your Target Coordinates: -> Latitude: <?php echo $task['Task']['latitude']?>&nbsp;&nbsp;  Longitude: <?php echo $task['Task']['longitude']?></p>

<?php $Flat =   $task['Task']['latitude'] ?>
<?php $Flong =  $task['Task']['longitude'] ?>



<script>

//Geolocation js
//var BeachCoords =  {latitude: 40.633561  ,longitude: -111.824698 };

var map = null;
var BeachCoords =  {latitude: <?php echo $Flat; ?>  ,longitude: <?php echo $Flong; ?> };


window.onload = function(){
	if (Modernizr.geolocation) {
		navigator.geolocation.getCurrentPosition( showLocation, displayError);
	}
	else {
		alert("Geolocation, which is required for this page, is not enabled in your browser. Please use a browser which supports it.");
	}
}

function showLocation(position) {
	
	document.getElementById("location").innerHTML = "You are at Latitude: " + position.coords.latitude + " and Longitude: " + position.coords.longitude;
	var miles = findDistance(position.coords, BeachCoords);
	document.getElementById("distance").innerHTML = "You are " + Math.round(miles) + " miles from <?php echo $task['Task']['title']?> !!";
	displayMap(position.coords);
}



function displayMap(coords) {
	var googleLatAndLong = new google.maps.LatLng(<?php echo $Flat; ?> , <?php echo $Flong; ?> );
	var mapOptions = {
		zoom: 10,
		center: googleLatAndLong,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var mapDiv = document.getElementById("map");
	map = new google.maps.Map(mapDiv, mapOptions);

	var title = "You are here";
	var content = "You are here: " + <?php echo $Flat; ?> + ", " + <?php echo $Flong; ?>;
	addMarker(map, googleLatAndLong, title, content);

}

function addMarker(map, latlong, title, content) {
	var markerOptions = {
		position: latlong,
		map: map,
		title: title,
		clickable: true
	};
	var marker = new google.maps.Marker(markerOptions);

	var infoWindowOptions = {
		content: content,
		position: latlong
	};

	var infoWindow = new google.maps.InfoWindow(infoWindowOptions);

	google.maps.event.addListener(marker, 'click', function() {
		infoWindow.open(map);
	});
}

//error handling callback function
function displayError(error) {
	var errorTypes = {0: "Unknown error",1: "Permission denied",2: "Position is not available",3: "Request timeout"};
	var errorMessage = errorTypes[error.code];
	if (error.code == 0 || error.code == 2) {
		errorMessage = errorMessage + " " + error.message;
	}	
    document.getElementById("location").innerHTML = errorMessage;
}

//****** Use Spherical Law of Cosines to find the distance between two lat/long points (since Earth is curved)
function findDistance(begCoords, endCoords) {
	var begLatRads = degreesToRadians(begCoords.latitude);
	var begLongRads = degreesToRadians(begCoords.longitude);
	var endLatRads = degreesToRadians(endCoords.latitude);
	var endLongRads = degreesToRadians(endCoords.longitude);

	var Radius = 3959; // radius of Earth in miles
	var distance = Math.acos(Math.sin(begLatRads) * Math.sin(endLatRads) + 
					Math.cos(begLatRads) * Math.cos(endLatRads) *
					Math.cos(begLongRads - endLongRads)) * Radius;
	return distance;
}

function degreesToRadians(degrees) {
	radians = (degrees * Math.PI)/180;
	return radians;
}
</script>














<!--Here -->
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
          <h1>Share Your Location to Find the <?php echo $task['Task']['title']?>  (may take a few seconds)!</h1>
        </header>
       <div id="location"></div>
       <div id="distance"></div>
	   <br /> <br />
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
