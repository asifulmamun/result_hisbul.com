<?php
    // Headers
    header('Access-Controll-Allow-Origin: *');
    header('Content-Type: application/json');


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
    $fp_exams = fopen('./../uploads/data/exams.json', 'w');
    if($fp_exams){
        fwrite($fp_exams, json_encode($exam_arr->exam()));
        fclose($fp_exams);
        echo '
            Successfully created the json file for Exam Information.
            ';
    }else{
        echo '
            !.. Oh sorry, Not Create json for Exam Information.
        ';
    }
    



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
    $fp_subjects = fopen('./../uploads/data/subjects.json', 'w');
    if($fp_subjects){
        fwrite($fp_subjects, json_encode($subjects_arr->subject()));
        fclose($fp_subjects);
        echo '
            Successfully created the json file for Subject Information.
        ';
    }else{
        echo '
            !.. Oh sorry, Not Create json for Subject Information.
        ';
    }



    // Get Databse Information and Get Exam Data
    class GetGrade extends Database{

        public function subject(){

            $sql = "SELECT `meta_key`, `meta_value`, `comment` FROM `meta_info` WHERE `comment`='grade'";

            $result = $this->connect()->query($sql);

            if($result->num_rows > 0){
                while($rows = $result->fetch_assoc()){
                    
                    $data[] = $rows;
                }

                return $data;
            }

        }
    }
    
    $grade_arr = new GetGrade();
    // print_r($grade_arr->subject());

    // Generate Json file from Exam Data
    $fp_grade = fopen('./../uploads/data/grades.json', 'w');
    if($fp_grade){
        fwrite($fp_grade, json_encode($grade_arr->subject()));
        fclose($fp_grade);
        echo '
            Successfully created the json file for Grade Information.
        ';
    }else{
        echo '
            !.. Oh sorry, Not Create json for Grade Information.
        ';
    }
