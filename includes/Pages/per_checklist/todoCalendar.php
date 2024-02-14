<style type="text/css">
  .calendar {
    /*    width: 700px;*/
    margin: 0 auto;
  }

  /*.response {
    height: 60px;
}*/

  .success {
    background: #cdf3cd;
    padding: 10px 60px;
    border: #c3e6c3 1px solid;
    display: inline-block;
  }

  .fc-content {
    margin: 1px !important;
  }

  td.fc-day.fc-widget-content.fc-fri.fc-today {
    background: #ed4c7863 !important;
  }

  a.fc-day-grid-event.fc-h-event.fc-event.fc-start.fc-end.fc-draggable {

    display: flex !important;
    border-left: 3px solid white !important;
  }

  .delete-button {
    /*    font-size: large !important;*/
    position: absolute !important;
    right: 0px !important;
    margin: 2px;
  }

  .view-button {
    /*    font-size: large !important;*/
    position: absolute !important;
    right: 28px !important;
    margin: 2px;
  }

  .edit-button {
    /*    font-size: large !important;*/
    position: absolute !important;
    right: 15px !important;
    margin: 2px;
  }

  .edit-button:hover {
    /*    font-size: large !important;*/
    color: #00c9a7;
  }

  .delete-button:hover {
    /*    font-size: large !important;*/
    color: #ed4c78;
  }

  #subeventDetailModal,
  #addEventModal,
  #editEventModal {
    z-index: 1011111111 !important;
    background-color: #80808047;
  }
</style>

