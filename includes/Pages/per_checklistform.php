<form class="insert-checklists" id="checklist_form1" method="post" action="insert_checklist_per.php" style="width:700px;">
                <div class="input-field">
                  <table class="table table-bordered" id="table-field-percheck">
                    <tr>
                      <td style="text-align: center; display:flex;"><input type="text" placeholder="Enter CheckList" name="checklist[]" id="checklistval" class="form-control" value="" required /><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span> </td>
                      <td style="width:20px;"><button type="button" name="add_checklist" id="add_checklist" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                    </tr>
                  </table>
                </div>
                <center>
                  <button style="margin:5px;" class="btn btn-success" type="submit" id="checklist_submit1" name="savechecklist">Submit</button>
                </center>
              </form>



<!--Script for add multiple checklists-->

<script type="text/javascript">
  $(document).ready(function() {


    var html = '<tr>\
                          <td style="text-align: center; display:flex;"><input type="text" placeholder="Enter checklist" name="checklist[]" id="checklistval" class="form-control" value="" required/><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span> </td>\
                          <td><button type="button" name="remove_actual" id="remove_checklist" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
    var max = 100;
    var a = 1;

    $("#add_checklist").click(function() {
      if (a <= max) {
        $("#table-field-percheck").append(html);
        a++;
      }
    });
    $("#table-field-percheck").on('click', '#remove_checklist', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>
