<?php
include('config.php');
$sql="CALL noc()";
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
	echo "<SCRIPT>
alert('Total number of cases=$count');
window.location='guest.php';
</SCRIPT>"

?>