<style>
    .active .page-link {
        background-color: #00c9a7 !important;
    }

    .course:hover {
        background-color: #bdc5d18f;
    }
</style>
<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$user_id = $_SESSION['login_id'];
$division_id = "";
if (isset($_SESSION['division_id'])) {
    $division_id = $_SESSION['division_id'];
}

$items_per_page = 4; // Number of items to display per page

// Retrieve the total count of items
$division_id;
$fetch_ctp_count = "SELECT count(*) FROM sidebar_ctp INNER JOIN ctppage ON sidebar_ctp.ctp_id =  ctppage.CTPid where ctppage.divisionType='$division_id'";
$fetch_ctp_count_st = $connect->prepare($fetch_ctp_count);
$fetch_ctp_count_st->execute();
$total_count = $fetch_ctp_count_st->fetchColumn();

// Calculate the total number of pages
$total_pages = ceil($total_count / $items_per_page);
$page_number = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number from the query string
$offset = ($page_number - 1) * $items_per_page;

$fetch_ctp_course = "SELECT * FROM sidebar_ctp INNER JOIN ctppage ON sidebar_ctp.ctp_id =  ctppage.CTPid where ctppage.divisionType='$division_id' LIMIT $offset, $items_per_page";
$fetch_ctp_course_st = $connect->prepare($fetch_ctp_course);
$fetch_ctp_course_st->execute();

if ($fetch_ctp_course_st->rowCount() > 0) {
    $fetch_ctp_course_re = $fetch_ctp_course_st->fetchAll();
    $sectionIndex = 0;
    foreach ($fetch_ctp_course_re as $res_id) {
        // Your existing PHP code to display the paginated data here...
        // You can access data using $res_id['column_name']

        // Example code to display data
        $ctp_ides = $res_id['CTPid'];
        $sqles = "SELECT count(*) FROM `newcourse` WHERE CourseName = ?";
        $resultes = $connect->prepare($sqles);
        $resultes->execute([$ctp_ides]);
        $number_of_rows = $resultes->fetchColumn();
        if ($number_of_rows > 0) {
            $qs = $connect->prepare("SELECT course FROM `ctppage` WHERE CTPid=?");
            $qs->execute([$ctp_ides]);
            $namess = $qs->fetchColumn();

            $qc = $connect->prepare("SELECT color FROM `ctppage` WHERE CTPid=?");
            $qc->execute([$ctp_ides]);
            $namesc = $qc->fetchColumn();
?>

            <div class="col-6">

                <div class="card card-hover-shadow">

                    <?php
                    if ($namesc == "") {
                        $namesc = "#747474";
                    }
                    ?>

                    <div class="card-header card-header-content-between" style="background-color: <?php echo $namesc; ?>;">
                        <h6 class="h6" style="font-size:initial; color: white;"><?php echo $namess; ?></h6>
                        <input class="form-control searchInput" type="text" placeholder="search" style="width: 20%;border-radius: 1px; float:right;">
                    </div>


                    <div class="card-body">


                        <?php

                        $query1 = "SELECT newcourse.nick_name, newcourse.CourseCode, newcourse.CourseName, newcourse.Courseid
                    FROM newcourse
                    INNER JOIN sidebar_ctp ON newcourse.CourseName = sidebar_ctp.ctp_id
                     WHERE sidebar_ctp.ctp_id = '$ctp_ides'
                    GROUP BY CourseCode, CourseName";

                        $statement1 = $connect->prepare($query1);
                        $statement1->execute();

                        if ($statement1->rowCount() > 0) {
                            $result1 = $statement1->fetchAll();
                            $sectionIndex++;
                        ?>

                            <div class="row courses-section-<?php echo $sectionIndex; ?>">
                                <?php
                                foreach ($result1 as $row1) {
                                    $course_nickname = $row1['nick_name'];
                                    $symbol_name = $row1['CourseCode'];
                                    $course_name_value = $row1['CourseName'];
                                    $cor_name = $connect->prepare("SELECT symbol FROM ctppage WHERE CTPid=?");
                                    $cor_name->execute([$course_name_value]);
                                    $name_of_ctp = $cor_name->fetchColumn();
                                ?>

                                    <div class="col-4 course text-dark" style="cursor:pointer; border:1px solid #0000001a; border-radius:5px; text-align:center; margin-bottom: 2px;" data-name="<?php echo $name_of_ctp . ' - ' . '0' . $symbol_name ?>" data-class="<?php echo $row1['CourseName'] ?>" data-role="<?php echo $user_id ?>" id="<?php echo $row1['CourseCode'] ?>" data-value="<?php echo $row1['Courseid'] ?>" data-color="<?php echo $namesc; ?>">
                                        <?php echo $name_of_ctp . ' - '. $symbol_name ?>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>


                    </div>
                    <div style="float:right; margin:5px;">
                        <i style="float: right; font-size:large; padding: 2px 4px 2px 4px;" class="bi bi-arrow-right-short btn btn-sm load-more-btn btn-outline-primary" data-section="<?php echo $sectionIndex; ?>" data-current-page="1"></i>

                    </div>
                </div>
                <br>
            </div>
            <br>
<?php
                        }
                    }
                }
            }

            // Pagination links
            if ($total_pages > 1) {
                echo '<div>';
                echo '<div class="pagination" style="float:right;">';
                echo '<ul class="pagination">';
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo '<li class="page-item';
                    if ($i == $page_number) {
                        echo ' active';
                    }
                    echo '"><a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a></li>';
                }
                echo '</ul>';
                echo '</div>';
                echo '</div>';
            }
