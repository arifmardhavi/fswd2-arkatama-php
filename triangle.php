<?php 

	function upleft($value = '*', $rows = 5)
	{
		for ($i=1; $i <= $rows; $i++) { 
			for ($j=1; $j <= $i; $j++) { 
				echo $value;
			}
			echo '<br>';
		}
		echo '<br>';
	}

	function upright($value = '*', $rows = 5)
	{
		for ($i=1; $i <= $rows; $i++) { 
			for ($j=$rows; $j > $i; $j-=1) { 
				echo '&nbsp';
			}

			for ($k=1; $k <= $i; $k++) { 
				echo $value;
			}
			echo '<br>';
		}
		echo '<br>';
	}

	function downleft($value = '*', $rows = 5 )
	{
		for ($i = $rows; $i >= 1 ; $i--) { 
			for ($j=1; $j <= $i ; $j++) { 
				echo $value;
			}
			echo '<br>';
		}
		echo '<br>';
	}

	function downright($value = '*', $rows = 5 )
	{
		for ($i=1; $i <= $rows; $i++) { 
			for ($j=1; $j < $i; $j++) { 
				echo '&nbsp';
			}

			for ($k=$rows; $k >= $i; $k -= 1) { 
				echo $value;
			}

			echo '<br>';
		}
			
	}

	function pattern($value='all')
	{
		if ($value == 'all') {
			upleft();
			upright();
			downleft();
			downright();
		}else if($value == 'upleft'){
			upleft();
		}else if($value == 'upright'){
			upright();
		}else if($value == 'downleft'){
			downleft();
		}else if($value == 'downright'){
			downright();
		}else{
			echo "No Selected Triangle";
		}
	}

	pattern();

	// upleft();
	// upright();
	// downleft();
	// downright();

?>