<?php

// Get Databse Information and Get Exam Data
class GetResult extends Database{


  // // Get Count of How Many Subjects are available in this classs
  // public function total_subjects($year, $exam_code, $roll){

  //   $results_table_name = 'results_' . $year; // Example: results_222
    
  //   $sql = 
  //     "SELECT `class`.`total_subject`
  //       FROM `$results_table_name` 
        
  //       INNER JOIN `exam` 
  //         ON  `exam`.`exam_code` = `$results_table_name`.`exam_code`
  //       INNER JOIN `class`
  //         ON `class`.`id` = `exam`.`class_id`
        
  //       WHERE `$results_table_name`.`roll` = $roll 
  //       AND `$results_table_name`.`exam_code` = $exam_code
  //     ";

  //   $stmt = $this->connect()->query($sql);
  //   return $stmt->fetch_assoc()['total_subject'];
  // } // total_subjects()


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
        INNER JOIN `subject`
          ON `subject`.`class_id` = `class`.`id`

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



  // // Result
  // public function result($year, $exam_code, $roll){

  //   $result = $this->result_data($year, $exam_code, $roll);

  //   $class_id = $result['class_id'];

  //   $sql_subjects = 
  //     " SELECT 
  //         `subject_id`,
  //         `subject_name`,
  //         `pass_marks`,
  //         `total_marks`
  //       FROM `subject`
  //       WHERE `class_id`=$class_id
  //     ";


  //   $stmt_results = $this->connect()->query($sql_subjects);
  //   $result += array('total_subjects'=>$stmt_results->num_rows);

  //   while ($data = $stmt_results->fetch_assoc()){
  //     $result += array('sub_'.$data['subject_id']=>$data['subject_name']);
  //     $result += array('sub_'.$data['subject_id'].'_total'=>$data['total_marks']);
  //     $result += array('sub_'.$data['subject_id'].'_pass'=>$data['pass_marks']);
  //   }

    
  //   return $result;
  // } // result()
  


} // class GetResult