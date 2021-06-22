

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
          <h1><i class="fa fa-dashboard"></i>Tapper List</h1>
          
        </div>

      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
 <div style="margin-top:60px; margin-bottom:100px;">
  <strong> <h3></h3></strong>
  <table width="100%" border="0" id="customers">
  <tr>
  <th ><strong>ID</strong></th>
  <th ><strong> Name </strong></th>
  <th ><strong> Email  </strong></th>
  <th ><strong> Gender  </strong></th>
  <th ><strong> Mobile </strong></th>
  <th ><strong> Address  </strong></th>
  <th ><strong> Aadhar No </strong></th>
<?php  if($role == 'OWNER'){?>
  <th> Rate/Day</th>
  <th>Action</th>
<?php } ?>
  

  </tr>

    <?php foreach($user as $key => $val){ ?>
    <tr>
<td><?php echo $val['user_id']; ?></td>
<td><?php echo $val['user_name']; ?></td>
<td><?php echo $val['user_email']; ?></td>
<td><?php echo $val['gender']; ?></td>
<td><?php echo $val['user_mobile']; ?></td>
<td><?php echo $val['address']; ?></td>
<td><?php echo $val['aadharno']; ?></td>
    <?php  if($role == 'OWNER'){?>
  <td><?php echo $val['rate_day']; ?></td>
  <td>
    <form name="fgd" action="<?php echo base_url('user/attendance'); ?>" method="post">
<input type="hidden" name="land" value="<?php echo $val['land'];?>"/>
<input type="hidden" name="tapper" value="<?php echo $val['user_id'];?>"/>
<input type="submit" name="ss" value="View Attendance"/>
      </form>
      &nbsp;
      <form name="fgd" action="<?php echo base_url('user/attendance'); ?>" method="post">
<input type="hidden" name="land" value="<?php echo $val['land'];?>"/>
<input type="hidden" name="tapper" value="<?php echo $val['user_id'];?>"/>
<input type="hidden" name="rate_day" value="<?php echo $val['rate_day'];?>"/>
<input type="hidden" name="pr" value="mark"/>
<input type="submit" name="ss" value="Present Today"/>
      </form>
      &nbsp;
      <form name="fgd" action="<?php echo base_url('user/payment'); ?>" method="post">
<input type="hidden" name="land" value="<?php echo $val['land'];?>"/>
<input type="hidden" name="tapper" value="<?php echo $val['user_id'];?>"/>
<input type="submit" name="ss" value="Payment"/>
      </form>

  </td>
<?php } ?>
    </tr>
   <?php }  ?>
  </table>

 </div>

 </div>
          </div>
        </div>
      </div>
    </main>

