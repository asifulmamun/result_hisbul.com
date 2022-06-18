<?php

// Get Databse Information and Get Exam Data
class GetResult extends Database{

  // Main Results View
  public function result($year, $exam_code, $class_id, $total_subjects, $roll){
    
    $results_table_name = 'results_' . $year; // Example: results_222

    // column name loop for subject code then included to sql query
    $results_from_sub_code = '`' . $results_table_name . '`.`' . 101 . '`';
    for($i=101; $i <= 100+$total_subjects; $i++){
      $results_from_sub_code .= ',`' . $results_table_name . '`.`' . $i . '`';
    }

    
    $sql_results = 
      " SELECT 
          `exam`.`year`,
          `exam`.`exam_code`, 
          `exam`.`exam_name`, 
          `exam`.`class_id`, 
          `class`.`class_name`,
          `class`.`branch_name`,
          `class`.`total_subject`,
          `$results_table_name`.`roll`, 
          `$results_table_name`.`name`,
          $results_from_sub_code
        FROM `$results_table_name` 

        INNER JOIN `exam` 
          ON  `exam`.`exam_code` = `$results_table_name`.`exam_code`
        INNER JOIN `class`
          ON `class`.`id` = `exam`.`class_id`

        WHERE `$results_table_name`.`roll` = $roll 
        AND `$results_table_name`.`exam_code` = $exam_code
      ";


    $stmt_results = $this->connect()->query($sql_results);

    $data = array();

    if($stmt_results->num_rows > 0){
      $data += $stmt_results->fetch_assoc();
    }else{
      $data = 'Error';
    }

    return $data;
  } // result_data()

} // class GetResult


// Get Databse Information and Get Exam Data
class GetResultInstitute extends Database{

  // Main Results View
  public function result($year, $exam_code, $class_id, $total_subjects, $roll){
    
    $results_table_name = 'results_' . $year; // Example: results_222

    // column name loop for subject code then included to sql query
    $results_from_sub_code = '`' . $results_table_name . '`.`' . 101 . '`';
    for($i=101; $i <= 100+$total_subjects; $i++){
      $results_from_sub_code .= ',`' . $results_table_name . '`.`' . $i . '`';
    }

    
    $sql_results = 
      " SELECT 
          `exam`.`year`,
          `exam`.`exam_code`, 
          `exam`.`exam_name`, 
          `exam`.`class_id`, 
          -- `class`.`class_name`,
          -- `class`.`branch_name`,
          -- `class`.`total_subject`,
          `$results_table_name`.`roll`, 
          `$results_table_name`.`name`,
          $results_from_sub_code
        FROM `$results_table_name` 

        INNER JOIN `exam` 
          ON  `exam`.`exam_code` = `$results_table_name`.`exam_code`
        -- INNER JOIN `class`
        --   ON `class`.`id` = `exam`.`class_id`
        
        WHERE `$results_table_name`.`exam_code` = $exam_code
      ";

      $result = $this->connect()->query($sql_results);

      if($result->num_rows > 0){
          while($rows = $result->fetch_assoc()){
              
              $data[] = $rows;
          }

          return $data;
      }

  } // result_data()

} // class GetResult

?>