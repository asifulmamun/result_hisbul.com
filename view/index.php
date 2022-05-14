<?php

    // Received by Get Method & Stored to variable
    $year = $_GET['years'];
    $exam_code = $_GET['exam_name'];
    $roll = $_GET['roll'];


    // Required Files
    require_once './../init.php'; // DB
    require_once './config/conn.php'; // DB
    require_once './config/config.php'; // configuration


    // Call Site Information from init.php
    $site_info = new Info();

    // Getting Result
    $sub_data = new GetResult();
    $data = $sub_data->result($year, $exam_code, $roll);
    


    echo '<pre>';
    print_r($data);
    echo '</pre>';











/* For get result ('Column Name;)
* echo result_data('name');
------------------------------------*/

// // Calculatoin
// $total = result_data('101');
// $total += result_data('102');
// $total += result_data('103');
// $total += result_data('104');
// $total += result_data('105');
// $total += result_data('106');
// $total += result_data('107');

// Avarage & division
// $avarage = round($total/7);

// $division = "রাসিব (ফেল)";
// if($avarage < 35){
//     $division = "রাসিব (ফেল)";

// } elseif($avarage < 50){
//     $division = "মাক্ববূল";

// } elseif($avarage < 65){
//     $division = "জাইয়িদ";

// } elseif($avarage < 80){
//     $division = "জাইয়িদ জিদ্দান";

// } elseif($avarage <= 100){
//     $division = "মুমতায";

// } else{
//     $division = "রাসিব (ফেল)";
// } 



?>
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
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div id="notice"></div>
    <div class="help">
        <h2>রেজাল্ট ডাউনলোড করতে নিচের ডাউনলোড বাটনে ক্লিক করুন</h2><button id="download"
            onclick="pdf()">ডাউনলোড</button>
    </div>
    <div id="root">
        <header><a href="./../"><img src="./../media/logo.png" alt="Logo"></a>
            <h1><?php echo $site_title; ?></h1>
            <h3><?php echo $result_titile . ' - ' . $year . ' (' . $training_name . ')'; ?></h3>
        </header>
        <div class="info">
            <p class="student_info">
                <span>নামঃ</span><span class="ansi_font">&nbsp;<?php echo result_data('name'); ?></span>
                <span>রোলঃ</span><span id="roll" class="ansi_font roll">&nbsp;<?php echo result_data('roll'); ?></span>
            </p>
            <p class="result_info">
                <span>বিভাগঃ</span><span>&nbsp;<?php echo $division; ?></span>
                <span>সর্বমোটঃ</span><span class="ansi_font">&nbsp;<?php echo $total; ?></span>
            </p>
        </div>
        <div class="results">
            <table class="result_table">
                <thead>
                    <tr>
                        <th><span>বিষয়</span></th>
                        <th><span>ফলাফল</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span>হাদীস মাসআলা</span></td>
                        <td><span class="ansi_font"><?php echo result_data('101'); ?></span></td>
                    </tr>
                    <tr>
                        <td><span>তাজবীদ মৌখিক</span></td>
                        <td><span class="ansi_font"><?php echo result_data('102'); ?></span></td>
                    </tr>
                    <tr>
                        <td><span>তাজবীদ লিখিত</span></td>
                        <td><span class="ansi_font"><?php echo result_data('103'); ?></span></td>
                    </tr>
                    <tr>
                        <td><span>কুরআন শরীফ</span></td>
                        <td><span class="ansi_font"><?php echo result_data('104'); ?></span></td>
                    </tr>
                    <tr>
                        <td><span>বাংলা</span></td>
                        <td><span class="ansi_font"><?php echo result_data('105'); ?></span></td>
                    </tr>
                    <tr>
                        <td><span>অংক</span></td>
                        <td><span class="ansi_font"><?php echo result_data('106'); ?></span></td>
                    </tr>
                    <tr>
                        <td><span>ইংরেজি</span></td>
                        <td><span class="ansi_font"><?php echo result_data('107'); ?></span></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td><span>সর্বমোট</span></td>
                        <td><span class="ansi_font"><?php echo $total; ?></span></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div id="route4"></div>
    </div>

    <div class="bottom_help"><button onclick="window.print()">প্রিন্ট</button><a class="button" href="./../">আরো রেজাল্ট
            দেখুন</a></div>
    <div id="route3"></div>
    <script src="./js/htmlToPdf.js"></script>
    <script type="text/javascript">
    function pdf() {
        var t = document.getElementById("root");
        html2pdf().from(t).set({
            margin: 0,
            filename: "Result_hisbul.com-<?php echo $roll; ?>_<?php echo $year; ?>_<?php echo $month; ?>-by_www.asifulmamun.info.pdf",
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
    <small>Result By: <a href="https://asifulmamun.info">www.asifulmamun.info</a></small>
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