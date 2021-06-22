

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
          <h1><i class="fa fa-dashboard"></i>Tapper Request List</h1>
          
        </div>

      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
<?php  if($role == 'USER')
    {
      if($pr == 1){ ?>
  <form action="<?php echo base_url('user/requests'); ?>" method="post"  name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
  <table width="800" border="0">
    <tr>
      <td width="140">Details</td>
      <td width="270"><input type="text" name="details" id="txtfname" required="required" title="Details" autocomplete="off" placeholder="Enter Details" />

</td>
<td width="140">Rate/Day</td>
<td width="270"><input type="number" name="rate_day" id="txtfname" required="required" title="Rate/Day" autocomplete="off" placeholder="Enter Rate/Day" /></td>

   

       <center>
    
      <td><input type="hidden" name="pr" id="btnsave" value="3" />
        <input type="hidden" name="land" id="btnsave" value="<?php echo $land;?>" />
        <input type="submit" name="btnsignup" id="btnsave" value="Request" /></td>
      <td><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
   
   </center> </tr>
  </table>
</form>
<?php } }?>


 <div style="margin-top:60px; margin-bottom:100px;">
  <strong> <h3></h3> </strong>
  <table width="100%" border="0" id="customers">
  <tr>
  <th width="5%"><strong>ID</strong></th>
  <th width="15%"><strong> Request Info </strong></th>
  <th width="15%"><strong> Land Info  </strong></th>
  <th width="5%"><strong> Tapper Info  </strong></th>
  <th width="15%"><strong> Status </strong></th>
   <?php  if($role != 'ADMIN'){?><th width="10%"><strong>Action </strong></th><?php } ?>

  

  </tr>

    <?php foreach($requests as $key => $val){ ?>
    <tr>
<td><?php echo $val['Id']; ?></td>
<td><?php echo $val['details']."<br/>Rate/Day : ".$val['rate_day']."<br/>On - ".$val['request_date']; ?></td>
<td><?php echo "Land ID - ".$val['land_id']; ?>
  <p><?php echo "Rubber Type - ".$val['rubber_type']; ?></p>
  <p><?php echo "Area - ".$val['area']." acre"; ?></p>
  <p><?php echo "No Tree - ".$val['no_tree']." Nos"; ?></p>
</td>
<td><?php echo $val['user_name']." [# - ".$val['user_id']."]"; ?>
  <p><?php echo $val['user_mobile']; ?></p>
</td>
<td><?php echo $val['status']; 
if($val['modified_date']!="--") echo "<br/>On - ".$val['modified_date'];?></td>
<td>
   <?php  if($role == 'OWNER'){?>
    <?php  if($val['status'] != 'APPROVED'){?>
      <form name="fg" action="<?php echo base_url('user/approverequest'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['Id'];?>"/>
<input type="submit" name="ss" value="Approve"/>
      </form>
       <?php } ?>
        <?php  if($val['status'] != 'REJECTED'){?>&nbsp;&nbsp;
      <form name="fg" action="<?php echo base_url('user/rejectrequest'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['Id'];?>"/>
<input type="submit" name="ss" value="Reject"/>
      </form>
      <?php } } ?>

      <?php  if($role == 'USER' && $uid == $val['user_id']){?>
    <?php  if($val['status'] == 'APPROVED'){?> <form name="fgd" action="<?php echo base_url('user/payment'); ?>" method="post">
<input type="hidden" name="land" value="<?php echo $val['land_id'];?>"/>
<input type="hidden" name="tapper" value="<?php echo $val['user_id'];?>"/>
<input type="submit" name="ss" value="Payment"/>
      </form>
       <?php }else if($val['status'] == 'Requested'){?> <form name="fgd" action="<?php echo base_url('user/requests'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['Id'];?>"/>
<input type="submit" name="ss" value="Delete"/>
      </form>
       <?php } } ?>

</td>
    </tr>
   <?php }  ?>
  </table></center>

 </div>

 </div>
          </div>
        </div>
      </div>
    </main>


