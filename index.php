<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>XKCD Password Generator</title>
</head>
<body>
  <?php
  require('./generate_password.php');
  $password = generate_password();
  ?>

  Password: <b id="password"><?= $password; ?></b>

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

  <script src="./js/debounce.js"></script>
  <script src="./js/serialize.js"></script>
  <script src="./js/main.js"></script>
</body>
</html>
