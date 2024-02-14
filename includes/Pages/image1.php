<form action="insert_image_cert.php">     
<input type="hidden" value="<?php echo $cert_id; ?>" name="cert_id">
     <div class="img_select" style="display:none">
              <br>
              <label>Image Of:</label>
                <select class="form-control" style="width:20%" name="image_of_image">
                  <?php echo $roles_value_fetch; ?>
                </select>
            <label>height:</label><input type="number" required class="form-control" name="image_height" style="width:20%" placeholder="eg 10px" value="100">
            <label>width:</label><input type="number" required class="form-control" name="image_width" style="width:20%" placeholder="eg 10px" value="100"> 
            <label>Border-radius</label><input type="number" class="form-control" name="border_radius" style="width:20%" placeholder="eg 10px" value="5"> 
            <label>Border</label><input type="number" class="form-control" name="border" style="width:20%" placeholder="eg 10px" value="9"> 
            <label>color border</label><br>
            <input type="color" id="favcolor" name="border_color"><br>
            <input type="submit" class="btn btn-success" style="font-size:large; font-weight:bold;">
            </div> 
         
            </form>