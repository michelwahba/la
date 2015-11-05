<h6><strong>Bussines Classifications</strong></h6>

    <?php
    foreach($query->result() as $row){
        echo $row->classification .'<br />';  
	}
        ?>