<?php

// Load the pspell library
pspell_new("en");

// Get the text to check from the POST request
$text = $_POST['text'];

// Split the text into words
$words = preg_split('/\s+/', $text);

// Check each word for spelling errors
$misspelled = array();
foreach ($words as $word) {
    if (!pspell_check($word)) {
        $suggestions = pspell_suggest($word);
        $misspelled[] = array(
            'word' => $word,
            'suggestions' => $suggestions
        );
    }
}

// Return the list of misspelled words and suggestions as JSON
echo json_encode($misspelled);

?>
