<?php
    // Headers
    header('Access-Controll-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once './../../init.php'; // Initial File for DB Information
    require_once './conn.php'; // DB Connection


    // Get Databse Information and Get Exam Data
    class GetExam extends Database{

        public function exam(){

            $sql = "SELECT `id`, `exam_code`, `exam_name`, `year`, `class_id` FROM `exam`";

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
    $fp_exams = fopen('./../../uploads/data/exams.json', 'w');
    fwrite($fp_exams, json_encode($exam_arr->exam()));
    fclose($fp_exams);



    // Get Databse Information and Get Exam Data
    class GetSubjects extends Database{

        public function subject(){

            $sql = "SELECT `class_id`, `subject_id`, `subject_name`, `total_marks`, `pass_marks` FROM `subject`";

            $result = $this->connect()->query($sql);

            if($result->num_rows > 0){
                while($rows = $result->fetch_assoc()){
                    
                    $data[] = $rows;
                }

                return $data;
            }

        }
    }
    
    $subjects_arr = new GetSubjects();
    // print_r($subjects_arr->subject());

    // Generate Json file from Exam Data
    $fp_subjects = fopen('./../../uploads/data/subjects.json', 'w');
    fwrite($fp_subjects, json_encode($subjects_arr->subject()));
    fclose($fp_subjects);
    
