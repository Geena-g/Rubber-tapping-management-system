



<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<style>
#oo:link, #oo:visited {
  background-color: white;
  color: green;
  border: 2px solid green;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

#oo:hover, #oo:active {
  background-color: green;
  color: white;
}
</style>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Products List</h1>
          
        </div>

      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
<?php  if($this->session->userdata('role')!=null){if($this->session->userdata('role') == 'OWNER'){?>
  <form action="<?php echo base_url('product/newproduct'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="100%" border="0">
    <tr>
 <center><b>New Product Info</b></center><br><br>
  </tr>
    <tr>
      <td >Product Name</td>
      <td ><input type="text" name="pname" id="txtfname" required="required" title="Product Name" autocomplete="off" placeholder="Enter Product Name" /></td>
   
      <td >Product Rate</td>
      <td ><input type="number" name="prate" id="txtfname" required="required" title="Product Rate" autocomplete="off" placeholder="Enter Product Rate" /></td>

      <td >Product In Stock</td>
      <td ><input type="number" name="pinstock" id="txtfname" required="required" title="Product In Stock Qty" autocomplete="off" placeholder="Enter Product In Stock Qty" /></td>
  
      <td >Product Image</td>
      <td ><input type="file" name="pimage" id="txtfname" required="required" title="Product Image" autocomplete="off" placeholder="Enter Product Image" /></td>

    
      <td><input type="submit" name="btnsignup" id="btnsave" value="Save" /></td>
      <td><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
   
 </tr>
  </table>
</form>
<?php } } ?>


 <div style="margin-top:60px; margin-bottom:100px;">
  
  <table width="600px" border="0"  id="customers">
  <tr>
    <td colspan="7">
 <center><b></b></center><div style="float: right;"><a id="oo" href="<?php echo base_url('product/orders'); ?>"><strong><h4>Orders</h4></strong></a></div><br/>
 </td> </tr>
  <tr>

  <th>ID</th>
  <th>Contact Info</th>
  <th>Name</th>
  <th>Rate</th>
  <th>In Stock</th>
  <th>Image</th>
  <th>Action</th>
</td>

  </tr>
    <?php foreach($product as $key => $val){ ?>
    <tr>
<td><?php echo $val['Id']; ?></td>
<td><?php echo $val['user_name']; ?>
  <p><?php echo $val['address']; ?></p>
  <p>Mob: <?php echo $val['user_mobile']; ?></p>
</td>
<td><?php echo $val['product_name']; ?></td>
<td><?php echo $val['rate']; ?></td>
<td><?php echo $val['instock']; ?></td>
<td><img src="<?php echo base_url(); ?>/<?php echo $val['image']; ?>" width="100px" height="100px"/></td>
     <td>
  <?php  if($this->session->userdata('role') == 'OWNER'){
    if($this->session->userdata('user_id') == $val['owner']){
      ?>
      <form name="fg" action="<?php echo base_url('product/deleteproduct'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['Id'];?>"/>
<input type="submit" name="ss" value="Delete"/>&nbsp;&nbsp;
      </form>
      <?php } } ?>
      <form name="fg" action="<?php echo base_url('product/orders'); ?>" method="post">
<input type="hidden" name="product" value="<?php echo $val['Id'];?>"/>
<input type="hidden" name="rate" value="<?php echo $val['rate'];?>"/>
<input type="hidden" name="pr" value="1"/>
<input type="submit" name="ss" value="Order Request"/>
      </form>
    </td>
    
    </tr>
   <?php } ?>
  </table></center>

 </div>

 </div>
          </div>
        </div>
      </div>
    </main>

