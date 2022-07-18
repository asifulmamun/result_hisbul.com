<?php

    // Required Files
    $dir_root = './../../';
    $site_info = json_decode(file_get_contents($dir_root . 'uploads/data/site_info.json'), true); // Site Information echo "<pre>"; print_r($site_info); echo "</pre>";
    require_once $dir_root . 'feb-config.php'; // config
    require_once $dir_root . 'feb-includes/conn.php'; // DB
    require_once $dir_root . 'feb-includes/result/view/control.php'; // Contlol/Lgic

    // Received by Get Method & Stored to variable
    // $class_id = $_GET['class_id'];
    $total_subjects = $_GET['total_subjects'];
    $year = $_GET['years'];
    $exam_code = $_GET['exam_name'];
    // $roll = $_GET['roll'];

    // Getting Result
    $sub_data = new GetResultInstitute();
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
    <link rel="shortcut icon" href="<?php echo $dir_root . $site_info[3]['meta_value']; ?>" type="image/x-icon">
    <title><?php echo $site_info[0]['meta_value']; ?></title>
    <link rel="stylesheet" href="<?php echo $dir_root ?>result/dist/css/view/institute.css">
</head>

<body>
    <div id="root">
        <header>
            <a href="./../"><img src="<?php echo $dir_root . $site_info[2]['meta_value']; ?>"
                    alt="<?php echo $site_info[1]['meta_value']; ?> - Logo"></a>
            <h1><?php echo $site_info[1]['meta_value']; ?></h1>
            <h2 id="exam_name"></h2>
        </header>

        <section id="institute_result">
            <table id="inst_tbl">
                <thead>
                    <tr id="heading_inst_res">
                    </tr>
                </thead>
                <tbody id="inst_tbl_bdy">
                </tbody>
            </table>
        </section>
    </div>
    <div class="bottom_help">
        <button onclick="window.print()">প্রিন্ট</button>
        <button onclick="history.back()">আরো রেজাল্ট দেখুন</button>
    </div>
    <script src="<?php echo $dir_root ?>result/dist/js/view/institute.js"></script>
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