



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
          <h1><i class="fa fa-dashboard"></i>Place List</h1>
          
        </div>

      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
<?php  if($this->session->userdata('role') == 'ADMIN'){?>
  <form action="<?php echo base_url('place/newplace'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <center>

  <div style="margin-top:60px; margin-bottom:100px;">
   <h3>
    New Place Info
  </h3>
  <table width="auto" border="0">
    <tr>
      <td width="140">Place</td>
      <td width="270"><input type="text" name="name" id="txtfname" required="required" title="place" autocomplete="off" placeholder="Enter Place" /></td>
    </tr>
    
    <tr><center>
    
      <td><input type="submit" name="btnsignup" id="btnsave" value="Save" /></td>
      <td><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
   
   </center> </tr>
  </table>
</form>
<?php } ?>


 <div style="margin-top:60px; margin-bottom:100px;">
  
  <table width="auto" border="0"  id="customers">
  <tr>
 <center><b>Place List</b></center><br><br>
  </tr>
  <tr>

  <th>ID</th>
  <th>Place</th>
  <th>Action</th>
</td>

  </tr>
    <?php foreach($place as $key => $val){ ?>
    <tr>
<td><?php echo $val['id']; ?></td>
<td><?php echo $val['name']; ?></td>
     <td>
  <?php  if($this->session->userdata('role') == 'ADMIN'){?>
      <form name="fg" action="<?php echo base_url('place/deleteplace'); ?>" method="post">
<input type="hidden" name="i" value="<?php echo $val['id'];?>"/>
<input type="submit" name="ss" value="Delete"/>
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
