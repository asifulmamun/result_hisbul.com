<?php


// Get Databse Information and Get Exam Data
class GetResult extends Database{



  public function view($year, $exam_code, $roll){
      

    $results_table_name = 'results_' . $year; // Example: results_222
      
    $results_from_sub_code = '`' . $results_table_name . '`.`' . 101 . '`';
    for($i=101; $i < 121; $i++){
      $results_from_sub_code .= ',`' . $results_table_name . '`.`' . $i . '`';

    }

    

      
    $sql = 
      " SELECT 
          `exam`.`year`,
          `exam`.`exam_code`, 

          `class`.`class_name`,
          `class`.`total_subject`,
          
          `$results_table_name`.`roll`, 
          `$results_table_name`.`name`,

          $results_from_sub_code

        FROM `$results_table_name` 

        INNER JOIN `exam` 
          ON  `exam`.`exam_code` = `$results_table_name`.`exam_code`

        INNER JOIN `class`
          ON `class`.`id` = `exam`.`class_id`

        INNER JOIN `subject`
          ON `subject`.`class_id` = `class`.`id`

        WHERE `$results_table_name`.`roll` = $roll 
        AND `exam`.`exam_code` = $exam_code
      ";

      $result = $this->connect()->query($sql);

      if($result->num_rows > 0){
          while($rows = $result->fetch_assoc()){
              
              $data = $rows;
          }

          return $data;
          echo 'hell';
      }

  }
}



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