  <!-- Modal -->


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<?php	foreach ($invoice1 as $inv1): ?> 
  <div class="modal fade" id="abc<?= $inv1->id ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 style="text-align:left;">Order Details</h4>
        </div>
        <div class="modal-body">
         <table class="table table-bordered">
			<tr>
			  <th>Product Name</th>
			  <th>Product Image</th>
			  <th>Quantity</th>
			 
			  <th>Price</th>
			</tr>
			  	<?php	foreach ($Invoice_Item1 as $inv_item): ?> 
				
			<tr>
			<td><?= $Product1->name ?></td>
			<td>  <img src="<?php echo $this->Url->image("upload/product/$Product1->photo", ['pathPrefix' => '']) ?>" alt="product" height="50" width="50"></td>
			<td>1</td>
			<td><?= $inv_item->item_net_amount ?></td>
			
		
			</tr>
			 <?php endforeach; ?>
		 </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <?php endforeach; ?>
 <!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                       
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index.html"></a>
                            </li>
                         
                        </ul>

                    </div>
                </div>
            </div>
        </div>

         <div id="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
					
					<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Profile</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Order Details</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo1')"><a href="<?php echo $this->Url->build("/Login/logout");?>" ONCLICK = "javascript: return confirm( ' Are you sure you want to Logout?');">Logout</a></button>
</div>
<div id="London" class="tabcontent">
<div class="box">
</br>
<h2 class="text-uppercase">Account Details</h2>
		<?= $this->Form->create($user1, [
	'url' => ['controller' => 'Login', 'action' => 'myaccount'],'id'=>'registerForm'
]); ?>
			<div class="form-group">
				<label for="name-login">Name</label>
				<?= $this->Form->input('first_name', [
		'placeholder'=>"name","required"=>"required","class" =>"form-control",'label'=>false,'id'=>'first_name'
		]);?>
			</div>
			
			<div class="form-group">
				<label for="email-login">Phone</label>
				<?= $this->Form->input('mobile', [
		'placeholder'=>"Phone Number","type"=>"tel","required"=>"required",'label'=>false,"class" =>"form-control",'id'=>'mobile'
		]);?>
				
			</div>
			
			<div class="form-group">
				<label for="email-login">Email</label>
			   <?= $this->Form->input('email', [
		'placeholder'=>"Email","type"=>"email","required"=>"required",'label'=>false,"class" =>"form-control",'id'=>'email_id'
		]);?>
				
			</div>
			<div class="form-group">
				<label for="password-login">Country</label>
			   
				<?= $this->Form->input('country', [
		'placeholder'=>"Country","type"=>"country","class" =>"form-control","required"=>"required",'label'=>false
		]);?>
			</div>
			 <div class="form-group">
				<label for="password-login">State</label>
			   
				<?= $this->Form->input('state', [
		'placeholder'=>"State","type"=>"state","class" =>"form-control","required"=>"required",'label'=>false
		]);?>
			</div>
			 <div class="form-group">
				<label for="password-login">City</label>
			   
				<?= $this->Form->input('city', [
		'placeholder'=>"City","type"=>"city","class" =>"form-control","required"=>"required",'label'=>false
		]);?>
			</div>
			 <div class="form-group">
				<label for="password-login">Pin</label>
			   
				<?= $this->Form->input('pin', [
		'placeholder'=>"Pin","type"=>"pin","class" =>"form-control","required"=>"required",'label'=>false
		]);?>
			</div>
			 <div class="form-group">
				<label for="password-login">Alternate No</label>
			   
				<?= $this->Form->input('alternate_phone', [
		'placeholder'=>"Alternate No","type"=>"alternate_phone","class" =>"form-control","required"=>"required",'label'=>false
		]);?>
			</div>
			 <div class="form-group">
				<label for="password-login">Address1</label>
			   
				<?= $this->Form->input('address1', [
		'placeholder'=>"Address1","type"=>"address","class" =>"form-control","required"=>"required",'label'=>false
		]);?>
			</div>
				 <div class="form-group">
				<label for="password-login">Address2</label>
			   
				<?= $this->Form->input('address2', [
		'placeholder'=>"Address2","type"=>"address","class" =>"form-control","required"=>"required",'label'=>false
		]);?>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Submit</button>
			</div>
		<?=$this->Form->end();?>
	</div>
</div>	
<div id="Tokyo" class="tabcontent">
</br>
  <h3>Order List</h3>
                  <table id="sampleTable" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>SL NO</th>
                     
                      <th>Order Date</th>
                      <th>Invoice No</th>
                      <th>Order ID</th>
					  <th>Invoice Amount</th>
					  <th>Payment Mode</th>
					  <th>Order Status</th>
					  <th>Action</th>
                    </tr>
                  </thead>
        <tbody>
        <?php 
		$c=1;
		foreach ($invoice1 as $inv): 
		if($inv->order_status==0)
		{
			$a="Processing";
		}
		else if($inv->order_status==1)
		{
			$a="On Hold";
		}
		else if($inv->order_status==2)
		{
			$a="Completed";
		}
		else
		{
			$a="Cancelled";
		}
		?>
            <tr>
                <td><?= $c ?></td>
                <td><?= $inv->creation_date ?></td>
				<td><?= $this->Number->format($inv->id) ?></td>
               <td><?= $inv->order_id ?></td>
			   <td><?= $inv->net_amt ?></td>
			   <td>COD</td>
			   <td><?= $a ?></td>
                    <td class="actions">
					 <button type="button" class="fa fa-edit" data-toggle="modal" data-target="#abc<?= $inv->id ?>" title="Order Details"></button>
                 
                    
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Order Cancell') . '</span>', ['controller'=>'Carts','action' => 'cancell', $inv->id], ['confirm' => __('Are you sure you want to Cancell this Order ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Cancell Order')]) ?>
                </td>
            </tr>

        <?php $c++;
		endforeach; ?>
        </tbody>
                </table>
</div>	

					
					
					
                        
                    </div>

                  

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
<?php echo $this->Html->script([ 'angular.min', '/site/js/registration'], ['block' => 'scriptBottom']) ?>
		
<style>
/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #08c;
  width: 30%;
  height: 100%;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 100%;
}
</style>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>	


