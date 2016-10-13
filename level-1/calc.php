<?php
$num1 = 0;
$num2 = 0;
$operator = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $num1 = abs((int) $_POST['num1']);
  $operator = trim(strip_tags($_POST['operator']));
  $num2 = abs((int) $_POST['num2']);
  
  switch ($operator) {
    case 'plus':
      $res = $num1 + $num2;
      $resStr = "$num1 + $num2 = $res";
      break;
    case 'minus':
      $res = $num1 - $num2;
      $resStr = "$num1 - $num2 = $res";
      break;
    case 'mult':
      $res = $num1 * $num2;
      $resStr = "$num1 * $num2 = $res";
      break;
    case 'div':
      if ($num2 == 0) {
        $res = FALSE;
        $resStr = 'На ноль делить нельзя';
        break;
      }
      
      $res = $num1 / $num2;
      $resStr = "$num1 / $num2 = $res";
      break;
    default:
      $res = FALSE;
      $resStr = "Не верный оператор";
  }
  
  
}
?>
<!-- Область основного контента -->
<form action='<?= $_SERVER['REQUEST_URI'] ?>' method="post">
  <p>
    Результат: <?= $resStr ?>
  </p>
  <label>Число 1:</label>
  <br />
  <input name='num1' type='number' value="<?= $num1 ?>" />
  <br />
  <label>Оператор: </label>
  <br />
  <select name="operator">
    <option value="plus" <?= $operator == 'plus' ? 'selected' : '' ?>>+</option>
    <option value="minus" <?= $operator == 'minus' ? 'selected' : '' ?>>-</option>
    <option value="mult" <?= $operator == 'mult' ? 'selected' : '' ?>>*</option>
    <option value="div" <?= $operator == 'div' ? 'selected' : '' ?>>/</option>
  </select>
  <br />
  <label>Число 2: </label>
  <br />
  <input name='num2' type='number' value="<?= $num2 ?>" />
  <br />
  <br />
  <input type='submit' value='Считать'>
</form>
<!-- Область основного контента -->