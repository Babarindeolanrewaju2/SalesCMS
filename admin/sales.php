<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sales
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Sales</li>
        <li class="active">All Sales</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible' id='zaba'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible' id='zaba'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>Add New</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Date</th>
                  <th>OID</th>
                  <th>PID</th>
                  <th>Category</th>
                  <th>Unit Price</th>
                  <th>Qty</th>
                  <th>Sales</th>
                  <th>Sold By</th>
                  <th>Location</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM orders LEFT JOIN products ON products.product_id = orders.product_id
                            LEFT JOIN city ON city.city_id = orders.city_id
                            LEFT JOIN product_category ON product_category.cat_id = products.cat_id
                            LEFT JOIN admin ON admin.id = orders.user_id";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){

                      ?>
                        <tr>
                          <td><?= $row['order_date']; ?></td>
                          <td><?= $row['order_id']; ?></td>
                          <td><?= $row['product_id']; ?></td>
                          <td><?= $row['cat_name']; ?></td>
                          <td><?= $row['unit_price']; ?></td>
                          <td><?= $row['qty']; ?></td>
                          <td><?= $row['total']; ?></td>
                          <td><?= $row['username']; ?></td>
                          <td><?= $row['city_name']; ?></td>
                          <td>
                          <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['order_id']; ?>"><i class="fa fa-trash"></i> Delete</button>
                          </td>
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/sales_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'sales_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.order_id);
      $('.order_id').val(response.order_id).html(response.order_id);
      $('.del_orders_name').html(response.order_id);
      $('#edit_qty').val(response.qty);
      $('#edit_unit_price').val(response.unit_price);
      $('#cat_val').val(response.cat_id).html(response.cat_name);
    }
  });
}
</script>
<script>
$(document).ready(function(){
    $('#product_id').change(function(e){
        e.preventDefault();
            var product_id = $(this).val();        
            
            $.ajax({
            type: 'POST',
            url: 'fetch.php',
            data: {product_id:product_id},
            dataType: 'json',
            success: function(response){
                $('#cat_id').val(response.cat_id);
                $('#unit_price').val(response.selling_price);
                $('#cost_price').val(response.cost_price);
            }
        });
    });
});

</script>
</body>
</html>