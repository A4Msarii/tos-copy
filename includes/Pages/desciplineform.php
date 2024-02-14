<div class="input-field">
  <table class="table" id="table-field-discipline">
    <tr>

      <input type="hidden" name="std_id" class="form-control" value="<?php echo $student ?>">
      <input type="hidden" name="crs_id" class="form-control" value="<?php echo $phpcourse ?>">
      <td style="display:none;"><input type="text" name="inst" class="form-control" value="<?php echo $username; ?>">
        <input type="hidden" value="<?php echo $user_id ?>" name="inst_id[]" required>
      </td>
      <td>
        <label style="font-weight:bold;" class="text-dark">Date</label>
        <input style="width:50px;" type="date" name="date[]" class="form-control" placeholder="Enter Date" required>
      </td>
      <td>
        <label style="font-weight:bold;" class="text-dark">Topic</label>
        <select name="topic[]" id="" class="form-control fetchMarkDesci" required data-name="markValDesci0" data-value="manualInputDeci0">
          <option value="" disabled selected>--Select Topic--</option>
          <?php
          $fetchDisi = $connect->query("SELECT * FROM desccate");
          $option = '<option value="" disabled selected>--Select Topic--</option>';
          while ($disiData = $fetchDisi->fetch()) {
            $option .= '<option value="' . $disiData['id'] . '">' . $disiData['category'] . '</option>';
          ?>
            <option value="<?php echo $disiData['id']; ?>"><?php echo $disiData['category']; ?></option>
          <?php
          }
          ?>
          <option value="absent">Absent</option>
          <option value="other">Other</option>
        </select>
        <input type="text" class="form-control" style="display:none;" id="manualInputDeci0" placeholder="Add Topic here.." />
      </td>
      <td class="marks">
        <label style="font-weight:bold;" class="text-dark">Marks</label>
        <input type="text" id="markValDesci0" name="dismarks[]" class="form-control" placeholder="Marks">
      </td>
      <td style="display: none;" class="days">
        <label style="font-weight:bold;" class="text-dark">Days</label>
        <input type="text" id="" name="days[]" class="form-control" placeholder="Days">
      </td>
      <td>
        <label style="font-weight:bold;" class="text-dark">Attachment</label>
        <input type="file" name="attachemnt[]" class="form-control">
      </td>
      <td style="width:50%;">
        <label style="font-weight:bold;" class="text-dark">Comment</label>
        <textarea style="height:150px; width:100%;" maxlength="100" type="text" name="comment[]" class="form-control" placeholder="Comment" required></textarea>
      </td>
      <td><button type="button" name="add_discipline" id="add_discipline" class="btn btn-outline-success"><i class="bi bi-plus-square"></i></button></td>
    </tr>
  </table>
  <center>
    <button style="margin:5px;" class="btn btn-success" type="submit" name="submit_discipline">Save</button>
  </center>
</div>


<script type="text/javascript">
  $(document).ready(function() {

    var max = 100;
    var a = 1;

    $("#add_discipline").click(function() {
      if (a <= max) {
        var html = '<tr>\
          <td style="display:none;"><input type="text" name="inst" class="form-control" value="<?php echo $username; ?>">\
                                  <input type="hidden" value="<?php echo $user_id ?>" name="inst_id[]" required>\
                                </td>\
                          <td><input style="width:50px;" type="date" name="date[]" class="form-control" placeholder="Enter Date" required></td>\
                            <td><select name="topic[]" id=""class="form-control fetchMarkDesci" required data-name="markValDesci' + a + '" data-value="manualInputDeci' + a + '"><?php echo $option; ?><option value="absent">Absent</option><option value="other">Other</option></select><input type="text" class="form-control" style="display:none;" id="manualInputDeci' + a + '" placeholder="Add Topic here.." /></td>\
                            <td class="marks"><input type="text" id="markValDesci' + a + '" name="dismarks[]" class="form-control" placeholder="Marks"></td>\
                            <td class="days" style="display:none;"><input type="text" name="days[]" class="form-control" placeholder="Days"></td>\
                            <td><input type="file" name="attachemnt[]" class="form-control"></td>\
                            <td style="width:50%;"><textarea style="height:150px; width:100%;" maxlength="100" type="text" name="comment[]" class="form-control" placeholder="Comment" required></textarea></td>\
                  <td><button type="button" name="remove_discipline" id="remove_discipline" class="btn btn-outline-danger"><i class="bi bi-dash-square-fill"></i></button></td>\
                </tr>';
        $("#table-field-discipline").append(html);
        a++;
      }
    });
    $("#table-field-discipline").on('click', '#remove_discipline', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>