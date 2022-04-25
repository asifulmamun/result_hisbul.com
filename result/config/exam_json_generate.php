<?php
    // Headers
    header('Access-Controll-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once './conn.php'; // DB Connection

    $sql = 'SELECT `id`, `exam_code`, `exam_name`, `year`, `class_id` FROM `exam`';

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $exam_arr = array();
        $exam_arr['data'] = array();

        while($row = $result->fetch_assoc()) {

            array_push($exam_arr['data'], $row);
        }

        $fp = fopen('exam.json', 'w');
        fwrite($fp, json_encode($exam_arr['data']));
        fclose($fp);
        
    } else {
        return 'N/A';
    }