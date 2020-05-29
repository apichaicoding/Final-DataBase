<form method="post" action="" name="from">
   <div class="input-group">
      <span class="input-group-addon" id="basic-addon">อาหาร</span>
      <select class="form-control"  name="type" id="list">
         <option value="อาหารคาว">อาหารคาว</option>
         <option value="อาหารหวาน">อาหารหวาน</option>
      </select>
   </div>
   <br/>
   <div class="text-center">
      <button class="btn" type="submit" id="1" name="submit">Summit</button>
   </div>
   <br/>
   <?php 
      if (isset($_POST['submit'])) {
          $type = $_POST['type'];
         if($type== "อาหารคาว") { 
          $t1 = 5*6;
         }
         if ($type == "อาหารหวาน"){
           $t1 = 7*8;
         }
         ?>
   <strong><?php echo "อาหาร" ?></strong>
   <?php echo $type; ?><br/>
   <strong><?php echo "ราคา" ?></strong>
   <?php echo number_format($t1); ?>
   <?php 
      }
      ?>
   <div>
   </div>
</form>