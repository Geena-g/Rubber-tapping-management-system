


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
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Land List</h1>
          
        </div>

      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">

<?php  if($role == 'OWNER')
    {?>
  <form action="<?php echo base_url('land/newland'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="800" border="0">
    <tr>
      <td width="140">Place</td>
      <td width="270">
<select name="place">
<?php foreach($place as $key => $val){ ?>
<option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
<?php } ?>
</select>
</td>
<td width="140">Area</td>
<td width="270"><input type="number" name="area" id="txtfname" required="required" title="Acre" autocomplete="off" placeholder="Enter Area" /></td>
<td width="140">Rubber Type</td>
<td width="270"><input type="text" name="rtype" id="txtfname" required="required" title="Rubber Type" autocomplete="off" placeholder="Enter Rubber Type" /></td>
    </tr>
    <tr>
          <td width="140">Landmark</td>
          <td width="270">
   <input type="text" name="landmark" id="txtfname" required="required" title="Landmark" autocomplete="off" placeholder="Enter Landmark" />
    </td>
    <td width="140">No of Tress</td>
    <td width="270"><input type="number" name="no_tree" id="txtfname" required="required" title="No Trees" autocomplete="off" placeholder="Enter No Trees" /></td>
       <center>
    
      <td><input type="submit" name="btnsignup" id="btnsave" value="Save" /></td>
      <td><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
   
   </center> </tr>
  </table>
</form>
<?php } ?>


 <div style="margin-top:60px; margin-bottom:100px;">
  <strong> <h3></h3></strong>
  <table width="600px" border="0" id="customers">
  <tr>
  <th>ID</th>
  <th> User </th>
  <th> Place  </th>
  <th> Area  </th>
  <th> Landmark </th>
<th> No.Trees </th>
<th> Rubber Type </th>
  <th>Action</th>
  

  </tr>
    <?php foreach($land as $key => $val){ ?>
    <tr>
<td><?php echo $val['id']; ?></td>
<td><?php echo $val['user']; ?><p><?php echo $val['address']; ?></p><p><?php echo "Mob - ".$val['user_mobile']; ?></p></td>
<td><?php echo $val['place_name']; ?></td>
<td><?php echo $val['area']; ?></td>
<td><?php echo $val['landmark']; ?></td>
<td><?php echo $val['no_tree']; ?></td>
<td><?php echo $val['rubber_type']; ?></td>
     <td>
  <?php  if($uid == $val['userid']){?>
      <form name="fg" action="<?php echo base_url('land/deleteland'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Delete"/>
      </form>
      <form name="fgfg" action="<?php echo base_url('user/tapper'); ?>" method="post">
<input type="hidden" name="land" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Tappers"/>
      </form>
      <?php } ?>
       <?php  if($role == 'USER'){?>
      <form name="fgd" action="<?php echo base_url('user/requests'); ?>" method="post">
<input type="hidden" name="land" value="<?php echo $val['id'];?>"/>
<input type="hidden" name="pr" value="1"/>
<input type="submit" name="ss" value="Requests"/>
      </form>
       <?php } ?>
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


