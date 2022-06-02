<?php

    // Home Page
    require_once './../init.php';


    // Call Site Information from init.php
    $site_info = new Info();
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo $site_info->favicon_icon; ?>" type="image/x-icon">
    <title><?php echo $site_info->title_tag; ?></title>
    <link rel="stylesheet" href="<?php echo $site_info->dir_css; ?>style.css">
</head>

<body>
    <div id="notice"></div>
    <section>
        <div class="content_wrap">
            <div class="sidebar_left">
                <aside>
                    <header>
                        <a href="./"><img src="<?php echo $site_info->logo; ?>" alt="<?php echo $site_info->site_title; ?> - logo" width="" height=""></a>
                        <h1><?php echo $site_info->site_title; ?></h1>
                    </header>
                    <nav>
                        <ul>
                            <li class="side_menu_li side_menu_li_1"><a class="side_menu_li_a_1" href="./">Result</a></li>
                        </ul>
                    </nav>
                </aside>
            </div>
            <div class="content">
                <main>
                    <?php require_once './templates/index-form.php'; ?>
                </main>
            </div>
        </div>
    </section>
    <script src="<?php echo $site_info->dir_js; ?>app.js"></script>
</body>

</html>
<!-- 
  =========== If Any Problem =======
  # Developer: Al Mamun - asifulmamun
  # Contact: hello@asifulmamun.info, +8801721600688, https://facebook.com/asifulmamun.info, WWW.ASIFULMAMUN.INFO
  @ Project: https://github.com/users/asifulmamun/projects/6
  @ Script Source: https://github.com/asifulmamun/result_hisbul.com
-->