?>
<script>
    $('.course').on('click', function() {
        var countryID = $(this).data("value");
        var courceColor = $(this).data("color");
        var id = $(this).attr("id");
        var role = $(this).data("role");

        var class1 = $(this).data("class");
        var name = $(this).data("name");
        sessionStorage.setItem('co_name', name);
        sessionStorage.setItem('co_color', courceColor);
        sessionStorage.setItem('co_Ins', role);
        sessionStorage.setItem('co_Id', countryID);
        localStorage.setItem('courseId', id);
        localStorage.setItem('courseClass', class1);


        if (role) {
            $.ajax({
                type: 'POST',
                 url: '../check_cm_pm.php',
                data: 'u_id=' + role + '&class_id=' + countryID,
                success: function(response) {

                    // if (response == 'c1p1') {
                    //     $("#co_mana").show();
                    //     $("#phase_mana").show();
                    // } else if (response == 'c1') {
                    //     $("#co_mana").show();
                    //     $("#phase_mana").hide();
                    // } else if (response == 'p1') {
                    //     $("#co_mana").hide();
                    //     $("#phase_mana").show();
                    // } else {
                    //     $("#co_mana").hide();
                    //     $("#phase_mana").hide();
                    // }
                }
            });

        }
        if (countryID) {

            $.ajax({
                type: 'POST',
                url: '../selec_std.php',
                data: 'course=' + id + '&ides=' + class1,
                success: function(html) {

                    sessionStorage.setItem('id', countryID);
                    document.cookie = "course_ids = " + countryID;
                    document.cookie = "phpgetcourse = " + class1;
                    document.cookie = "allstudent2 = " + html;

                    localStorage.setItem('cookieCourseId', countryID);
                    localStorage.setItem('cookiePhpGetCourse', class1);

                    $('#state').append(html);
                    window.location.reload();
                }
            });
        }

    });

    $(document).ready(function() {
        var cId = localStorage.getItem('courseId');
        var cClass = localStorage.getItem('courseClass');
        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/selec_std1.php',
            data: 'course=' + cId + '&ides=' + cClass,
            success: function(html) {
                $('#newUserDetail').empty();
                $("#sideBarLoader").css("display","none");
                $('#newUserDetail').html(html);
                var getstudent1 = sessionStorage.getItem('student');
                $(".set_student" + getstudent1).removeClass("bg-soft-secondary");
                $(".set_student" + getstudent1).addClass("bg-success");
                $(".set_student" + getstudent1 + " span").removeClass("text-secondary");
                $(".set_student" + getstudent1 + " span").addClass("text-white");
            }
        });
    })
</script>
<script>
    $(document).ready(function() {
        // Function to handle the search input changes
        $(".searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            var courseList = $(this).closest(".col-6").find(".course");

            // Hide the courses that don't match the search input
            courseList.filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        const coursesPerPage = 6;

        function showCoursesInSection(sectionIndex, pageNumber) {
            const coursesSection = $('.courses-section-' + sectionIndex);
            const startIndex = (pageNumber - 1) * coursesPerPage;
            const endIndex = startIndex + coursesPerPage;
            coursesSection.find('.course').hide();
            coursesSection.find('.course').slice(startIndex, endIndex).show();
        }

        $('.load-more-btn').on('click', function() {
            const sectionIndex = $(this).data('section');
            const coursesSection = $('.courses-section-' + sectionIndex);
            const currentPage = parseInt($(this).data('current-page'));
            const totalPages = Math.ceil(coursesSection.find('.course').length / coursesPerPage);

            if (currentPage < totalPages) {
                const nextPage = currentPage + 1;
                showCoursesInSection(sectionIndex, nextPage);
                $(this).data('current-page', nextPage);
            } else {
                showCoursesInSection(sectionIndex, 1); // Reset to page 1 when reaching the last page
                $(this).data('current-page', 1); // Reset the current page to 1
            }
        });

        // Initialize each section's courses
        for (let i = 1; i <= <?php echo $sectionIndex; ?>; i++) {
            showCoursesInSection(i, 1);
        }
    });
</script>
<script>
    $(document).ready(function() {
        // Function to perform the search on h6 elements
        function performSearch() {
            var searchQuery = $('#shelfval').val().toLowerCase().trim();
            $('.h6').each(function() {
                var text = $(this).text().toLowerCase();
                if (text.indexOf(searchQuery) !== -1) {
                    $(this).show();
                    $(this).closest('.col-6').show(); // Show the col-6 element if h6 heading is matched
                    $(this).siblings('.container').find('.course').show();
                } else {
                    $(this).hide();
                    $(this).closest('.col-6').hide(); // Hide the col-6 element if h6 heading is not matched
                    $(this).siblings('.container').find('.course').hide();
                }
            });
        }

        // Attach event listener to the search input
        $('#shelfval').on('input', performSearch);
    });
</script>