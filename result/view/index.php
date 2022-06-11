<?php

    // Required Files
    require_once './../../feb-config.php'; // config
    require_once './../../feb-includes/conn.php'; // DB
    require_once './../../feb-includes/result/view/control.php'; // Contlol/Lgic


    // Received by Get Method & Stored to variable
    $class_id = $_GET['class_id'];
    $total_subjects = $_GET['total_subjects'];
    $year = $_GET['years'];
    $exam_code = $_GET['exam_name'];
    $roll = $_GET['roll'];


    // Call Site Information from init.php
    $site_info = new Info();
    
    // Getting Result
    $sub_data = new GetResult();
    $data = json_encode($sub_data->result($year, $exam_code, $class_id, $total_subjects, $roll));

?>
<script>
var data = <?php echo $data; ?>; // Stored result to data variable as array
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <?php
        // Charset
        header('Content-Type: text/html; charset=utf-8');
    ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo $site_info->favicon_icon_view; ?>" type="image/x-icon">
    <title><?php echo $template_titile; ?></title>
    <link rel="stylesheet" href="./../dist/css/view/style.css">
</head>

<body>
    <div id="notice"></div>

    <div id="root">
        <header>
            <a href="./../"><img src="<?php echo $site_info->logo_view; ?>"
                    alt="<?php echo $site_info->site_title; ?> - Logo"></a>
            <h1><?php echo $site_info->site_title; ?></h1>
            <h3><?php echo $site_info->title_tag; ?></h3>
        </header>

        <div id="student_info">
            <ul id="ul_student_info">
                <li class="name"><span>নামঃ&nbsp;</span><span id="name"></span></li>
                <li class="roll"><span>রোলঃ&nbsp;</span><span id="roll"></span></li>
                <li class="branch_name"><span>শাখাঃ&nbsp;</span><span id="branch_name"></span></li>
                <li class="total_numbers"><span>সর্বমোটঃ&nbsp;</span><span id="total_numbers"></span></li>
            </ul>
        </div>

        <div class="results">
            <table class="result_table">
                <thead>
                    <tr>
                        <th><span>বিষয়</span></th>
                        <th><span>ফলাফল</span></th>
                    </tr>
                </thead>
                <tbody id="tbody_result">
                </tbody>
                <tfoot>
                    <tr>
                        <td><span>সর্বমোট</span></td>
                        <td><span id="total_number"></span></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="bottom_help">
        <button id="download" onclick="pdf()">Download</button>
        <button onclick="window.print()">প্রিন্ট</button>
        <button onclick="history.back()">আরো রেজাল্ট দেখুন</button>
    </div>

    <script src="./../dist/js/view/app.js"></script>
</body>

</html>
<!-- 
  =========== If Any Problem =======
  # Developer: Al Mamun - asifulmamun
  # Contact: hello@asifulmamun.info, +8801721600688, https://facebook.com/asifulmamun.info, WWW.ASIFULMAMUN.INFO
    Mithamain/Kuliarchar, Kishoreganj
  @ Project: https://github.com/users/asifulmamun/projects/6
  @ Script Source: https://github.com/asifulmamun/result_hisbul.com
-->