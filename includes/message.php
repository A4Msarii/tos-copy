<?php
function displayMSG()
{

    if (isset($_SESSION['success'])) {

        echo '<div class="bg-success text-center  justify-content-center pt-3 text-dark" style="position:absolute; top:10px;right:35%;width:500px;z-index:100000; border-radius:5px;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;" id="hidedive">
        <button type="button" class="btn-close" id="hideButton" data-bs-dismiss="alert" aria-label="Close" style="position:absolute;top:5px;right:5px;"></button>
        <h2 class="text-dark">' . $_SESSION['success'] . '</h2>
        </div>';
        // Clear the errors from the session
        unset($_SESSION['success']);
    } elseif (isset($_SESSION['info'])) {
        echo '<div class="bg-info text-center  justify-content-center pt-3 text-dark" style="position:absolute; top:10px;right:35%;width:500px;z-index:100000; border-radius:5px;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;" id="hidedive">
        <button type="button" class="btn-close" id="hideButton" data-bs-dismiss="alert" aria-label="Close" style="position:absolute;top:5px;right:5px;"></button>
        <h2 class="text-dark">' . $_SESSION['info'] . '</h2>
        </div>';
        // Clear the info from the session
        unset($_SESSION['info']);
    } elseif (isset($_SESSION['error'])) {
        echo '<div class="bg-danger  text-center justify-content-center pt-3 text-dark" style="position:absolute; top:10px;right:35%;width:500px;z-index:100000; border-radius:5px;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;" id="hidedive">
        <button type="button" class="btn-close" id="hideButton" data-bs-dismiss="alert" aria-label="Close" style="position:absolute;top:5px;right:5px;"></button>
        <h2 class="text-dark">' . $_SESSION['error'] . '</h2>
        </div>';
        // Clear the info from the session
        unset($_SESSION['error']);
    }elseif (isset($_SESSION['warning'])) {
        echo '<div class="bg-warning  text-center justify-content-center pt-3 text-dark" style="position:absolute; top:10px;right:35%;width:500px;z-index:100000; border-radius:5px;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;" id="hidedive">
        <button type="button" class="btn-close" id="hideButton" data-bs-dismiss="alert" aria-label="Close" style="position:absolute;top:5px;right:5px;"></button>
        <h2 class="text-dark">' . $_SESSION['warning'] . '</h2>
        </div>';
        // Clear the info from the session
        unset($_SESSION['warning']);
    }
    elseif (isset($_SESSION['danger'])) {
        echo '<div class="bg-danger  text-center justify-content-center pt-3 text-dark" style="position:absolute; top:10px;right:35%;width:500px;z-index:100000; border-radius:5px;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;" id="hidedive">
        <button type="button" class="btn-close" id="hideButton" data-bs-dismiss="alert" aria-label="Close" style="position:absolute;top:5px;right:5px;"></button>
        <h2 class="text-dark">' . $_SESSION['danger'] . '</h2>
        </div>';
        // Clear the info from the session
        unset($_SESSION['danger']);
    }
}

function time_elapsed_string($datetime) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    if ($now < $ago) {
    // The date is in the future, return "After"
    if ($diff->d === 0) {
        return 'Today After';
    } elseif ($diff->d === 1) {
        return 'Yesterday After';
    } elseif ($diff->d > 1 && $diff->d <= 7) {
        return $diff->d . ' Days After';
    } elseif ($diff->d > 7 && $diff->m === 0) {
        $weeks = floor($diff->d / 7);
        return $weeks . ' Week After' . ($weeks > 1 ? 's' : '');
    } elseif ($diff->m === 1) {
        return '1 Month After';
    } elseif ($diff->m > 1 && $diff->m <= 12) {
        return $diff->m . ' Months After';
    } else {
        $years = floor($diff->m / 12);
        return $years . ' Year After' . ($years > 1 ? 's' : '');
    }
}
else {
        // The date is in the past, return "Ago"
        if ($diff->d === 0) {
            return 'Today Ago';
        } elseif ($diff->d === 1) {
            return 'Yesterday Ago';
        } elseif ($diff->d > 1 && $diff->d <= 7) {
            return $diff->d . ' Days Ago';
        } elseif ($diff->d > 7 && $diff->m === 0) {
            $weeks = floor($diff->d / 7);
            return $weeks . ' Week Ago' . ($weeks > 1 ? '' : '');
        } elseif ($diff->m === 1) {
            return '1 Month Ago';
        } elseif ($diff->m > 1 && $diff->m <= 12) {
            return $diff->m . ' Months Ago';
        } else {
            $years = floor($diff->m / 12);
            return $years . ' Year Ago' . ($years > 1 ? '' : '');
        }
    }
}



function limitText($text, $limit) {
    if (strlen($text) > $limit) {
        $text = substr($text, 0, $limit) . "<span style='color: black;font-size: small;margin: 3px;padding: 3px;'>Read More</span>"; // Add ellipsis to indicate truncation
    }
    return $text;
}
function limitTexttitle($text, $limit) {
    if (strlen($text) > $limit) {
        $text = substr($text, 0, $limit) . ""; // Add ellipsis to indicate truncation
    }
    return $text;
}

?>