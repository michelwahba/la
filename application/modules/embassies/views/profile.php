<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>

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
        var address = '<?php echo $row->postCode;?>';
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <div class="row well">
    	<h2><?php echo $row->name;?></h2>      
    </div>
    
    <div class="row well">    
        <div class="span4">
          <ul class="nav nav-pills fix_height">
            <li class="active"><a href="#">Location</a></li>
           <!-- <li><a href="<?php echo base_url().$this->uri->segment(1).$this->uri->segment(2).'/reviews/'.$this->uri->segment(3).'/'.$this->uri->segment(4);?>">Reviews</a></li>-->
           <!-- <li class="disabled"><a href="#">Menu</a></li>-->
          </ul>
        </div>    
  	</div>
		<div class="row well">
        
    <? if ($row->image){?>
    <div class="bs-docs-section well">
        <div class="row">
          <div class="col-lg-4">
          <img style="max-width:320px" src="<?=base_url().'fuel/assets/images/'.$row->image?>" class="img-responsive" />
          </div>
          </div>
          </div>
          <? }?>
	<div class="row well" style="margin-top:2%">

    	<div class="col-md-6">  
         <address>
        <?php if($row->address){echo  '<strong><h4>Address:</h4></strong> '. $row->address.'<br />'.$row->Address2.'<br />';} 		
		?>
        <?php if($row->postCode){echo  $row->postCode.'<br />';} ?>
        </address>
        
        <abbr title="Phone"><span class="glyphicon glyphicon-earphone"></span></abbr> <a href="tel: +44<?php echo ltrim($row->telephone, '0') ;?>"> <?php echo $row->telephone ;?></a><br />

        <?php if($row->email){echo  '<strong>Email:</strong> <a href="mailto:'.$row->email.'?Subject=Enquiry From London4arabs.com" target="_top"> '. $row->email.'</a><br />';} ?>
        <?php if($row->Website){echo  '<strong>Website:</strong> <a href="http://'.$row->Website.'" target="BLANK" />'. $row->Website.'</a><br />';} ?>
    
         <div class="bs-component">
            <p><h4>Opening Hours</h4></p><p><?=$row->Opening_Hours?></p>
         </div>
            
   			          
    	</div>

      <div class="col-md-6" style="height:100%">
        	<div class="google-map-canvas" id="map-canvas" style="height:250px"></div>      
      </div>

<br /><br />
<br />
<br />

	</div>
<?php }?>