<style>
  .event-title {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>
<?php
$user_id = $_SESSION['login_id']; // Assuming you have a valid user ID in the session

// Get the current month
$currentMonth = date('m');

// Fetch events from the per_checklist table, sorting by current month events first
$sql = "SELECT * FROM per_checklist WHERE user_id = :user_id ORDER BY (MONTH(date) = :currentMonth) DESC, MONTH(date), date";
$stmt = $connect->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindParam(':currentMonth', $currentMonth, PDO::PARAM_INT);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $students_em = $stmt->fetchAll();
    ?>
<div style="display:flex;">
<!-- <label for="monthFilterevent">Filter by Month:</label> -->
<select id="monthFilterevent" style="margin: 5px;height: 35px;padding: 5px;border-radius: 10px;">
  <option value="all">All Months</option>
  <option value="01">January</option>
  <option value="02">February</option>
  <option value="03">March</option>
  <option value="04">April</option>
  <option value="05">May</option>
  <option value="06">June</option>
  <option value="07">July</option>
  <option value="08">August</option>
  <option value="09">September</option>
  <option value="10">October</option>
  <option value="11">November</option>
  <option value="12">December</option>
  <!-- Add more months as needed -->
</select>

<select id="yearFilterevent" style="margin: 5px;height: 35px;padding: 5px;border-radius: 10px;">
  <option value="all">All Years</option>
  <!-- Add years dynamically based on your data -->
  <?php
    $currentYear = date('Y');
    for ($year = $currentYear; $year >= $currentYear - 5; $year--) {
      echo '<option value="' . $year . '">' . $year . '</option>';
    }
  ?>
</select>

<input type="text" id="searchInputEvent" placeholder="Search..." style="margin:5px;width: 50%;height: 35px;padding: 5px;border-radius: 10px;">
</div>

    <div class="event-list" style="height: 650px;overflow-y: auto;">
        <h3>Event List</h3>
        <table class="table text-nowrap text-lg-wrap table-hover table-centered" id="eventTable">
            <!-- <thead>
                <tr>
                    <th>Title</th>
                    <th>Sub-Checklist</th>
                </tr>
            </thead> -->
            <tbody>
                <?php
                foreach ($students_em as $row) {
                    $item_ided = $row['id'];
                    if($row['sharedType'] != ""){
                      $item_ided = $row['mainCheckId'];
                    }
                    $priority = $row['priority'];
                    $priorityClasses = array(
                      'low' => '#00c9a7', // Use Bootstrap warning class
                      'medium' => '#377dff', // Use Bootstrap success class
                      'high' => '#ed4c78' // Use Bootstrap info class
                    );
                    $priorityClasses = isset($priorityClasses[$priority]) ? $priorityClasses[$priority] : '';
                    ?>
                    <tr class="event-row" data-month="<?php echo date('m', strtotime($row['date'])); ?>" data-year="<?php echo date('Y', strtotime($row['date'])); ?>" style="cursor:pointer;">
                        <td class="event-date">
                            <div>
                              <a style="display:flex;">
                                <span class="legend-indicator" style="width: 10px; height:10px;background-color: <?php echo $priorityClasses;?>"></span>
                                <h5 class="mb-1 event-title" style="color: <?php echo $row['color']; ?>"><?php echo $row['title']; ?></h5>
                              </a>
                              <small><?php echo date('d-M Y', strtotime($row['date'])); ?></small>
                            </div>
                        <!-- </td>
                        <td> -->
                            <ul>
                                <?php
                                $select_checklist = "SELECT * FROM per_subchecklist where main_checklist_id = :item_ided";
                                $select_checklist_st = $connect->prepare($select_checklist);
                                $select_checklist_st->bindParam(':item_ided', $item_ided, PDO::PARAM_INT);
                                $select_checklist_st->execute();
                                $students_sub = $select_checklist_st->fetchAll();

                                foreach ($students_sub as $sub_row) {
                                    ?>
                                    <li class="event-sub-item" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><span>- </span><?php echo $sub_row['name']; if($sub_row['date'] != ""){ ?>
                                    <small>- <?php echo date('d-M Y', strtotime($sub_row['date'])); ?></small>
                                    <?php } ?>
                                  </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
}
?>


<script>
  // Add event listener to both month and year filters
  $('#monthFilterevent, #yearFilterevent').change(function() {
    var selectedMonth = $('#monthFilterevent').val();
    var selectedYear = $('#yearFilterevent').val();

    // Show/hide rows based on the selected month and year
    $('.event-row').hide();

    if (selectedMonth === 'all' && selectedYear === 'all') {
      // Show all rows when filtering by all months and all years
      $('.event-row').show();
    } else if (selectedMonth === 'all') {
      // Show rows for the selected year when filtering by all months
      $('.event-row[data-year="' + selectedYear + '"]').show();
    } else if (selectedYear === 'all') {
      // Show rows for the selected month when filtering by all years
      $('.event-row[data-month="' + selectedMonth + '"]').show();
    } else {
      // Show rows for the selected month and year
      $('.event-row[data-month="' + selectedMonth + '"]').filter('[data-year="' + selectedYear + '"]').show();
    }
  });
</script>

<script>
  document.getElementById("searchInputEvent").addEventListener("input", function() {
    var searchText = this.value.toLowerCase();
    var eventTable = document.getElementById("eventTable");
    var eventRows = eventTable.getElementsByTagName("tr");

    for (var i = 0; i < eventRows.length; i++) {
      var eventRow = eventRows[i];
      var eventTitle = eventRow.querySelector(".event-title"); // Event title element
      var eventSubChecklistItems = eventRow.querySelectorAll(".event-sub-item"); // Sub-checklist items (adjust selector)

      var matchFound = false;

      // Check if the event title matches the search text
      if (eventTitle) {
        var titleText = eventTitle.textContent.toLowerCase();
        if (titleText.includes(searchText)) {
          matchFound = true;
        }
      }

      // Check if any sub-checklist item matches the search text
      if (eventSubChecklistItems) {
        eventSubChecklistItems.forEach(function(item) {
          var itemText = item.textContent.toLowerCase();
          if (itemText.includes(searchText)) {
            matchFound = true;
          }
        });
      }

      if (matchFound || searchText === "") {
        eventRow.style.display = "table-row";
      } else {
        eventRow.style.display = "none";
      }
    }
  });
</script>

