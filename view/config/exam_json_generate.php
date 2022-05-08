<?php
    // Headers
    header('Access-Controll-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once './conn.php'; // DB Connection


    // Get Databse Information and Get Exam Data
    class GetExam extends Database{

        public function exam(){

            $sql = 'SELECT `id`, `exam_code`, `exam_name`, `year`, `class_id` FROM `exam`';

            $result = $this->connect()->query($sql);

            if($result->num_rows > 0){
                while($rows = $result->fetch_assoc()){
                    
                    $data[] = $rows;
                }

                return $data;
            }

        }
    }


    $exam_arr = new GetExam();
    // print_r($exam_arr->exam());

    // Generate Json file from Exam Data
    $fp = fopen('./../../uploads/data/exams.json', 'w');
    fwrite($fp, json_encode($exam_arr->exam()));
    fclose($fp);