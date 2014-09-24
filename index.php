<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>XKCD Password Generator</title>
</head>
<body>
  <?php
  // Default password options
  $num_words = 4;
  $separator = '-';
  $capitalize_first_letter = false;
  $append_number = false;
  $append_symbol = false;

  // Update options based on user choices
  if(isset($_GET['num_words']) && is_numeric($_GET['num_words']) && $_GET['num_words'] > 0) {
    $num_words = intval($_GET['num_words']);
  }
  if(isset($_GET['capitalize_first_letter'])) {
    $capitalize_first_letter = true;
  }
  if(isset($_GET['append_number'])) {
    $append_number = true;
  }
  if(isset($_GET['append_symbol'])) {
    $append_symbol = true;
  }

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

  <form action="./" method="GET">
    <div class="field">
      <label for="num_words">Number of words</label>
      <input type="number" name="num_words" id="num_words" min="1" step="1" value="<?= $num_words; ?>">
    </div>
    <div class="field">
      <input type="checkbox" name="capitalize_first_letter" id="capitalize_first_letter" value="on" <?= $capitalize_first_letter ? 'checked="checked"' : '' ?>>
      <label for="capitalize_first_letter">Capitalize first letter</label>
    </div>
    <div class="field">
      <input type="checkbox" name="append_number" id="append_number" value="on" <?= $append_number ? 'checked="checked"' : '' ?>>
      <label for="append_number">Add a number</label>
    </div>
    <div class="field">
      <input type="checkbox" name="append_symbol" id="append_symbol" value="on" <?= $append_symbol ? 'checked="checked"' : '' ?>>
      <label for="append_symbol">Add a symbol</label>
    </div>
    <input type="submit" value="Generate!">
  </form>

  <script src="./js/serialize.js"></script>
  <script src="./js/main.js"></script>
</body>
</html>
