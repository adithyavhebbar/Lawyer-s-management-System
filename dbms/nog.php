<?php
include('config.php');
$sql="CALL nog()";
$result=$db->query($sql);
$rows=$result->num_rows;
for ($j = 0 ;$j < $rows ; ++$j)
	{
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		for ($k = 0; $k < 1; ++$k)
		{	
			$count=$row[$k];
		}
	}
	$count=--$count;
	echo "<SCRIPT>
alert('Total number of cleints rwgistered to this website=$count');
window.location='guest.php';
</SCRIPT>"

?>