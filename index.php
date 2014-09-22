<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>XKCD Password Generator</title>
</head>
<body>
  <?php
  // Password options
  $num_words = 4;
  $separator = '-';
  $capitalize_first_letter = true;
  $append_number = true;
  $append_symbol = true;

  // Get contents of the words file
  $words_string = file_get_contents('./words.txt');

  // Separate the words into an array
  $words_array = explode("\n", $words_string);

  // Remove last element in array (will be blank)
  array_pop($words_array);

  $password = '';

  // Add words
  for($i = 0; $i < $num_words; $i++) {
    $password .= $words_array[mt_rand(0, sizeof($words_array) - 1)];

    // Append separator if word is not last
    if($i !== $num_words - 1) {
      $password .= $separator;
    }
  }

  // Capitalize first letter
  if($capitalize_first_letter) {
    $password = ucfirst($password);
  }

  // Append a number
  if($append_number) {
    $password .= mt_rand(0, 9);
  }

  // Append a symbol
  if($append_symbol) {
    $symbols = array('!', '@', '#', '$', '&', '?');
    $password .= $symbols[mt_rand(0, sizeof($symbols) - 1)];
  }
  ?>

  Password: <b><?= $password; ?></b>
</body>
</html>
