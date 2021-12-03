<?php

// Get Result
function result_data($col_name){
  global $conn, $roll, $year, $month, $training_id;

  $result_id = 'results_'.$year;

  $sql = "SELECT * FROM $result_id WHERE `roll` = $roll AND `month` = $month AND `training_id` = $training_id";
  $result = $conn->query($sql);


  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      return $row[$col_name];
    }
  } else {

    return 'N/A';
  }
}

// variable
$site_title = "হিসবুল মু'আল্লিমীন বাংলাদেশ";
$result_titile = 'পরীক্ষার ফলাফল';
$result_year = '২০২১ ঈসাব্দ';
$template_titile = $result_titile.$result_year;