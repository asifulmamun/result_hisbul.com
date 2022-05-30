<?php

    // Required Files
    require_once './../../init.php'; // DB
    require_once './config/conn.php'; // DB
    require_once './config/config.php'; // configuration


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
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <title><?php echo $template_titile; ?></title>
    <link rel="stylesheet" href="./dist/css/style.css">
</head>

<body>
    <div id="notice"></div>
    <div class="help">
        <h2>রেজাল্ট ডাউনলোড করতে নিচের ডাউনলোড বাটনে ক্লিক করুন</h2><button id="download"
            onclick="pdf()">ডাউনলোড</button>
    </div>
    <div id="root">
        <!-- <header><a href="./../"><img src="./../media/logo.png" alt="Logo"></a> -->
        <h1><?php echo $site_info->site_title; ?></h1>
        <h3><?php echo $site_info->title_tag; ?></h3>
        </header>
        <div id="student_info">
            <ul id="ul_student_info">
                <li><span>নামঃ&nbsp;</span><span id="name"></span></li>
                <li><span>রোলঃ&nbsp;</span><span id="roll"></span></li>
                <li><span>শাখাঃ&nbsp;</span><span id="branch_name"></span></li>
                <li><span>সর্বমোটঃ&nbsp;</span id="total_number"></span></li>
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
        <div id="route4"></div>
    </div>

    <div class="bottom_help"><button onclick="window.print()">প্রিন্ট</button><a class="button" href="./../">আরো রেজাল্ট
            দেখুন</a></div>
    <div id="route3"></div>
    <script src="./dist/js/app.js"></script>
    <script src="./dist/lib/htmlToPdf.js"></script>
    <script type="text/javascript">
    function pdf() {
        var t = document.getElementById("root");
        html2pdf().from(t).set({
            margin: 0,
            filename: "Result_hisbul.com-by_www.asifulmamun.info.pdf",
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                orientation: "portrait",
                unit: "in",
                format: "A4",
                compressPDF: !1
            }
        }).save()
    }
    </script>
    <!-- <small>Result By: <a href="https://asifulmamun.info">www.asifulmamun.info</a></small> -->
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