<script type="text/javascript">
  $(document).ready(function() {
    var calendar = $('.calendar').fullCalendar({

      editable: true,

      events: {
        url: "<?php echo BASE_URL; ?>includes/Pages/fetch-perchecklist.php?user_id=<?php echo $user_id ?>",
        type: 'GET',
        data: {
          custom_param: 'custom_value' // You can add custom parameters if needed
        },
        error: function() {
          alert('There was an error while fetching events.');
        }
      },
      eventRender: function(event, element) {
        if (event.is_main_event) {

          // This is a main event
          element.find('.fc-title').append('<br>' + event.title);
        } else {
          // This is a subevent
          element.find('.fc-title').append('<br>' + event.title);
        }
      },
      displayEventTime: false,
      selectable: true,
      selectHelper: true,
      select: function(start, end, allDay) {
        $('#addEventModal').modal('show');

        $('#saveEvent').off('click').on('click', function() {
          var title = $('#eventTitle').val();
          var color = $('#eventColor').val();
          var endDate = $('#eventEndDate').val();
          var description = $('#eventDesc').val();
          var status = $('#eventStatus').val();
          var priority = $('#eventPriority').val();
          var category = $('#eventCategory').val();
          var comment = $('#eventComment').val();
          var start = $('#eventStartDate').val(); // Assuming there's a field for start date in your modal

          var permissionType = $("#permissionType").val();
          var permissionRole = $("#permissionRole").val();

          var checkboxes = document.querySelectorAll('.singleUserPer');
          var checkedValues = [];
          checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
              checkedValues.push(checkbox.value);
            }
          });
          if (title) {
            var startFormatted;
            if (start) {
              startFormatted = moment(start).format("Y-MM-DD HH:mm:ss");
            } else {
              // If start date is not provided, use the default start date
              startFormatted = moment().format("Y-MM-DD HH:mm:ss"); // You can change this to your default start date
            }

            var eventData = {
              title: title,
              start: startFormatted,
              color: color,
              description: description,
              status: status,
              priority: priority,
              category: category,
              comment: comment,
              permissionType: permissionType,
              permissionRole: permissionRole,
              checkedValues: checkedValues,
            };

            if (endDate) {
              var endFormatted = moment(endDate).format("Y-MM-DD HH:mm:ss");
              eventData.end = endFormatted;
            }

            $.ajax({
              url: '<?php echo BASE_URL; ?>includes/Pages/per_checklist/add-checklist-event.php?user_id=<?php echo $user_id ?>',
              data: eventData,
              type: "POST",
              success: function(data) {
                displayMessage("Added Successfully");
                calendar.fullCalendar('renderEvent', eventData, true);
                $('#addEventModal').modal('hide');
                $('#eventTitle').val('');
                $('#eventColor').val('');
                $('#eventStartDate').val('');
                $('#eventEndDate').val('');
                $('#eventDesc').val('');
                $('#eventStatus').val('');
                $('#eventPriority').val('');
                $('#eventCategory').val('');
                $('#eventComment').val('');
                calendar.fullCalendar('unselect');
              },
              error: function() {
                alert("Error occurred while saving the event.");
              }
            });
          } else {
            alert("Please enter a title.");
          }
        });




      },

      eventRender: function(event, element) {
        // Your existing eventRender function
        var lockImg = $("<span class='edit-button' title='" + event.mainName + "''><img class='lockImg' src='<?php echo BASE_URL ?>assets/svg/lock/lock.png' style='height: 20px;width: 15px;position: absolute;left: 0px;top: -3px;'></span>");

        var editButton = $("<span class='edit-button' data-event-title='" + event.title + "' data-event-id='" + event.id + "'><i class='bi bi-pencil'></i></span>");
        var deleteButton = $("<span class='delete-button' data-event-id='" + event.id + "'><i class='bi bi-trash3-fill'></i></span>");
        var viewButton = $("<span class='view-button' data-event-id='" + event.id + "'><i class='bi bi-eye'></i></span>");

        editButton.on('click', function(e) {
          e.stopPropagation();
          var eventId = $(this).data('event-id');
          var eventtitle = $(this).data('event-title');
          openEditEventModal(eventId, eventtitle);
        });

        deleteButton.on('click', function(e) {
          e.stopPropagation();
          var eventId = $(this).data('event-id');
          deleteEvent(eventId);
        });

        viewButton.on('click', function(e) {
          e.stopPropagation(); // Prevent event propagation to avoid triggering parent event handlers

          // Fetch event name from the event object
          var eventName = event.title;
          var eventColor = event.color;
          // Set modal title with the event name
          $('#SubchecklistViewLabel').text(eventName).css('color', eventColor);

          // Fetch subchecklist data related to the event using AJAX
          $.ajax({
            url: '<?php echo BASE_URL; ?>includes/Pages/per_checklist/fetch_subcheklist.php', // Update the URL to your PHP file that fetches subchecklist data
            data: {
              main_checklist_id: event.id,
              user_id: <?php echo $user_id; ?> // Pass the event ID to fetch related subchecklist
            },
            type: 'GET',
            success: function(response) {
              // Populate modal body with fetched subchecklist data
              $('#SubchecklistView .modal-body').html(response);
            },
            error: function() {
              alert('Error occurred while fetching subchecklist data.');
            }
          });

          // Show the modal with ID SubchecklistView
          $('#SubchecklistView').modal('show');
        });

        // Append both buttons to the event element

        if (event.perType == "readOnly") {
          element.append(lockImg);
        }
        if (event.perType != "readOnly") {
          element.append(editButton);
          element.append(deleteButton);
          element.append(viewButton);
        }
      },
      // Existing code...

      eventClick: function(event) {
        $('#subeventDetailModal').modal('show');

        $('#saveSubeventButton').on('click', function() {
          // alert("hello");
          var subeventName = $('#subeventName').val();

          if (subeventName) {
            var subeventStart = event.start;

            $.ajax({
              url: '<?php echo BASE_URL; ?>includes/Pages/per_checklist/add-subchecklist-event.php',
              data: {
                main_checklist_id: event.id,
                name: subeventName,
                date: subeventStart.format(), // Format the date to your preferred format
                user_id: <?php echo $user_id; ?>
              },
              type: 'POST',
              success: function(data) {
                console.log("Response from the server: ", data);
                $('#subeventDetailModal').modal('hide');
                $('#subeventName').val('');
                calendar.fullCalendar('refetchEvents'); // Refresh the calendar to show the newly added subevent
                displayMessage("Subevent Added Successfully");
              },
              error: function() {
                alert("Error occurred while saving the subevent.");
              }
            });
          } else {
            alert("Please fill in all required fields.");
          }
        });
      },



      eventDrop: function(event, delta, revertFunc) {
        if (event.perType == "readOnly") {
          alert("Need Permission For IT.");
          location.reload();
        } else {
          var newStart = event.start;
          var newStartString = newStart.format("YYYY-MM-DD HH:mm:ss");
          $.ajax({
            url: '<?php echo BASE_URL; ?>includes/Pages/per_checklist/update-checklist.php',
            data: {
              id: event.id,
              newStart: newStartString
            },
            type: 'POST',
            success: function(data) {
              event.start = newStart;
              calendar.fullCalendar('updateEvent', event);
            },
            error: function() {
              alert("Error occurred while saving the event.");
            }
          });
        }

      }
    });
    console.log("Event Description before calling openEditEventModal:", description);

    function openEditEventModal(eventId, eventtitle, description) {
      console.log("Editing event with ID: " + eventId);
      console.log("Event Description: " + eventDesc);
      $('#editEventModal').modal('show');
      $('#editEventTitle').val(eventId);
      $('#editEventTitlename').val(eventtitle); // Assuming this is the title

      $.ajax({
        url: '<?php echo BASE_URL; ?>includes/Pages/fetchEventDel.php',
        data: {
          id: eventId,
        },
        type: "POST",
        success: function(data) {
          $("#editCheck").empty();
          $("#editCheck").html(data);
        }
      });

      $('#eventDesc').val(eventDesc); // Set event description to the input field
      // $('#saveEventedit').on('click', function() {
      $(document).on('click', '#saveEventedit', function() {

        var value_update = $('#editEventTitlename').val();
        var eventDesc = $(".description" + eventId).val();
        var eventDate = $(".date" + eventId).val();
        var eventStatus = $(".status" + eventId).val();
        var eventPriority = $(".priority" + eventId).val();
        var eventCat = $(".category" + eventId).val();
        var eventComent = $(".comment" + eventId).val();
        var eventColor = $(".perColor" + eventId).val();
        // var desc = $('#eventDesc').val();
        $.ajax({
          url: '<?php echo BASE_URL; ?>includes/Pages/per_checklist/edit_checklist_main.php',
          data: {
            id: eventId,
            eventtitle: value_update,
            eventDesc: eventDesc,
            eventDate: eventDate,
            eventStatus: eventStatus,
            eventPriority: eventPriority,
            eventCat: eventCat,
            eventComent: eventComent,
            eventColor: eventColor
          },
          type: "POST",
          success: function(data) {
            // Assuming data contains the updated information
            // Update UI dynamically with the updated data
            // For example, if you have an element to display the event title, you can update it like this:
            $('#eventTitleElement').text(value_update);
            // Display success message
            calendar.fullCalendar('refetchEvents');
            displayMessage("Updated Successfully");
            // Close the edit event modal
            $('#editEventModal').modal('hide');
          },
          error: function() {
            alert("Error occurred while saving the event.");
          }
        });
      });
    }



    function deleteEvent(eventId) {
      console.log("Clicked Delete Button for Event ID: " + eventId);

      if (confirm("Do you really want to delete this event?")) {
        console.log("Confirmed deletion.");

        $.ajax({
          type: "POST",
          url: "<?php echo BASE_URL; ?>includes/Pages/per_checklist/delete-checklist-event.php",
          data: "id=" + eventId,
          success: function(response) {
            console.log("Response from PHP script: " + response);

            // If successful, remove the existing event from the calendar
            calendar.fullCalendar('removeEvents', eventId);

            displayMessage("Deleted Successfully");
          }
        });
      }
    }

    function handleSearch() {
      var searchQuery = $('#searchInputcalendar').val().toLowerCase();

      var foundEvent = null;

      $('.calendar').fullCalendar('clientEvents', function(event) {
        var eventTitle = event.title.toLowerCase();
        var eventDescription = event.description.toLowerCase();

        if (eventTitle.includes(searchQuery) || eventDescription.includes(searchQuery)) {
          foundEvent = event;
          return true; // Exit the loop if a matching event is found
        }
      });

      if (foundEvent) {
        // Save the current view and navigate to the found event
        var savedView = $('.calendar').fullCalendar('getView');
        $('.calendar').fullCalendar('gotoDate', foundEvent.start);

        // You can restore the previous view after the search
        setTimeout(function() {
          $('.calendar').fullCalendar('changeView', savedView.type, savedView);
        }, 100);
      }
    }
    $('#searchButton').on('click', function() {
      handleSearch();
    });



    function displayMessage(message) {
      $(".response").html("<div class='success'>" + message + "</div>");
      setTimeout(function() {
        $(".success").fadeOut();
      }, 1000);
    }
  });
