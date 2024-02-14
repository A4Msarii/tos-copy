
    $(document).ready(function() {
        $('.offcanvas-end').addClass('wide-offcanvas');
        // When the "Alert" tab is shown, add the "wide-offcanvas" class to increase the width
        $('#alertonenav-tab').on('shown.bs.tab', function(e) {
            $('.offcanvas-end').addClass('wide-offcanvas');
        });

        // When the "Status" tab is shown, remove the "wide-offcanvas" class to decrease the width
        $('#statusonenav-tab').on('shown.bs.tab', function(e) {
            $('.offcanvas-end').addClass('wide-offcanvas');
        });

        // Select the element with the .closeoffcanvas class
        var closeOffcanvasButton = $('.closeoffcanvas');

        // Select the button that toggles the offcanvas
        var offcanvasToggleButton = $('[data-bs-target="#offcanvasActivityStream11"]');

        // Add a click event listener to the closeoffcanvas button
        closeOffcanvasButton.on('click', function() {
            offcanvasToggleButton.trigger('click'); // Simulate a click on the offcanvas toggle button
        });

        $(document).on('keyup', '#getuserforalert', function(e) {
            var name = $(this).val();
            var newurl = '<?php echo BASE_URL; ?>includes/getuserforalert.php';
            $.ajax({
                type: "get",
                url: newurl,
                data: {
                    'name': name
                },
                success: function(response) {
                    $('.alertuserDetail').html(response);
                    $('.alerttableData').css('display', 'block');
                }
            });
        });
    });

    $(document).ready(function() {
        $(".offaltCat").on("click", function() {
            const altertId = $(this).attr("value");
            const altertMsg = $(this).attr("name");
            $.ajax({
                type: 'POST',
                url: "<?php echo BASE_URL; ?>includes/Pages/edit_alert.php",
                data: {
                    altertId: altertId
                },
                dataType: "html",

                success: function(resultData) {
                    // alert(resultData);
                    $("#offeditAltData").empty();
                    $("#offalert_cate").html(altertMsg);
                    $("#offeditAltData").html(resultData);
                }
            });
        });

        $(document).on('click', '.offcanvasalertid', function() {
            var alert_id = $(this).data('offcanvasalertid');
            $.ajax({
                type: 'POST',
                url: "<?php echo BASE_URL; ?>includes/Pages/fetch_alert.php",
                data: {
                    altertId: alert_id
                },
                success: function(resultData) {
                    $('.offcanvasmodelforealert').html(resultData);
                }
            });
        });
    });
    $(document).on('click', '.delet_notis', function() {

        let id = $(this).attr("id");
        $.ajax({
            type: 'POST',
            url: 'delete_notis.php',
            data: 'id=' + id,
            success: function(response) {
                window.location.reload();
            }
        });
    });

    $(document).ready(function() {
        $("#studentdropdown").click(function(event) {
            event.stopPropagation();
            $(".student_dropdown").toggle('fast');
        });
        $('body').click(function(event) {
            if ($(".student_dropdown").is(':visible') && !$(".student_dropdown").is(event.target) && $(".student_dropdown").has(event.target).length === 0) {
                $(".student_dropdown").hide('fast');
            }
        });
    });

    $(document).ready(function() {
        fetchCheckData();
    });

    function fetchCheckData() {
        const user_ID = <?php echo $fetchuser_id ?>;
        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/perCheckData.php', // Replace with the path to your PHP script
            data: {
                user_ID: user_ID
            }, // Send the input values as data
            success: function(response) {
                $("#perCheckData").empty();
                $("#perCheckData").html(response);
            }
        });
    }

    $("#saveCheckListValue").on("click", function() {
        var inputValues = [];
        $('.perChecklistVal').each(function() {
            inputValues.push($(this).val());
        });
        // alert(inputValues);
        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/insert_checklist_per.php', // Replace with the path to your PHP script
            data: {
                values: inputValues
            }, // Send the input values as data
            success: function(response) {
                $(".perChecklistVal").val("");
                // Handle the response from the PHP script
                fetchCheckData();
            }
        });
    });

  $(document).ready(function() {


    var html = '<tr>\
                          <td style="text-align: center; display:flex;"><input type="text" placeholder="Enter checklist" name="" id="" class="form-control perChecklistVal" value="" required/><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span> </td>\
                          <td><button type="button" name="remove_actual" id="remove_checklist" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
    var max = 100;
    var a = 1;

    $("#add_checklist").click(function() {
      if (a <= max) {
        $("#table-field").append(html);
        a++;
      }
    });
    $("#table-field").on('click', '#remove_checklist', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });

  $(document).ready(function() {
    var html = '<tr>\
                  <td style="border: 1px solid white;"><input type="text" name="subchecklist[]" class="form-control" placeholder="Enter Checklist" required></td>\
                  <td style="border: 1px solid white;"><button type="button" name="remove_subchecklist" id="remove_subchecklist" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                </tr>'
    var max = 100;
    var a = 1;

    $("#add_subchecklist").click(function() {
      if (a <= max) {
        $("#subchecklist_table_per").append(html);
        a++;
      }
    });
    $("#subchecklist_table_per").on('click', '#remove_subchecklist', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
  $("#newchecktableper").on("click", ".edit_course_data_per", function() {

    var ctid = $(this).attr('id');

    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL;?>includes/Pages/fetch_check_edit_value_per.php',
      data: 'ctid=' + ctid,
      success: function(response) {

        $('#get_course_foem_per').empty();
        $('#get_course_foem_per').html(response);
      }
    });

  });

  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInputmainchecklist');
    const rowElements = document.querySelectorAll('.rowAddmain');

    searchInput.addEventListener('input', function() {
      const searchTerm = searchInput.value.toLowerCase();

      rowElements.forEach(rowElement => {
        const textContent = rowElement.textContent.toLowerCase();
        if (textContent.includes(searchTerm)) {
          rowElement.style.display = 'block';
        } else {
          rowElement.style.display = 'none';
        }
      });
    });
  });
