

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
<script type="text/javascript">
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Tapper Payment List</h1>
          
        </div>

      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
<?php  if($role == 'USER'){?><p style="float: right"><a id="oo" href="#" onclick="printDiv('printableArea')"><strong>Print</strong></a></p><?php } ?>
 <div style="margin-top:60px; margin-bottom:100px;" id="printableArea">
  <strong> <center><?php echo $m;?></center></strong>

  <table width="100%" border="0" id="customers">
    

  <tr>
  <th ><strong>ID</strong></th>
  <th ><strong> Land Info  </strong></th>
  <th ><strong> Tapper Info  </strong></th>
  <th ><strong> Date From  - To </strong></th>
  <th ><strong> Amount  </strong></th>
  <th ><strong> Status </strong></th>
  <?php  if($role == 'OWNER'){?> <th ><strong>Action </strong></th> <?php }  ?>

  

  </tr>

    <?php foreach($payment as $key => $val){ ?>
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
<td><?php echo $val['date_from']." - ".$val['date_to']; ?>
 <td><?php echo $val['amount']; ?></td>

<td><?php echo $val['status']; ?>
<p>Calculated On:<?php echo $val['calculation_date'];?></p></td>
 <?php  if($role == 'OWNER'){?><td>
  
   <?php if($val['status'] == 'NOT PAID'){?>
      <form name="fg" action="<?php echo base_url('user/payment'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['Id'];?>"/>
<input type="hidden" name="pr" value="del"/>
<input type="hidden" name="land" value="<?php echo $val['land'];?>"/>
<input type="hidden" name="tapper" value="<?php echo $val['tapper'];?>"/>
<input type="hidden" name="date_to" value="<?php echo $val['date_to'];?>"/>
<input type="hidden" name="date_from" value="<?php echo $val['date_from'];?>"/>
<input type="submit" name="ss" value="Delete"/>
      </form>       
     <form name="fg" action="<?php echo base_url('user/pay'); ?>" method="post">
<input type="hidden" name="fee_id" value="<?php echo $val['Id'];?>"/>
<input type="hidden" name="fee" value="<?php echo $val['amount'];?>"/>
<input type="hidden" name="title" value="<?php echo $val['date_from']." - ".$val['date_to'];?>"/>
<input type="submit" name="ss" value="PAY"/>
      </form>
<?php } ?>
</td> <?php }  ?>
    </tr>
   <?php }  ?>
  </table></center>

 </div>

 </div>
          </div>
        </div>
      </div>
    </main>

