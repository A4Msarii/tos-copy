<table class="table" id="table-field-memo">
  <tr>
    <!-- <input type="hidden" name="phase_id" class="form-control" value="<?php echo $phase_id ?>"> -->
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
      <select name="topic[]" id="" class="form-control fetchMarkMemo" data-name="markValMemo0" required data-value="manualInputMemo0" data-abs="absentDays0">
        <option value="" disabled selected>--Select Topic--</option>
        <?php
        $fetchDisi = $connect->query("SELECT * FROM memocate");
        $option = '<option value="" disabled selected>--Select Topic--</option>';
        while ($disiData = $fetchDisi->fetch()) {
          $option .= '<option value="' . $disiData['id'] . '">' . $disiData['category'] . '</option>';
        ?>
          <option value="<?php echo $disiData['id']; ?>"><?php echo $disiData['category']; ?></option>
        <?php
        }
        ?>
        <option value="absent">Sick</option>
        <option value="other">Other</option>
      </select>
      <input type="text" class="form-control" style="display:none;" id="manualInputMemo0" placeholder="Add Topic here.." />
    </td>
    <td class="marks">
      <label style="font-weight:bold;" class="text-dark">Marks</label>
      <input type="text" id="markValMemo0" name="memomarks[]" class="form-control" placeholder="Marks">
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
    <td><i class="bi bi-plus-square-fill btn btn-outline-success" type="button" name="add_memo" id="add_memo"></i></td>
  </tr>
</table>
<center>
  <button style="margin:5px;" class="btn btn-success" type="submit" name="submit_memo">Save</button>
</center>


<script type="text/javascript">
  $(document).ready(function() {

    var max = 5;
    var a = 1;

    $("#add_memo").click(function() {
      if (a <= max) {

        var html = '<tr>\
          <td style="display:none;"><input type="text" name="inst" class="form-control" value="<?php echo $username; ?>">\
                                  <input type="hidden" value="<?php echo $user_id ?>" name="inst_id[]" required>\
                                </td>\
                          <td><input style="width:50px;" type="date" name="date[]" class="form-control" placeholder="Enter Date" required></td>\
                  <td><select name="topic[]" id=""class="form-control fetchMarkMemo" required data-name="markValMemo' + a + '" data-value="manualInputMemo' + a + '"><?php echo $option; ?><option value="absent">Sick</option><option value="other">Other</option></select><input type="text" class="form-control" style="display:none;" id="manualInputMemo' + a + '" placeholder="Add Topic here.." /></td>\
                  <td class="marks"><input type="text" id="markValMemo' + a + '" name="memomarks[]" class="form-control" placeholder="Marks"></td>\
                  <td class="days" style="display:none;"><input type="text" name="days[]" class="form-control" placeholder="Days"></td>\
                  <td><input type="file" name="attachemnt[]" class="form-control"></td>\
                                <td style="width:50%;"><textarea style="height:150px; width:100%;" maxlength="100" type="text" name="comment[]" class="form-control" placeholder="Comment" required></textarea></td>\
                  <td><button type="button" name="remove_memo" id="remove_memo" class="btn btn-outline-danger"><i class="bi bi-dash-square-fill"></i></button></td>\
                </tr>';

        $("#table-field-memo").append(html);
        a++;
      }
    });
    $("#table-field-memo").on('click', '#remove_memo', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>