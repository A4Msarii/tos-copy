
<form action="insert_para_cert.php">  
<input type="hidden" value="<?php echo $cert_id; ?>" name="cert_id"> 
<div class="Paragraph_select" style="display:none">
              <br>
               <label>Text:</label><br>
                <textarea class="form-control" style="width:20%" name="text_data"></textarea>
                <label>Text color:</label><br>
                <input type="color" class="form-control" name="heading_text" style="width:20%">
                <label>Text color:</label><br>
                <input type="color" class="form-control" name="background_color" style="width:20%">
                <label>Font-size:</label>
                <input type="number" required class="form-control" name="font_size_height" style="width:20%" placeholder="eg 10px" value="10">
                <label>Font Style:</label>
                <select class="form-control" style="width:20%" name="text_type_heading">
                <option value="">No style</option>
                <option value="Bold">Bold</option>
                  <option value="italic">italic</option>
                  <option value="underline">underline</option>
                </select>
                <label>Font family:</label>
                <select id="font_families" class="form-control" name="font_style" style="width:20%">
                <optgroup style="font-family:Times New Roman">
                        <option value="Times New Roman">Times New Roman</option>
                        </optgroup>
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
</form>
</div>