<style type="text/css">
	td,th {
		text-align: center;
	}
</style>
<table class="table table-bordered ">
	<thead>
		<tr>
			<th>NO. </th>
			<th>JENIS KERUSAKAN </th>
  

			<th>JUMLAH </th>
		</tr>
		 
	</thead>
	<tbody>
		<?php 
		$n=0; $total = 0;
		 
		foreach($records->result() as $row) : 
			$n++;

			$total += $row->jumlah
			 
 		?>

		<tr>
			<td><?php echo $n; ?></td>
			<td><?php echo $row->kerusakan; ?></td>
			<td><?php echo $row->jumlah; ?></td>
			 

		</tr>

	<?php endforeach; ?>
	</tbody>
	 <tr>
	 	<td colspan="2"><STRONG>JUMLAH</STRONG></td>
	 	<td><STRONG><?php echo $total; ?></STRONG></td>
 	 	</tr>
</table>