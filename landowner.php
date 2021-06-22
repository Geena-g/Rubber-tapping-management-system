

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
          <h1><i class="fa fa-dashboard"></i>Land Owner List</h1>
          
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
  <th width="5%"><strong>ID</strong></th>
  <th width="15%"><strong> Name </strong></th>
  <th width="15%"><strong> Email  </strong></th>
  <th width="5%"><strong> Gender  </strong></th>
  <th width="15%"><strong> Mobile </strong></th>
  <th width="5%"><strong> Address  </strong></th>
  <th width="15%"><strong> Aadhar No </strong></th>
<th width="10%"><strong>Status </strong></th>
  <th width="45%"><strong>Action</strong></th>
  

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
<td><?php echo $val['status']; ?></td>
     <td>
  <?php  if($role == 'ADMIN'){?>
    <?php  if($val['status']== 'WAITING'){?>
      <form name="fg" action="<?php echo base_url('user/approveowner'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['user_id'];?>"/>
<input type="submit" name="ss" value="Approve"/>
      </form>&nbsp;&nbsp;
      <form name="fg" action="<?php echo base_url('user/rejectowner'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['user_id'];?>"/>
<input type="submit" name="ss" value="Reject"/>
      </form>
      <?php } ?>&nbsp;&nbsp;
      <?php  if($val['status']== 'APPROVED'){?>
      <form name="fg" action="<?php echo base_url('user/rejectowner'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['user_id'];?>"/>
<input type="submit" name="ss" value="Reject"/>
      </form>
      <?php } ?>
      &nbsp;&nbsp;
      <?php  if($val['status']== 'REJECTED'){?>
       <form name="fg" action="<?php echo base_url('user/approveowner'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['user_id'];?>"/>
<input type="submit" name="ss" value="Approve"/>
      </form>
      <?php } ?>
    </td>
    
    </tr>
   <?php } } ?>
  </table>

 </div>
</div>
          </div>
        </div>
      </div>
    </main>
