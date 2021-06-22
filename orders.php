



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
          <h1><i class="fa fa-dashboard"></i>Orders</h1>
          
        </div>

      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
<?php  if($pr==1) { ?>
  <form action="<?php echo base_url('product/orders'); ?>" method="post"  name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="100%" border="0">
    <tr>
 <center><b>New Order Info</b></center><br><br>
  </tr>
    <tr>
      <td >Name & Address</td>
      <td ><input type="text" name="address" id="txtfname" required="required" title="Name & Address" autocomplete="off" placeholder="Name & Address" /></td>
   
      <td >Order Qty</td>
      <td ><input type="number" name="qty" required="required" title="Order Qty" autocomplete="off" placeholder="Enter Order Qty" /></td>

      <td >Mobile</td>
      <td ><input type="tel" name="mobile" id="txtfname" required="required" title="Mobile" autocomplete="off" placeholder="Mobile" /></td>
  
      <td>
        <input type="hidden" name="pr"  value="2" />
        <input type="hidden" name="product"  value="<?php echo $product_id; ?>" />
        <input type="hidden" name="rate"  value="<?php echo $product_rate; ?>" />
        <input type="submit" name="btnsignup" id="btnsave" value="Save" />
      </td>
      <td><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
   
 </tr>
  </table>
</form>
<?php } ?>


  <form action="<?php echo base_url('product/orders'); ?>" method="post"  name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="100%" border="0">
    <tr>
 <center><b>Search Order Info</b></center><br><br>
  </tr>
    <tr>
      <td >Mobile</td>
      <td ><input type="tel" name="mobile" id="txtfname" required="required" title="Mobile" autocomplete="off" placeholder="Mobile" /></td>
  
      <td>
        <input type="hidden" name="pr"  value="3" />
       
        <input type="submit" name="btnsignup" id="btnsave" value="Search" />
      </td>   
 </tr>
  </table>
</form>



 <div style="margin-top:60px; margin-bottom:100px;">
  
  <table width="600px" border="0"  id="customers">
  <tr>
    <td colspan="8">
 <center><b></b></center><div style="float: right;"><a id="oo" href="<?php echo base_url('product'); ?>"><strong><h4>Products</h4></strong></a></div><br/>
 </td> </tr>
  <tr>

  <th>ID</th>
  <th>Name & Address</th>
  <th>Mobile</th>
  <th>Product Info</th>
  <th>Qty</th>
  <th>Order Date</th>
  <th>Status</th>
  <th>Action</th>
</td>

  </tr>
    <?php foreach($orders as $key => $val){ ?>
    <tr>
<td><?php echo $val['Id']; ?></td>
<td><?php echo $val['address']; ?></td>
<td><?php echo $val['mobile']; ?></td>
<td><img src="<?php echo base_url(); ?>/<?php echo $val['image']; ?>" width="100px" height="100px"/>
<p><?php echo $val['product_name']; ?></p>
<p><?php echo "Rs. ".$val['rate']; ?></p>
</td>
<td><?php echo $val['qty']; ?></td>
<td><?php echo $val['order_date']; ?></td>
<td><?php echo $val['status']; ?> </td>
     <td>
  <?php  if($this->session->userdata('role') == 'OWNER'){
    if($this->session->userdata('user_id') == $val['owner']){
      ?>
      <form name="fg" action="<?php echo base_url('product/orders'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['Id'];?>"/>
<input type="hidden" name="pr" value="4"/>
<input type="text" name="status" placeholder="Status Update"/>
<input type="submit" name="ss" value="Update"/>
      </form>
      <?php } }else{
        ?>
        <form name="fg" action="<?php echo base_url('product/orders'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['Id'];?>"/>
<input type="hidden" name="pr" value="5"/>
<input type="hidden" name="mobile" value="<?php echo $val['mobile'];?>"/>
<input type="submit" name="ss" value="Delete"/>
      </form>
      <?php
      } ?>
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

