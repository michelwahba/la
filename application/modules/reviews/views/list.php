<h2>Leave a review</h2>

<?php
foreach($query->result() as $row){
		echo  $row->content;
		echo '<hr>';
		}
    
    
