<?php
	$num_results = 0;
foreach($doctors as $k => $v){
		if ($k == 'num_rows' && $v > 0){
				$this->load->view('list_doctors');
				$num_results = $num_results + $v;
		} 
}

foreach($clinics as $k => $v){
		if ($k == 'num_rows' && $v > 0){
				$this->load->view('list_clinics');
				$num_results = $num_results + $v;
		}
}

foreach($embassies as $k => $v){
		if ($k == 'num_rows' && $v > 0){
				$this->load->view('list_embassies');
				$num_results = $num_results + $v;
		}
}

foreach($societies as $k => $v){
		if ($k == 'num_rows' && $v > 0){
				$this->load->view('list_societies');
				$num_results = $num_results + $v;
		}
}

foreach($restaurants as $k => $v){
		if ($k == 'num_rows' && $v > 0){
				$this->load->view('list_restaurants');
				$num_results = $num_results + $v;
		}
}

foreach($hotels as $k => $v){
		if ($k == 'num_rows' && $v > 0){
				$this->load->view('list_hotels');
				$num_results = $num_results + $v;
		}
}
	
foreach($parks as $k => $v){
		if ($k == 'num_rows' && $v > 0){
			
				$this->load->view('list_parks');
				$num_results = $num_results + $v;
		}
}
foreach($palaces as $k => $v){
		if ($k == 'num_rows' && $v > 0){
				$this->load->view('list_palaces');
				$num_results = $num_results + $v;
		}
}
foreach($attractions as $k => $v){
		if ($k == 'num_rows' && $v > 0){
				$this->load->view('list_attractions');
				$num_results = $num_results + $v;
		}
}			
foreach($museums as $k => $v){
		if ($k == 'num_rows' && $v > 0){
				$this->load->view('list_museums');
				$num_results = $num_results + $v;
		}
}			

			if ($num_results < 1){
			$this->load->view('no_results');
				}				