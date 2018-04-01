
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 

	echo "<div class='div-request div-hide'>add</div>";
 // /else manage order


?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li>Order</li>
  <li class="active">
  	  		Add Order
		 </li>
</ol>


<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php
		echo "Add Order";

	?>	
</h4>



<div class="panel panel-default">
	<div class="panel-heading">

		
  		<i class="glyphicon glyphicon-plus-sign"></i>	Purchase Order
		

	</div> <!--/panel-->	
	<div class="panel-body">
			
	<div class="success-messages"></div> <!--/success-messages-->

  		<form class="form-horizontal" method="POST" action="php_action/print_purchase.php" id="printinvoice">
		  <div class="form-group"> 
					<label for="clientName" class="col-sm-2 control-label">Make Performa Invoice</label>
					<input type="checkbox"  id="pi" name="p_invoice" value="pi_true" >
				</div>
				<div class="form-group"> 
					<h4><label for="clientName" class="col-sm-2 control-label"><u>About Vendor:</u></label></h4>
					
				</div>
				<div class="form-group">
				<label class="col-sm-12 text-center">Details of Receiver | Billed to :</label>
			    <label for="clientName" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="name" name="name" placeholder="Name" autocomplete="on" />
			    </div>
				<label for="clientName" class="col-sm-2 control-label">address</label>
				 <div class="col-sm-4">
			      <input type="text" class="form-control" id="address" name="address" placeholder="address" autocomplete="on" />
			    </div>
				
			  </div> <!--/form-group-->
			  <div class="form-group">
			  <label for="clientName" class="col-sm-2 control-label">country</label>
				 <div class="col-sm-4">
			      <input type="text" class="form-control" id="country" name="country" placeholder="country" autocomplete="on" />
			    </div>
				<label for="clientName" class="col-sm-2 control-label">Contact</label>
				 <div class="col-sm-4">
			      <input type="text" class="form-control" id="contact" name="contact" placeholder="contact no" autocomplete="on" />
			    </div>
				</div>
				<div class="form-group">
				  <label for="clientName" class="col-sm-2 control-label">GSTIN</label>
					 <div class="col-sm-4">
					  <input type="text" class="form-control" id="gstin_bill" name="gstin_bill" placeholder="GSTIN" autocomplete="on" />
					</div>
				
				
				<hr><!--reciver address-->  
			  <hr><!--tansport mode-->
            </div>  <!-- <div class="form-group">  -->
							<table class="table" id="productTable">
			  	<thead>
			  		<tr>			  			
						<th style="width:20%; ">Product</th>
						<th style="width:10%; padding-left:10px;">HSN/ACS </th>
						<!-- <th style="width:5%; padding-left:10px;">UOM</th> -->
						<th style="width:5%; padding-left:50px;">Qty</th>
						<!-- <th style="width:5%; padding-left:30px;">typ</th> -->
			  			<th style="width:5%; padding-left:50px;">Rate</th>
						<th style="width:5%; padding-left:30px;">Amount</th>
						<th style="width:5%; padding-left:10px;">less</th>
						<th style="width:10%; padding-left:10px;">Taxable</th>
			  			
						<th style="width:6%; padding-left:30px;">CGST <input type="checkbox"  id="gsttrue" value="cgsttrue" ></th>
						
						<th style="width:6%; padding-left:30px;">SGST  <input type="checkbox" id="sgsttrue" value="sgsttrue"></th>
						<th style="width:6%; padding-left:30px;">IGST  <input type="checkbox" id="igsttrue" value="igsttrue"></th>			  			
			  			<th style="width:9%; padding-left:80px;">Total</th>
			  			
			  			<th style="width:3%;"></th>
			  		</tr>
			  	</thead>
			  	<tbody>
					
					
			  		<?php
			  		$arrayNumber = 0;
			  		for($x = 1; $x < 4; $x++) { ?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
			  				<!-- <td style="margin-left:20px;">
			  					<div class="form-group">

			  					<select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
			  						<option value="">~~SELECT~~</option>
			  						//<?php
			  						//$productSql = "SELECT * FROM product WHERE active = 1 AND status = 1 AND quantity > 0";
			  					//	$productData = $connect->query($productSql);

			  						//	while($row = $productData->fetch_array()) {									 		
			  							//	echo "<option value='".$row['product_id']."' id='changeProduct".$row['product_id']."'>".$row['product_name']."</option>";
										 //	} 

			  						?>
		  						</select>
			  					</div>
			  				</td> -->
							  <td style="padding-left:28px;">
			  					<div class="form-group">
			  					<input type="text" name="product" id="product" autocomplete="off" class="form-control" />
			  					</div>
			  				</td>
							<td style="padding-left:28px;">
			  					<div class="form-group">
			  					<input type="number" name="hsnacs[]" id="hsnacs<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
							<!-- <td style="padding-left:28px;">
			  					<div class="form-group">
			  					<input type="text" name="uom[]" id="uom<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td> -->
							<td style="padding-left:28px;">
			  					<div class="form-group">
			  					<input type="number" name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
							<!-- <td style="padding-left:28px;">
			  					<div class="form-group">

			  					<select class="form-control" name="rates[]" id="rates<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
			  						<option value="r">R</option>
									<option value="d">D</option>
									<option value="s">S</option>
			  						
		  						</select>
			  					</div>
			  				</td>  -->
													
			  				<td style="padding-left:18px;">			  					
			  					<input type="text" name="rate[]" id="rate<?php echo $x; ?>" autocomplete="off" disabled="true" class="form-control" />			  					
			  					<input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
			  				</td>
							<td style="padding-left:18px;">
			  					<div class="form-group">
			  					<input type="text" name="amount[]" id="amount<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
							<td style="padding-left:28px;">
			  					<div class="form-group">
			  					<input type="text" name="less[]" id="less<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
							<td style="padding-left:25px;">
			  					<div class="form-group">
			  					<input type="text" name="taxable[]" id="taxable<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" disabled="true" autocomplete="off" class="form-control" min="1" />
								<input type="hidden" name="taxablevalue[]" id="taxablevalue<?php echo $x; ?>" autocomplete="off" class="form-control" />
								</div>
			  				</td>
							
			  				
							<td style="padding-left:28px;">
			  					<div class="form-group">
			  					<input type="text" name="cgst[]" id="cgst<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
							<td style="padding-left:28px;">
			  					<div class="form-group">
			  					<input type="text" name="sgst[]" id="sgst<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
							<td style="padding-left:28px;">
			  					<div class="form-group">
			  					<input type="text" name="igst[]" id="igst<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
			  				<td style="padding-left:20px;">			  					
			  					<input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" disabled="true" />			  					
			  					<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
			  				</td>
			  				<td>

			  					<button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
			  				</td>
			  			</tr>
		  			<?php
		  			$arrayNumber++;
			  		} // /for
			  		?>
			  	</tbody>			  	
			  </table>
				<div class="form-group submitButtonFooter">
			    <div class="col-sm-offset-2 col-sm-10">
			    <button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>

			      <button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>

			      <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
			    </div>
			  </div>
		
				</div> <!--/panel-->	
</div> <!--/panel-->	

				
			


<script src="custom/js/printinvoice.js"></script>
<script src="custom/js/invoice.js"></script>
<?php require_once 'includes/footer.php'; ?>


	