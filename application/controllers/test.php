<!-- <?php 

for ($i=10; $i < 20 ; $i++) 
{ 
	echo $i;
}

 ?>

<?php 
$i = 1;
while ( $i == 10) {
	# code...
}
  ?> -->

 <!--  <?php
    echo"<tr >";
    for($i=0;$i<=10;$i++)
    {
      if($i==0)
        echo"<td width='40' align='center' >X</td>";
      else
        echo"<td bgcolor='green' width='40' align='center'>$i</td>";
    }
    echo"</tr>";
    for($j=1;$j<=10;$j++)
    {
      if($j%2==0)
        echo"<tr bgcolor='yellow' align='center'><td bgcolor='gray'>$j</td>";
      else
        echo"<tr bgcolor='chocolate' align='center'><td bgcolor='gray'>$j</td>";
      for($k=1;$k<=10;$k++)
      {
        $result=$j * $k;
        echo"<td>$result</td>";
      }
      echo"</tr>";
    }
?> -->


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1pt" align="center">
		<tbody>
			<?php for ($col=1; $col <=10 ; $col++) : ?>
					<tr>
						<?php for ($row=1; $row <=10 ; $row++) : ?>
							<td><?php echo "{$col}x{$row} =  ".($col * $row); ?></td>
						<?php endfor; ?>
					</tr>
			<?php endfor; ?>
		</tbody>
	</table>
</body>
</html>