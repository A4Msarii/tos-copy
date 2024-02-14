<form action="insert_heading_cert.php">     
<input type="hidden" value="<?php echo $cert_id; ?>" name="cert_id">
<div class="heading_select" style="display:none">
              <br>
              <label>Name of:</label>
              <select class="form-control check_user_heading" style="width:20%" name="headings_name">
                  
                  <?php echo $roles_value_fetch; ?>
                  <option value="0">No users</option>
                </select>
                <div style="display:none" class="if_text">
                <label>Text:</label>
                <input type="text" class="form-control" name="heading_texts" style="width:20%" placeholder="Heading name..">
                </div>
                <label>font:size:</label>
                
                <label>Heading:</label>
                <select class="form-control" style="width:20%" name="headings_style">
                  <option value="h1">Heading 1</option>
                  <option value="h2">Heading 2</option>
                  <option value="h3">Heading 3</option>
                  <option value="h4">Heading 4</option>
                  <option value="h5">Heading 5</option>
                  <option value="h6">Heading 6</option>
                </select>
                <label>background:</label><br>
                <input type="color" class="form-control" name="heading_backgoround" style="width:20%"><br>
                <label>Text color:</label><br>
                 <input type="color" class="form-control" name="heading_text" style="width:20%">
                <label>Font-size(px):</label><input type="number" required class="form-control" name="font_size_height" style="width:20%" placeholder="eg 10px" value="50">
                <label>Font Style:</label>
                <select class="form-control" style="width:20%" name="text_type_heading">
                <option value="">No style</option>
                  <option value="Bold">Bold</option>
                  <option value="italic">italic</option>
                  <option value="underline">underline</option>
                </select>
                <label>Font family:</label>
                <select id="font_families" class="form-control" style="width:20%" name="font_family">
                       <optgroup style="font-family:JasmineUPC">
                        <option value="JasmineUPC">JasmineUPC</option>
                        </optgroup>
                        <optgroup style="font-family:Javanese Text">
                        <option value="Javanese Text">Javanese Text</option>
                        </optgroup>
                        <optgroup style="font-family:Arial">
                        <option value="Arial">Arial</option>
                        </optgroup>
                        <optgroup style="font-family:Verdana">
                        <option value="Verdana">Verdana </option>
                        </optgroup>
                        <optgroup style="font-family:Impact">
                        <option value="Impact">Impact </option>
                        </optgroup>
                        <optgroup style="font-family:Comic Sans MS">
                        <option value="Comic Sans MS">Comic Sans MS</option>
                        </optgroup>
                        <optgroup style="font-family:Geneva">
                        <option value="Geneva">Geneva</option>
                        </optgroup>
                        <optgroup style="font-family:Segoe UI">
                        <option value="Segoe UI">Segoe UI</option>
                        </optgroup>
                        <optgroup style="font-family:Optima">
                        <option value="Optima">Optima</option>
                        </optgroup>
                        <optgroup style="font-family:Times New Roman">
                        <option value="Times New Roman">Times New Roman</option>
                        </optgroup>
                        <optgroup style="font-family:Big Caslon">
                        <option value="Big Caslon">Big Caslon</option>
                        </optgroup>
                        <optgroup style="font-family:Bodoni MT">
                        <option value="Bodoni MT">Bodoni MT</option>
                        </optgroup>
                        <optgroup style="font-family:Book Antiqua">
                        <option value="Book Antiqua">Book Antiqua</option>
                        </optgroup>
                        <optgroup style="font-family:Bookman">
                        <option value="Bookman">Bookman</option>
                        </optgroup>
                        <optgroup style="font-family:New Century Schoolbook">
                        <option value="New Century Schoolbook">New Century Schoolbook</option>
                        </optgroup>
                        <optgroup style="font-family:Calisto MT">
                        <option value="Calisto MT">Calisto MT </option>
                        </optgroup>
                        <optgroup style="font-family:Cambria">
                        <option value="Cambria">Cambria</option>
                        </optgroup>
                        <optgroup style="font-family:Didot">
                        <option value="Didot">Didot</option>
                        </optgroup>
                    </select>
                    <input type="submit" class="btn btn-success" style="font-size:large; font-weight:bold;">
            </div> 
         
            </form>

           