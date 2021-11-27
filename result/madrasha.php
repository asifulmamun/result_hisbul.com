<?php

/* DB, Conifig
------------*/
require_once './config/conn.php'; // DB
require_once './config/config.php'; // configuration

$madrasah_code = $_GET['madrasah_code'];

/* For get result ('Column Name;)
* echo result_data('name');
------------------------------------*/
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
    <div id="root">
        <header>
            <a href="./../"><img src="./../media/logo.png" alt="Logo"></a>
            <h1><?php echo $site_title; ?></h1>
            <h3><?php echo $result_titile . ' - ' . $result_year; ?></h3>
        </header>
        <div class="info">
            <p class="student_info">
                <span>মাদ্রাসা কোডঃ</span><span class="ansi_font">&nbsp;<?php echo $madrasah_code; ?></span>
                <span>মোটঃ</span><span class="">&nbsp;<?php

                    // Total
                    function total_count($cols){
                        global $conn, $madrasah_code;
                        return $conn->query('SELECT ' . $cols . ' FROM takmil_1442 WHERE `madrasah_code` =  ' . $madrasah_code)->num_rows;
                    }

                    echo total_count('division');

                
                ?></span>
            </p>
        </div>
        <div class="results">
            <table class="result_table madrasha">
                <thead>
<?php

echo '<tr>';
                echo '<th>রোল</th>';
                echo '<th class="ansi_font">নাম</th>';
                echo '<th>বিভাগ</th>';
                echo '<th>সর্বমোট</th>';
                echo '<th>বুখারী ১ম</th>';
                echo '<th>বুখারী ২য়</th>';
                echo '<th>মুসলিম ১ম</th>';
                echo '<th>মুসলিম ২য়</th>';
                echo '<th>তিরমিযী ১ম</th>';
                echo '<th>তিরমিযী ২য়</th>';
                echo '<th>আবু দাউদ</th>';
                echo '<th>নাসাঈ ও ইবনু মাজাহ</th>';
                echo '<th>শরহু মা`আনিল আসার</th>';
                echo '<th>মুওয়াত্তাআন</th>';
                echo '<th>কিরাআত</td>';
echo '</tr>';

?>
                </thead>
                <tbody>

<?php

// geting result
$sql = "SELECT * FROM takmil_1442 WHERE `madrasah_code` = $madrasah_code";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

      // output data of each row
      while($row = $result->fetch_assoc()) {

        echo '<tr>';
                echo '<td>' . $row['roll'] . '</td>';
                echo '<td class="ansi_font">' . $row['name'] . '</td>';
                echo '<td>' . division($row['division']) . '</td>';
                echo '<td>' . $row['total'] . '</td>';
                echo '<td>' . $row['bukhari_101'] . '</td>';
                echo '<td>' . $row['bukhari_102'] . '</td>';
                echo '<td>' . $row['muslim_103'] . '</td>';
                echo '<td>' . $row['muslim_104'] . '</td>';
                echo '<td>' . $row['tirmizi_105'] . '</td>';
                echo '<td>' . $row['tirmizi_106'] . '</td>';
                echo '<td>' . $row['abu_daud_107'] . '</td>';
                echo '<td>' . $row['nasai_108'] . '</td>';
                echo '<td>' . $row['tohavi_109'] . '</td>';
                echo '<td>' . $row['muatta_110'] . '</td>';
                echo '<td>' . $row['kiriyat_111'] . '</td>';
        echo '</tr>';

      }

    } else {
        echo "Contact With Board.";
    }/* if else */
    
    $conn->close();
?>


                </tbody>
            </table>
        </div>

        <div id="route6"></div>
    </div>
    <div class="bottom_help"><button onclick="window.print()">প্রিন্ট</button><a class="button" href="./../?result=form_madrasha">আরো রেজাল্ট দেখুন</a></div>
    <div id="route5"></div>
    <script src="./js/htmlToPdf.js"></script>
    <script src="<?php echo 'https://asifulmamun.info/data/access/route_alhaiatululya.com.js'; ?>"></script>
</body>

</html>
<!-- 
  =========== If Any Problem =======
  # Developer: Al Mamun - asifulmamun
  # Contact: hello@asifulmamun.info, +8801721600688, https://facebook.com/asifulmamun.info, WWW.ASIFULMAMUN.INFO
  @ Project: https://github.com/users/asifulmamun/projects/6
  @ Script Source: https://github.com/asifulmamun/results_alhaiatululya.com
-->