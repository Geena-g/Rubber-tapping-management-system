



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
          <h1><i class="fa fa-dashboard"></i>Search</h1>
          
        </div>

      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
<form action="<?php echo base_url('search'); ?>" method="post"  name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="100%" border="0">
    <tr>
 <center><b>Search Details</b></center><br><br>
  </tr>
    <tr>
      <td >Keyword</td>
      <td ><input type="tel" name="keyword" id="txtfname" required="required" title="Keyword" autocomplete="off" placeholder="Search Keyword." /></td>
      <td >
        <input type="radio" name="option" value="TAPPER" checked="checked" />&nbsp;TAPPER&nbsp;&nbsp;
        <input type="radio" name="option" value="OWNER"  />&nbsp;OWNER&nbsp;&nbsp;
        <input type="radio" name="option" value="LAND" />&nbsp;LAND&nbsp;&nbsp;
        <input type="radio" name="option" value="PRODUCT" />&nbsp;PRODUCT&nbsp;&nbsp;
      </td>
      <td>
        
       
        <input type="submit" name="btnsignup" id="btnsave" value="Search" />
      </td>   
 </tr>
  </table>
</form>



 <?php if($option == "OWNER"){
  ?>
  <div style="margin-top:60px; margin-bottom:100px;">
  <strong> Land Owner List - <?php echo $keyword;?></strong>
  <table width="100%" border="0" id="customers">
  <tr>
  <th width="5%"><strong>ID</strong></th>
  <th width="15%"><strong> Name </strong></th>
  <th width="15%"><strong> Email  </strong></th>
  <th width="5%"><strong> Gender  </strong></th>
  <th width="15%"><strong> Mobile </strong></th>
  <th width="5%"><strong> Address  </strong></th>
  <th width="15%"><strong> Aadhar No </strong></th>
  
  

  </tr>

    <?php foreach($results as $key => $val){ ?>
    <tr>
<td><?php echo $val['user_id']; ?></td>
<td><?php echo $val['user_name']; ?></td>
<td><?php echo $val['user_email']; ?></td>
<td><?php echo $val['gender']; ?></td>
<td><?php echo $val['user_mobile']; ?></td>
<td><?php echo $val['address']; ?></td>
<td><?php echo $val['aadharno']; ?></td>
</tr>
   <?php }  ?>
  </table></center>

 </div>
  <?php
 }?>

 <?php if($option == "TAPPER"){
  ?>
  <div style="margin-top:60px; margin-bottom:100px;">
  <strong> Tapper List - <?php echo $keyword;?></strong>
  <table width="100%" border="0" id="customers">
  <tr>
  <th width="5%"><strong>ID</strong></th>
  <th width="15%"><strong> Name </strong></th>
  <th width="15%"><strong> Email  </strong></th>
  <th width="5%"><strong> Gender  </strong></th>
  <th width="15%"><strong> Mobile </strong></th>
  <th width="5%"><strong> Address  </strong></th>
  <th width="15%"><strong> Aadhar No </strong></th>
  
  

  </tr>

    <?php foreach($results as $key => $val){ ?>
    <tr>
<td><?php echo $val['user_id']; ?></td>
<td><?php echo $val['user_name']; ?></td>
<td><?php echo $val['user_email']; ?></td>
<td><?php echo $val['gender']; ?></td>
<td><?php echo $val['user_mobile']; ?></td>
<td><?php echo $val['address']; ?></td>
<td><?php echo $val['aadharno']; ?></td>
</tr>
   <?php }  ?>
  </table></center>

 </div>
  <?php
 }?>

<?php if($option == "LAND"){ ?>

 <div style="margin-top:60px; margin-bottom:100px;">
  <strong> Land List - <?php echo $keyword;?></strong>
  <table width="600px" border="0" id="customers">
  <tr>
  <th>ID</th>
  <th> User </th>
  <th> Place  </th>
  <th> Area  </th>
  <th> Landmark </th>
  <th> No.Trees </th>
  <th> Rubber Type </th>
  </tr>
    <?php foreach($results as $key => $val){ ?>
    <tr>
<td><?php echo $val['id']; ?></td>
<td><?php echo $val['user_name']; ?><p><?php echo $val['address']; ?></p><p><?php echo "Mob - ".$val['user_mobile']; ?></p></td>
<td><?php echo $val['place_name']; ?></td>
<td><?php echo $val['area']; ?></td>
<td><?php echo $val['landmark']; ?></td>
<td><?php echo $val['no_tree']; ?></td>
<td><?php echo $val['rubber_type']; ?></td>
</tr>
   <?php } ?>
  </table></center>

 </div>

<?php } ?>

<?php if($option == "PRODUCT"){ ?>
  <div style="margin-top:60px; margin-bottom:100px;">
  
  <table width="600px" border="0"  id="customers">
  <tr>
    <td colspan="7">
 <center><b>Products List</b></center><br/>
 </td> </tr>
  <tr>

  <th>ID</th>
  <th>Contact Info</th>
  <th>Name</th>
  <th>Rate</th>
  <th>In Stock</th>
  <th>Image</th>
</td>

  </tr>
    <?php foreach($results as $key => $val){ ?>
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
     
    
    </tr>
   <?php } ?>
  </table></center>

 </div>

<?php } ?>


</div>
          </div>
        </div>
      </div>
    </main>
