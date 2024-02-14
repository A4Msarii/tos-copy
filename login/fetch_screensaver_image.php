
<?php
include('../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

// Retrieve file names from the 'user_event' table
$indexevent = "SELECT * FROM user_event";
$indexstatementevent = $connect->prepare($indexevent);
$indexstatementevent->execute();
$indexeventdata = $indexstatementevent->fetchAll();

// Retrieve distinct titles from the 'user_event' table
// $titleQuery = "SELECT title FROM user_event";
// $title_data = $connect->prepare($titleQuery);
// $title_data->execute();
// $titledata = $title_data->fetchAll();

$html = '';

// Loop through the results and display them
foreach ($indexeventdata as $key => $dt) {
?>
    <div class="row">
        <p class="text" style="z-index: 999999999999999999999;position: relative;height: 100px;border: 2px solid #dddddd;;top: 16px;"><?php echo $dt['title']; ?></p>

        <img style="opacity: 1;height: 641px;position: relative;top: 5px;" src="<?php echo BASE_URL; ?>includes/Pages/events/<?php echo $dt['fileName']; ?>" id="slide<?php echo $key; ?>">
    </div>
<?php
    // $html .= '<h1>' . $titledata[$key]['title'] . '</h1>'; // Access the title from $titledata
    // $html .= '<img style="max-width: 100%; height: auto;" id="slide' . $key . '" src="';
    // $html .= BASE_URL . 'includes/Pages/events/' . $dt['fileName'];
    // $html .= '">';
}

// echo $html;
?>