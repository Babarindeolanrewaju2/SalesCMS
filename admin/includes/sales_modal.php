<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add New Sales</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="sales_add.php">
                <div class="form-group">
                  <label for="class" class="col-sm-3 control-label">Select Product</label>

                  <div class="col-sm-9">
                    <select class="form-control" name="product_id" id="product_id">
                    <option selected>-- Select --</option>
                    <?php
                      $sql = "SELECT * FROM products";
                      $query = $conn->query($sql);
                      while($prow = $query->fetch_assoc()){
                      echo "
                        <option value='".$prow['product_id']."'>".$prow['product_name']."</option>
                      ";
                      }
                    ?>
                    </select>
                  </div>
                </div>
                <input type="hidden" class="form-control" id="cat_id" name="cat_id" required>
                <input type="hidden" class="form-control" id="cost_price" name="cost_price" required>
                <div class="form-group">
                  	<label for="unit_price" class="col-sm-3 control-label">Unit Price</label>

                  	<div class="col-sm-9">
                    	<input type="number" class="form-control" id="unit_price" name="unit_price">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="selling_price" class="col-sm-3 control-label">Quantity</label>

                  	<div class="col-sm-9">
                      <input type="number" class="form-control" name="qty" id="qty" onKeyup="OnChange(this.qty)" value="1" min="1" max="100" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="total" class="col-sm-3 control-label">Total</label>

                  	<div class="col-sm-9">
                      <input type="number" class="form-control" name="total" id="total" required>
                  	</div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="product_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="product_edit.php">
            		<input type="hidden" class="id" name="id">
                <div class="form-group">
                  <label for="class" class="col-sm-3 control-label">Category</label>

                  <div class="col-sm-9">
                    <select class="form-control" name="cat_id" id="cat_id">
                    <option selected id="cat_val">-- Select --</option>
                    <?php
                      $sql = "SELECT * FROM product_category";
                      $query = $conn->query($sql);
                      while($prow = $query->fetch_assoc()){
                      echo "
                        <option value='".$prow['cat_id']."'>".$prow['cat_name']."</option>
                      ";
                      }
                    ?>
                    </select>
                  </div>
                </div>
          		  <div class="form-group">
                  	<label for="product_name" class="col-sm-3 control-label">Product Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_product_name" name="product_name" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="edit_cost_price" class="col-sm-3 control-label">Cost Price</label>

                  	<div class="col-sm-9">
                    	<input type="number" class="form-control" id="edit_cost_price" name="cost_price" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="selling_price" class="col-sm-3 control-label">Selling Price</label>

                  	<div class="col-sm-9">
                      <input type="number" class="form-control" name="selling_price" id="edit_selling_price" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="datepicker_add" class="col-sm-3 control-label">Expire Date</label>

                  	<div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control expire_date" id="datepicker_edit" name="expire_date">
                      </div>
                  	</div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="order_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="sales_delete.php">
            		<input type="hidden" class="id" name="id">
            		<div class="text-center">
	                	<p>DELETE ORDER</p>
	                	<h2 class="bold del_orders_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<script type="text/javascript" language="Javascript">
	
    function OnChange(qty){
	var p=document.getElementById('unit_price').value;
	var q=document.getElementById('qty').value;
	var r=0;
	var r=p*q;
	total.value=parseFloat(r);
	
	}
</script>