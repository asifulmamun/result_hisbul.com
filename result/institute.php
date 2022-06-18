<?php

    // Home Page
    $dir_root = './../';
    $site_info = json_decode(file_get_contents($dir_root . 'uploads/data/site_info.json'), true); // Site Information echo "<pre>"; print_r($site_info); echo "</pre>";
    require_once $dir_root . 'feb-config.php';


    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo $dir_root . $site_info[2]['meta_value']; ?>" type="image/x-icon">
    <title><?php echo $site_info[0]['meta_value']; ?></title>
    <link rel="stylesheet" href="./dist/css/this/style.css">
</head>

<body>
    <div id="notice"></div>
    <section>
        <div class="content_wrap">
            <div class="sidebar_left">
                <aside>
                    <header>
                        <a href="./"><img src="<?php echo $dir_root . $site_info[2]['meta_value']; ?>" alt="<?php echo $site_info[1]['meta_value'];  ?> - logo" width="" height=""></a>
                        <h1><?php echo $site_info[1]['meta_value']; ?></h1>
                    </header>
                    <nav>
                        <ul>
                            <li class="side_menu_li side_menu_li_2"><a class="side_menu_li_a_2" href="./">Result</a></li>
                            <li class="side_menu_li side_menu_li_1"><a class="side_menu_li_a_1" href="./institute.php">Institute Wise</a></li>
                        </ul>
                    </nav>
                </aside>
            </div>
            <div class="content">
                <main>
                    <h2>ফলাফল</h2>
                    <form action="./view/institute.php" method="GET">
                        <p class="result_form">
                            <input id="class_id" type="hidden" name="class_id" value="0">
                            <input id="total_subjects" type="hidden" name="total_subjects" value="0">
                            
                            <select id="years" name="years">
                                <option value="0">Select Year</option>
                            </select>

                            <select id="exam_name" name="exam_name">
                                <option value="1">Select Exam</option>
                            </select>

                            <input id="roll" type="text" name="roll" placeholder="রোল নং ইংরেজিতে ...">
                            <button id="submit" type="submit">Submit</button>
                        </p>
                    </form>
                </main>
            </div>
        </div>
    </section>
    <script src="./dist/js/this/app.js"></script>
</body>

</html>
<!-- 
  =========== If Any Problem =======
  # Developer: Al Mamun - asifulmamun
  # Contact: hello@asifulmamun.info, +8801721600688, https://facebook.com/asifulmamun.info, WWW.ASIFULMAMUN.INFO
  @ Project: https://github.com/users/asifulmamun/projects/6
  @ Script Source: https://github.com/asifulmamun/result_hisbul.com
-->
