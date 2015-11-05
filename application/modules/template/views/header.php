<!DOCTYPE html>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="information  for arabs in london">
    <meta name="author" content="Michel Wahba">
    
    <link rel="shortcut icon" href="<?=base_url()?>favicon.ico" type="image/x-icon">

    <title>London4Arabs.com</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet">

	<link href="<?php echo base_url();?>assets/css/bootswatch.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css">
    <link href="<?php echo base_url();?>assets/css/my_css.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.remodal.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/rating.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    
       <! -- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
<?php
$parent = false; // this is just to hide nav when on parent category page
//Bg Image
 	if(isset($image_query)){		
	foreach($image_query->result() as $row){
	$bg_image = base_url().'fuel/assets/images/back_ground/'.$row->image;
	}
	}
	else { // HomePAGE
	$bg_image = 'home.jpg';
	}
?>
<style type="text/css">
body {
    margin-top: 50px; /* Required margin for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
}
.wrapper{background: url('<?php echo $bg_image?>') no-repeat   center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;}
</style>
  </head>
 
  <body>
  <div class="wrapper">

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>" style="max-width:20%">london4arabs.com</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="attraction" aria-expanded="false">Things to do<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="attraction">
                <li><a href="<?php echo base_url();?>things-to-do/attractions">Attractions</a></li>
                <li class="divider"></li>
              <li><a href="<?php echo base_url();?>things-to-do/palaces">Palaces</a></li>
              <li class="divider"></li>
              <li><a href="<?php echo base_url();?>things-to-do/parks">Parks</a></li>
              <li class="divider"></li>
              <li><a href="<?php echo base_url();?>things-to-do/museums">Museums</a></li>
              </ul>
            </li>
            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="sevices" aria-expanded="false">Services<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="services">
                <li><a href="<?php echo base_url();?>services/embassies">Embassies</a></li>     <li class="divider"></li>
            <li><a href="<?php echo base_url();?>services/societies">Societies</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url();?>services/banks">Banks</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url();?>services/clinics">Clinics</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url();?>services/doctors">Doctors</a></li>
            <li class="divider"></li>
        <li><a href="<?php echo base_url();?>services/lawyers">Lawyers</a></li>
              </ul>
            </li>
            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="stay" aria-expanded="false">Where to stay<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="stay">
                <li><a href="<?php echo base_url();?>where-to-stay/hotels">Hotels</a></li>
                <li class="divider"></li>
              <li><a href="<?php echo base_url();?>where-to-stay/Apartments">Apartments</a></li>
              </ul>
            </li>
            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="eat" aria-expanded="false">Where to eat<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="eat">
                <li><a href="<?php echo base_url();?>where-to-eat/restaurants">Restaurants</a></li>
     <!-- <li class="divider"></li>-->

              </ul>
            </li>
            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="information" aria-expanded="false">Information<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="information">
                
                <li><a href="<?php echo base_url();?>information/airports">Airports</a></li>
               <!--< <li class="divider"></li>-->
               <li><a href="<?php echo base_url();?>information/tube_map">London Underground</a></li>
             <!--li><a href="<?php echo base_url();?>information/visas">Coming to the UK</a></li>-->
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url();?>contact">Contact Us</a></li>
            <!--<li><a href="">Login</a></li>-->
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
    <!-- Search Box start -->
    <form action="<?php echo base_url();?>search\find"> 
      <div class="container" style="padding-top: 57px">
            <div class="row"> 
              
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="input-group">
                        <div class="input-group-btn search-panel">
                           
                         
                           
                           <select name="section" class="form-control" id="select" style="min-width: 80px;">
                        <option value="all">All</option>
                        <option value="Banks">Banks</option>
                        <option value="clinics">Clinics</option>
                        <option value="doctors">Doctors</option>
                        <option value="embassies">Embassies</option>
                        <option value="hotels">Hotels</option>
                        <option value="restaurants">Restaurants</option>
                        <option value="societies">Societies</option>
                        <option value="lawyers">Lawyers</option>
                      </select>
                            
                        </div>
                                
                        <input type="text" class="form-control" name="term" placeholder="Search term...">
                        <span class="input-group-btn">
                            <button style="height:38px" class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            </form>
    <!-- Search box end -->
    
     <div class="container">
      <img src="<?php echo base_url();?>assets/img/new_logo.png" class="img-responsive" style="padding: 0 0 20px 0;
width: 100%;">
<!-- 
<ul class="nav nav-tabs" style="border-bottom:0; height:40px">
					
				<?php
				if ($this->uri->segment(2))
					if($this->uri->segment(2) != 'hotels' && $this->uri->segment(2) !='profile'){
				foreach($nav->result() as $row){
				?>
                  <li <?php if($this->uri->segment(2) == strtolower($row->category)){?>class="active"<?php } ?> style="font-weight: bold"><a href="<?php echo base_url().$this->uri->segment(1).'/'.$row->category;?>"><?php echo ucfirst($row->category);?></a></li>
                  <?php }
				   } ?>

</ul>-->


	 </div>
    <!--main-header-->