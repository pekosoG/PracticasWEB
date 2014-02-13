<?php
	for($i=1;$i<=12;$i++){
		echo "Tabla del $i".'</br>----------------</br>';
		for($j=1;$j<=10;$j++){
			$k=$i*$j;
			echo "{$i}x{$j}={$k}".'</br>';
		}
		echo '</br>';
	}
?>
