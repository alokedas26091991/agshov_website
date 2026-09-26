<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Order Tracking</h2>

<table>
  <tr>
    <th>Details</th>

  </tr>
    <?php
				
    if(isset($track->error)){
        
    ?>
  <tr>
    <td><?= $track->error ?></td>

  </tr>
  <?php }elseif(isset($track->data)){ 
  $data=$track->data;
  
  ?>
  <tr><table><tr><td>carrierName</td><td><?=$data->carrierName?></td></tr></table></tr>
  <tr><table>
  <?php foreach($data->events as $e){?>
  <tr><td><?=$e->status?></td><td><?=$e->Remarks?></td> <td><?=$e->Location?></td><td><?=$e->Time?></td></tr><?php }?></table></tr>
  <?php } ?>
	
</table>

</body>
</html>
