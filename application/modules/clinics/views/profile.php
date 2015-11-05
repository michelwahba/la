<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<?php foreach($query->result() as $row){?>
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
        var address = '<?php echo $row->postcode;?>';
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
			var destination = '<?php echo $row->postcode;?>'; // replace this with any destination
			
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
    	<h2><?php $name = $row->name; echo $name;?></h2>  
        <div>
        <?php if($rating > 0){?>
<input type="text" value="<?=$rating?>" class="rating rating5" />
<? } ?>
        </div>             
    </div>
    
    <div class="row well">    
        <div class="span4">
          <ul class="nav nav-pills">
            <li class="active"><a href="#">Location</a></li>
            
        <!--    <li><a href="<?php echo base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/doctors/'.$this->uri->segment(4);?>">Doctors</a></li>-->
            
            <li><a href="<?php echo base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/reviews/'.$this->uri->segment(4);?>">Reviews</a></li>
          </ul>
        </div>    
  	</div>

	<div class="row well" style="margin-top:2%">
    	<div class="col-md-6">  
        <h5><strong>Services</strong></h5>
        <?php foreach($categories->result() as $row1){
			echo '<a href="'.base_url().'services/clinics/list_by_service/'.$row1->id.'/'.str_replace(' ', '_', preg_replace("/[^a-z0-9\\040\\.\\-\\_\\\]/i","_",$row1->name)).'">'.$row1->name.'</a> ,';
		}
		?>
         <address>
        <?php if($row->address){echo  '<strong><h4>Address:</h4></strong> '. $row->address.'<br />';} ?>
        <?php if($row->address2){echo  $row->address2.'<br />';} ?>
        <?php if($row->postcode){echo  $row->postcode.'<br />';} ?>
        </address>       
        <abbr title="Phone"><span class="glyphicon glyphicon-earphone"></span></abbr> <a href="tel: +44<?php echo ltrim($row->telephone, '0') ;?>"> <?php echo $row->telephone ;?></a>
        
        <?php if($row->comments){echo  '<strong><h4>Description:</h4></strong> '. $row->comments.'<br />';} ?>

        <?php if($row->url){echo  '<strong>Website:</strong> <a href="http://'.$row->url.'" target="BLANK" />'. $row->url.'</a><br />';} ?>
    <br />        
    	</div>
      <div class="col-md-6" style="height:100%">
        	<div class="google-map-canvas" id="map-canvas" style="height:250px"></div>      
      </div>
      <div class="row well">
      	<div class="col-md-6">       
        </div>
        
        <div class="col-md-6">
        <br />
        <a href="#" target="_blank" class="get-directions btn btn-info" title="Get directions to <?php echo $name;?>" ><i class="icon-exclamation-sign icon-white"></i> Give me directions to <?php echo $name;?></a>
        </div>
      
      </div>

	</div>
<?php }?>