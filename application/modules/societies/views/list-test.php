  89
            <?php
            foreach($query->result() as $row){
                            echo  '<a href="'.base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/profile/'.ltrim($row->id, '0000000').'-'.str_replace(' ', '-', preg_replace("/[^a-z0-9\\040\\.\\-\\_\\\]/i","-",$row->name)).'"><h4>'.$row->name.'</h4></a>';
                            
                            if($row->telephone) echo '<strong>Tel:</strong> <a href="tel: +44'.ltrim($row->telephone, '0').'"> '.$row->telephone.'</a>';	
            
                            echo '<hr>';
                                    }
                
                
            echo '</div>';
?>
</div>
    <div class="col-lg-1" style="width:5%"></div>
    <div class="col-lg-3 panel">
		<div class="container" style="min-height:600px">Advertisments</div>
    </div>
</div>			