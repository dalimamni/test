
<?php

include "../entities/photo.php";
include "../core/photoCore.php";
include"../views/product-detail.php";
$connect = mysqli_connect("localhost", "root", "", "tttt");
        $photoCore1 = new PhotoCore();
        $result = $photoCore1->afficherPhoto($connect);
      
?>
                               
     
         
                
                  
            
            
                
                 <div class="product-status-wrap">

  
                          
   <table>  
    <tr>
     <th width="10%">ID</th>
     <th width="10%">Image</th>
     <th width="10%">Change</th>
     <th width="10%">Remove</th>
    </tr>
  
  <?php
  while($row = mysqli_fetch_array($result))
  {
  	?>


    <tr>
     <td><?php echo $row["id"] ; ?></td>
     <td>
      <img src="<?php echo '../upload/'.$row['image']; ?> " height="60" width="75" class="img-thumbnail" />
     </td>
     <td><form action="update.php" method="POST" enctype="multipart/form-data">
                                                        <p> <label for="fileSelect">Filename:</label></p>
       <span class="btn btn-primary btn-file">
    Browse <input type="file" name="photo" id="fileSelect">
</span>

      <br><input type="submit" name="update" class="btn btn-warning bt-xs update" value="update">
<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
</form>
    </td>
    <td><form action="delete.php" method="POST">
      <input type="submit" name="delete" class="btn btn-danger bt-xs delete" value="delete">
      <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
     </form>
     </td>
    
    

   
    </tr>
    
   
<?php
  }

    
?>
</table>



</div>

