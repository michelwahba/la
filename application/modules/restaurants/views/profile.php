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
        <?php if($rating > 0){?>
        <div>
        <input type="text" value="<?php echo $rating;?>" class="rating rating5" />
        </div>  
        <? }?>           
    </div>
    
    <div class="row well">    
        <div class="span4">
          <ul class="nav nav-pills fix_height">
            <li class="active"><a href="#">Location</a></li>
            <li><a href="<?php echo base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/reviews/'.$this->uri->segment(4);?>">Reviews</a></li>
            <li class="disabled"><a href="#">Menu</a></li>
          </ul>
        </div>    
  	</div>

	<div class="row well" style="margin-top:2%">

    	<div class="col-md-6">  
        <?php if($row->cuisinType){echo  '<strong>Cuisine:</strong> '. $row->cuisinType.'<br />';} ?>
        <?php if($row->catering){echo  '<strong>Catering:</strong> '. $row->catering.'<br />';} ?>
        <?php if($row->email){echo  '<strong>Email:</strong> <a href="mailto:'.$row->email.'?Subject=Enquiry From London4arabs.com" target="_top"> '. $row->email.'<br />';} ?>
        <?php if($row->link){echo  '<strong>Website:</strong> <a href="http://'.$row->link.'" target="BLANK" />'. $row->link.'</a><br />';} ?>
         <?php if($row->menu){echo  '<strong>Menu:</strong> '. $row->manu.'<br />';} ?>        
         <?php 
		 $address = explode(',', $row->address);
		 $count = count($address);
		 
		 $address1 = $address[0];
		 if($count > 1){
		 $address2 = $address[1];
		 }
		 if($count > 2){
		 $address3 = $address[2];
		 }
		 if($count > 3){
		 $address4 = $address[3];
		 }		 
		 ?>
         <br />
   				<strong>Address</strong>
                <address>
                <?php echo $address1;?><br />
                <?php if(isset($address2)){ echo $address2.'<br />';}?>
                <?php if(isset($address3)){ echo $address3.'<br />';}?>            
                    <strong>United Kingdom</strong><br>
                    <?php echo $row->postCode;?><br>
                    <abbr title="Phone"><span class="glyphicon glyphicon-earphone"></span></abbr> <a href="tel: +44<?php echo ltrim($row->telephone, '0') ;?>"> <?php echo $row->telephone ;?></a>
                </address>           
    	</div>

      <div class="col-md-6" style="height:100%">
        	<div class="google-map-canvas" id="map-canvas" style="height:250px"></div>      
      </div>

<br /><br />
<br />
<br />

	</div>
<?php }?>