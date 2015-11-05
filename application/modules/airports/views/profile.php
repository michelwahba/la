<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<?php foreach($query->result() as $row){
$postcode = '';
if ($row->id === 150){
	$postcode = $row->terminal_2_po;
}
else{
	$postcode = $row->terminal_1_po;
}
?>
<script  type="text/javascript">
    var geocoder;
    var map;

    function initialize() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);
        var mapOptions = {
            zoom: 15,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    codeAddress();
    }

    function codeAddress() {
        var address = '<?php echo $postcode;?>';
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } /*else {
                alert('Geocode was not successful for the following reason: ' + status);
            }*/
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	<script>
	
		$(document).ready(function() {
			
			var startingLocation;
			var destination = '<?php echo $postcode;?>'; // replace this with any destination
			
			$('a.get-directions').click(function (e) {
				e.preventDefault();				
				
				// check if browser supports geolocation
				if (navigator.geolocation) { 
					
					// get user's current position
					navigator.geolocation.getCurrentPosition(function (position) {   
						
						// get latitude and longitude
						var latitude = position.coords.latitude;
						var longitude = position.coords.longitude;
						startingLocation = latitude + "," + longitude;
						
						// send starting location and destination to goToGoogleMaps function
						goToGoogleMaps(startingLocation, destination);
						
					});
				}
				
				// fallback for browsers without geolocation
				else {
					
					// get manually entered postcode
					startingLocation = $('.manual-location').val();
					
					// if user has entered a starting location, send starting location and destination to goToGoogleMaps function
					if (startingLocation != '') {
						goToGoogleMaps(startingLocation, destination);
					}
					// else fade in the manual postcode field
					else {
						$('.no-geolocation').fadeIn();
					}
					
				}
								
				// go to Google Maps function - takes a starting location and destination and sends the query to Google Maps
				function goToGoogleMaps(startingLocation, destination) {
					window.location = "https://maps.google.co.uk/maps?saddr=" + startingLocation + "&daddr=" + destination;
				}
					
			});
			
		});
	</script>

    <div class="row well">
    	<h2><?php echo $row->name;?></h2>   
        <?php if($rating > 0){?>
<input type="text" value="<?=$rating?>" class="rating rating5" />
<? } ?>         
    </div>
    
    <div class="row well" style="height:80px">    
    <div class="span4">
      <ul class="nav nav-pills">
        <li class="active"><a href="#">Location</a></li>
        <li><a href="<?php echo base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/reviews/'.$this->uri->segment(4);?>">Reviews</a></li>
      </ul>
    </div>
</div>
	<div class="row well">
	<div class="bs-docs-section well">

        <div class="row">
          <div class="col-lg-6">
            <div class="bs-component">
        <?php 
		if($row->image){
			echo '<img class="img-responsive" src="'.base_url().'assets/images/airports/'.$row->image.'"/>';
		}
		?>
            </div>
          </div>
          <div class="col-lg-6" style="padding-top:20px;">
           
            
				<div class="google-map-canvas" id="map-canvas" style="height:250px"></div>      
     
      <br />

         <a href="#"  class="get-directions btn btn-info" title="Get directions to <?php echo $row->name;?>" ><i class="icon-exclamation-sign icon-white"></i> Give me directions to <?php echo $row->name;?></a>
      
            
          </div>
        </div>
        
        <div class="row" style="padding-top:50px;">
          <div class="col-lg-12">
            <div class="bs-component">
            <?php if($row->arrivals_link){
			echo  '<a  target="_blank" href="http://'. $row->arrivals_link.'"><h4>View Live Arrivals</h4></a>';} ?>            
            </div>
            <div class="bs-component">
            <?php if($row->departures_link){
			echo  '<a target="_blank" href="http://'.$row->departures_link.'"><h4>View Live Departures</h4></a> '.'<br />';} ?>
            </div>
            <div class="bs-component">
            <a href="tel:<?php echo ltrim($row->telephone, '0') ;?>"> <p><abbr title="Call Now"><span class="glyphicon glyphicon-earphone"></span></abbr><?php echo $row->telephone;?></p></a>
            </div>
            <div class="bs-component">
            <?php if($row->remarks){
			echo '<p>'.nl2br($row->remarks).'</p>';
			} ?>
            </div>
            <div class="bs-component">
            <?php if($row->how_to_get_there){
			echo '<p><h4>How To Get There</h4>'.nl2br($row->how_to_get_there).'</p>';
			} ?>
            </div>
            <div class="bs-component">
            <?php if($row->website){echo  '<strong>Website:</strong> <a href="http://'.$row->website.'" target="_BLANK" />'. $row->website.'</a><br />';} ?>
            </div>
          </div>
        </div>
      </div>
      </div>
<?php }?>