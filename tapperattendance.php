

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

#customers tr:nth-child(odd){background-color: #f2f2f2;}

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
          <h1><i class="fa fa-dashboard"></i>Tapper Attendance List</h1>
          
        </div>

      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
 <div style="margin-top:60px; margin-bottom:100px;">
  <strong> </strong>
<form name="fg" action="<?php echo base_url('user/payment'); ?>" method="post">

  <table width="100%" border="0" id="customers">
     <tr>
  <td>Start Date:</td>
  <td><input type="date" name="date_from" required="required"/></td>
  <td>End Date:</td>
  <td><input type="date" name="date_to" required="required"/></td>
<input type="hidden" name="land" value="<?php echo $land;?>"/>
<input type="hidden" name="tapper" value="<?php echo $tapper;?>"/>
<input type="hidden" name="pr" value="calc"/>
  <td><input type="submit" name="calc" value="Calculate Wage Now" /></td>

</tr>
</form>
  <table width="100%" border="0" id="customers">
    

  <tr>
  <th width="5%"><strong>ID</strong></th>
  <th width="15%"><strong> Land Info  </strong></th>
  <th width="5%"><strong> Tapper Info  </strong></th>
  <th width="5%"><strong> Present Date  </strong></th>
  <th width="5%"><strong> Daily Wage  </strong></th>
  <th width="15%"><strong> Status </strong></th>
  <th width="10%"><strong>Action </strong></th>

  

  </tr>

    <?php foreach($attendance as $key => $val){ ?>
    <tr>
<td><?php echo $val['Id']; ?></td>
<td><?php echo "Land ID - ".$val['Id']; ?>
  <p><?php echo "Rubber Type - ".$val['rubber_type']; ?></p>
  <p><?php echo "Area - ".$val['area']." acre"; ?></p>
  <p><?php echo "No Tree - ".$val['no_tree']." Nos"; ?></p>
</td>
<td><?php echo $val['user_name']." [# - ".$val['tapper']."]"; ?>
  <p><?php echo $val['user_mobile']; ?></p>
</td>
<td><?php echo $val['present_date']; ?>
 <td><?php echo $val['wage']; ?></td>

<td><?php echo $val['status']; ?></td>
<td>
   <?php  if($role == 'OWNER'){?>
    <?php  if($val['status'] == '--'){?>
      <form name="fg" action="<?php echo base_url('user/attendance'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['Id'];?>"/>
<input type="hidden" name="pr" value="del"/>
<input type="hidden" name="land" value="<?php echo $val['land'];?>"/>
<input type="hidden" name="tapper" value="<?php echo $val['tapper'];?>"/>
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


