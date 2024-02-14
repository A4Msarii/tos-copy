<div class="logo_select" style="display:none">
<form action="insert_logo_cert.php" method="post" enctype="multipart/form-data">     
<input type="hidden" value="<?php echo $cert_id; ?>" name="cert_id">

              <br>
            <label>File:</label><input type="file" required class="form-control" name="image" style="width:20%" accept="image/*">
            <label>height:</label><input type="number" required class="form-control" name="image_height" style="width:20%" placeholder="eg 10px" value="10">
            <label>width:</label><input type="number" required class="form-control" name="image_width" style="width:20%" placeholder="eg 10px" value="10"> 
            <label>Border-radius</label><input type="number" class="form-control" name="border_radius" style="width:20%" placeholder="eg 10px" value="0"> 
            <label>Border</label><input type="number" class="form-control" name="border" style="width:20%" placeholder="eg 10px" value="1"> 
            <label>color border</label><br>
            <input type="color" id="favcolor" name="border_color">
               <input type="submit" class="btn btn-success" style="font-size:large; font-weight:bold;">
               </form>
              </div> 
         
           