<?php

/* DB, Conifig
------------*/
require_once './config/conn.php'; // DB
require_once './config/config.php'; // configuration

$roll = $_GET['roll'];
$year = $_GET['year'];
$month = $_GET['month'];
$training_id = $_GET['training_id'];

$training_name = NULL;

if ($training_id == 1){
    $training_name = "হুফফাজ প্রশিক্ষণ";

} elseif($training_id == 2){
    $training_name = "নূরানী মু'আল্লিম প্রশিক্ষণ";

} elseif($training_id == 3){
    $training_name = "বাংলা নূরানী প্রশিক্ষণ";

} elseif($training_id == 4){
    $training_name = "ক্বারিয়ানা";

} elseif($training_id == 5){
    $training_name = "মু'আল্লিমা ";

}else{
    $training_name = NULL;
}


/* For get result ('Column Name;)
* echo result_data('name');
------------------------------------*/

// Calculatoin
$total = result_data('101');
$total += result_data('102');
$total += result_data('103');
$total += result_data('104');
$total += result_data('105');
$total += result_data('106');
$total += result_data('107');

// Avarage & division
$avarage = round($total/7);

$division = "রাসিব (ফেল)";
if($avarage < 35){
    $division = "রাসিব (ফেল)";

} elseif($avarage < 50){
    $division = "মাক্ববূল";

} elseif($avarage < 65){
    $division = "জাইয়িদ";

} elseif($avarage < 80){
    $division = "জাইয়িদ জিদ্দান";

} elseif($avarage <= 100){
    $division = "মুমতায";

} else{
    $division = "রাসিব (ফেল)";
} 



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            <p class="student_info"><span>রোলঃ</span><span id="roll"
                    class="ansi_font roll">&nbsp;<?php echo result_data('roll'); ?></span><span>নামঃ</span><span
                    class="ansi_font">&nbsp;<?php echo result_data('name'); ?></span></p>
            <p class="result_info">
                <span>বিভাগঃ</span><span>&nbsp;<?php echo $division; ?></span>
                <span>সর্বমোটঃ</span><span class="ansi_font">&nbsp;<?php echo $total; ?></span></p>
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
            filename: "<?php echo result_data('roll') . '_Madrasha_' . result_data('madrasah_code'); ?>_Takmil_1442_Hijri.pdf",
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