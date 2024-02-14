<div class="row justify-content-center">

  <div class="col-lg-10 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

      <div class="card-body">
        <div class="row">
          <div class="col-md-6 mb-3">

            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="course" style="color: black; font-weight:bold;">start Time</label>
              <input type="time" id="start-time" class="form-control" name="starttimings">
            </div>
          </div>
          <div class="col-md-6 mb-3">
              <div class="form-outline mb-2">
              <label class="form-label text-dark" for="course" style="font-weight:bold;">End Time</label>
              <input type="time" id="end-time" name="endtimings" class="form-control">
             </div>
             <p id="result" style="font-size:20px"></p>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-outline mb-2">
              <label class="form-label text-dark" for="course" style="font-weight:bold;">Date</label>
              <input type="date" name="dates" class="form-control">
            </div>
          </div>

        </div>
        <!-- <input type="submit" class="btn btn-success" name="addExam" />  -->
        <hr style="margin:0px;">
        <div class="button" style="margin: 20px;">
          <button class="btn btn-primary previous-button" style="font-size: large; font-weight:bold; float: left;">Previous</a>
          <button type="submit" class="btn btn-success" name="addExam" style="font-size: large; font-weight:bold; float: right;">Submit</button>
        </div>
        </form>
      </div>
      <!-- End Body -->
    </div>
    <!-- End Card -->
  </div>
</div>
<script>
        // Get references to the input fields and result paragraph
        const startTimeInput = document.getElementById("start-time");
        const endTimeInput = document.getElementById("end-time");
        const result = document.getElementById("result");

        // Function to calculate the duration
        function calculateDuration() {
            // Get the input values
            const startTimeValue = startTimeInput.value;
            const endTimeValue = endTimeInput.value;

            if (startTimeValue && endTimeValue) {
                // Convert the input values to Date objects
                const startTime = new Date(`1970-01-01T${startTimeValue}`);
                const endTime = new Date(`1970-01-01T${endTimeValue}`);

                // Check if the end time is earlier than the start time
                if (endTime < startTime) {
                    // Display an error message
                    result.textContent = "End time cannot be earlier than start time";
                    // Clear the end time input
                    endTimeInput.value = "";
                } else {
                    // Calculate the time difference in milliseconds
                    const durationInMilliseconds = endTime - startTime;

                    // Convert milliseconds to hours and minutes
                    const hours = Math.floor(durationInMilliseconds / (1000 * 60 * 60));
                    const minutes = Math.floor((durationInMilliseconds % (1000 * 60 * 60)) / (1000 * 60));

                    // Display the result
                    result.textContent = `Duration: ${hours} hours and ${minutes} minutes`;
                }
            } else {
                // Clear the result if either input field is empty
                result.textContent = "";
            }
        }

        // Add input event listener to the start time input field
        startTimeInput.addEventListener("input", calculateDuration);

        // Add input event listener to the end time input field
        endTimeInput.addEventListener("input", calculateDuration);

        // Call calculateDuration initially in case there are default values in the input fields
        calculateDuration();
    </script>