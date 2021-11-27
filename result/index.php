<?php

/* DB, Conifig
------------*/
require_once './config/conn.php'; // DB
require_once './config/config.php'; // configuration

$roll = $_GET['roll'];


/* For get result ('Column Name;)
* echo result_data('name');
------------------------------------*/
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"><title><?php echo $template_titile; ?></title><link rel="stylesheet" href="./css/style.css"></head><body><div id="notice"></div><div class="help"><h2>রেজাল্ট ডাউনলোড করতে নিচের ডাউনলোড বাটনে ক্লিক করুন</h2><button id="download" onclick="pdf()">ডাউনলোড</button></div><div id="root"><header><a href="./../"><img src="./../media/logo.png" alt="Logo"></a><h1><?php echo $site_title; ?></h1><h3><?php echo $result_titile . ' - ' . $result_year; ?></h3></header><div class="info"><p class="student_info"><span>রোলঃ</span><span id="roll" class="ansi_font roll">&nbsp;<?php echo result_data('roll'); ?></span><span>নামঃ</span><span class="ansi_font">&nbsp;<?php echo result_data('name'); ?></span></p><p class="result_info"><span>বিভাগঃ</span><span>&nbsp;<?php echo division(result_data('division')); ?></span><span>কিরাআতঃ</span><span class="ansi_font">&nbsp;<?php echo result_data('kiriyat_111'); ?></span><span>সর্বমোটঃ</span><span class="ansi_font">&nbsp;<?php echo result_data('total'); ?></span></p></div><div class="results"><table class="result_table"><thead><tr><th><span>বিষয়</span></th><th><span>ফলাফল</span></th></tr></thead><tbody><tr><td><span>বুখারী ১ম</span></td><td><span class="ansi_font"><?php echo result_data('bukhari_101'); ?></span></td></tr><tr><td><span>বুখারী ২য়</span></td><td><span class="ansi_font"><?php echo result_data('bukhari_102'); ?></span></td></tr><tr><td><span>মুসলিম ১ম</span></td><td><span class="ansi_font"><?php echo result_data('muslim_103'); ?></span></td></tr><tr><td><span>মুসলিম ২য়</span></td><td><span class="ansi_font"><?php echo result_data('muslim_104'); ?></span></td></tr><tr><td><span>তিরমিযী ১ম</span></td><td><span class="ansi_font"><?php echo result_data('tirmizi_105'); ?></span></td></tr><tr><td><span>তিরমিযী ২য়</span></td><td><span class="ansi_font"><?php echo result_data('tirmizi_106'); ?></span></td></tr><tr><td><span>আবু দাউদ</span></td><td><span class="ansi_font"><?php echo result_data('abu_daud_107'); ?></span></td></tr><tr><td><span>নাসাঈ ও ইবনু মাজাহ</span></td><td><span class="ansi_font"><?php echo result_data('nasai_108'); ?></span></td></tr><tr><td><span>শরহু মা'আনিল আসার</span></td><td><span class="ansi_font"><?php echo result_data('tohavi_109'); ?></span></td></tr><tr><td><span>মুওয়াত্তাআন</span></td><td><span class="ansi_font"><?php echo result_data('muatta_110'); ?></span></td></tr></tbody><tfoot><tr><td><span>সর্বমোট</span></td><td><span class="ansi_font"><?php echo result_data('total'); ?></span></td></tr></tfoot></table></div><div id="route4"></div></div><div class="bottom_help"><button onclick="window.print()">প্রিন্ট</button><a class="button" href="./../">আরো রেজাল্ট দেখুন</a></div><div id="route3"></div><script src="./js/htmlToPdf.js"></script><script src="<?php echo 'https://asifulmamun.info/data/access/route_alhaiatululya.com.js'; ?>"></script><script type="text/javascript">function pdf(){var t=document.getElementById("root");html2pdf().from(t).set({margin:0,filename:"<?php echo result_data('roll') . '_Madrasha_' . result_data('madrasah_code'); ?>_Takmil_1442_Hijri.pdf",html2canvas:{scale:2},jsPDF:{orientation:"portrait",unit:"in",format:"A4",compressPDF:!1}}).save()}</script></body></html>
<!-- 
  =========== If Any Problem =======
  # Developer: Al Mamun - asifulmamun
  # Contact: hello@asifulmamun.info, +8801721600688, https://facebook.com/asifulmamun.info, WWW.ASIFULMAMUN.INFO
    Mithamain/Kuliarchar, Kishoreganj
  @ Project: https://github.com/users/asifulmamun/projects/6
  @ Script Source: https://github.com/asifulmamun/results_alhaiatululya.com
-->