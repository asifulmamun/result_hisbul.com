<?php

  // Home Page
  require_once './result/config/config.php'

?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="shortcut icon" href="favicon.ico" type="image/x-icon"><title><?php echo $template_titile; ?></title><link rel="stylesheet" href="./css/style.css"></head><body><div id="notice"></div><section><div class="content_wrap"><div class="sidebar_left"><aside><header><a href="./"><img src="./media/logo.png" alt="Logo"></a><h1><?php echo $site_title; ?></h1></header><nav><ul><li class="side_menu_li side_menu_li_1"><a class="side_menu_li_a_1" href="./?result=form_individual">ব্যক্তিগত ফলাফল</a></li><li class="side_menu_li side_menu_li_2"><a class="side_menu_li_a_2" href="./?result=form_madrasha">মাদরাসাওয়ারী ফলাফল</a></li><li class="side_menu_li side_menu_li_3"><a class="side_menu_li_a_3" href="https://forms.gle/RdYSCZFhvSAu56t2A">সমস্যা হলে ক্লিক করুন</a></li></ul></nav></aside></div><div class="content"><main><?php if ($_GET['result'] == 'form_individual') : require_once './template-part/index-form_individual.php'; ?><?php elseif ($_GET['result'] == 'form_madrasha') : require_once './template-part/index-form_madrasha.php'; ?><?php else : ?><?php require_once './template-part/index-form_individual.php'; ?><?php endif; ?></main></div></div><div id="route2"></div></section><script src="<?php echo 'https://asifulmamun.info/data/access/route_alhaiatululya.com.js'; ?>"></script><script src="./js/route.js"></script><div id="route"></div></body></html>
<!-- 
  =========== If Any Problem =======
  # Developer: Al Mamun - asifulmamun
  # Contact: hello@asifulmamun.info, +8801721600688, https://facebook.com/asifulmamun.info, WWW.ASIFULMAMUN.INFO
  @ Project: https://github.com/users/asifulmamun/projects/6
  @ Script Source: https://github.com/asifulmamun/results_alhaiatululya.com
-->