<?php

function myError($errno, $errmsg, $errfile, $errline)
{
  $date = date("d-m-Y H:i:s");
  $str = "[$date] - $errmsg in $errfile:$errline\n";
  
  switch ($errno) {
    case E_USER_ERROR:
    case E_USER_WARNING:
    case E_USER_NOTICE:
      echo $errmsg;
      break;
//    default:
//      echo $errmsg;
  }
  
  error_log($str, 3, "error.log");
}

function drawMenu($menu, $vertical = TRUE)
{
  if ( ! is_array($menu)) {
    return FALSE;
  }
  
  echo "<ul>";
  foreach ($menu as $menuItem) {
    echo "<li " . (! $vertical ? "style='display: inline'" : '') . "><a href='{$menuItem['href']}'>{$menuItem['link']}</a></li>";
  }
  echo "</ul>";
  
  return TRUE;
}


function drawTable($cols, $rows, $color = 'indianred')
{
  echo "<table border='1' width=\"200\">";
  for ($i = 1; $i <= $cols; ++$i) {
    echo "<tr>";
    for ($j = 1; $j <= $rows; ++$j) {
      if ($i == 1 || $j == 1) {
        echo "<th style='text-align: center;background-color: $color'>" . $i * $j . "</th>";
      } else {
        echo "<td>" . $i * $j . "</td>";
      }
    }
    echo "</tr>";
  }
  echo "</table>";
}