</script>






<div class="modal fade" id="SubchecklistView" tabindex="-1" role="dialog" aria-labelledby="SubchecklistViewLabel" aria-hidden="true" style="background-color: #80808047;z-index: 1011111111 !important;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="SubchecklistViewLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      </div>

    </div>
  </div>
</div>


<!-- Modal for Subevents -->
<div class="modal fade" id="subeventDetailModal" tabindex="-1" role="dialog" aria-labelledby="subeventDetailModalLabel" aria-hidden="true" style="background-color: #80808047;z-index: 1011111111 !important;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="subeventDetailModalLabel">Add SubChecklist</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="subeventName" style="font-weight:bold; font-size:large;">SubChecklist Name:</label>
          <input type="text" class="form-control" id="subeventName">
        </div>
        <!-- <div class="form-group">
          <label for="subeventDate">Subevent Date:</label>
          <input type="text" class="form-control" id="subeventDate">
        </div> -->
        <!-- Add more input fields as needed -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="saveSubevent">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true" style="background-color: grey;z-index: 1011111111 !important;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="addEventModalLabel">Add Checklist</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- <label class="form-label" style="font-weight: bold; font-size: large;">Checklist Name:</label> -->
        <label class="form-label" style="font-weight: bold; font-size: large;">Todo Name:</label>
        <input type="text" id="eventTitle" class="form-control" placeholder="Event title" required><br>
        <label class="form-label" style="font-weight: bold; font-size: large;">Start Date:</label>
        <input type="datetime-local" id="eventStartDate" class="form-control" required><br>
        <label class="form-label" style="font-weight: bold; font-size: large;">End Date:</label>
        <input type="datetime-local" id="eventEndDate" class="form-control"><br>
        <label class="form-label" style="font-weight: bold; font-size: large;">Description:</label>
        <input type="text" id="eventDesc" class="form-control"><br>
        <label class="form-label" style="font-weight: bold; font-size: large;">Status:</label>
        <input type="text" id="eventStatus" class="form-control"><br>
        <label class="form-label" style="font-weight: bold; font-size: large;">Priority:</label>
        <select name="priority" class="form-control form-control-md priority" id="eventPriority">
          <option selected disabled value="">-Priority-</option>

          <option value="low">Low</option>
          <option value="medium">Medium</option>
          <option value="high">High</option>
        </select>
        <label class="form-label" style="font-weight: bold; font-size: large;">Category:</label>
        <input type="text" id="eventCategory" class="form-control"><br>

        <label class="form-label" style="font-weight: bold; font-size: large;">Color:</label>
        <input type="color" id="eventColor" placeholder="Event color" style="margin: 5px;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="saveEvent">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="editEventModal44" tabindex="-1" role="dialog" aria-labelledby="editEventModalLabel" aria-hidden="true" style="z-index: 1011111111 !important;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="editEventModalLabel">Edit Checklist</h3>
        <h2>Hello</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- <label class="form-label" style="font-weight: bold; font-size: large;">Checklist Name:</label> -->
        <input type="hidden" id="editEventTitle" class="form-control" placeholder="Event title"><br>
        <input type="text" id="editEventTitlename" class="form-control" placeholder="Event title"><br>
        <input type="text" id="editEventTitlename" class="form-control" placeholder="Event title"><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="saveEventedit">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->



<script>
  // Add an event listener to the modal to focus on the input when it's shown
  $('#addEventModal').on('shown.bs.modal', function() {
    $('#eventTitle').focus();
  });
</script>