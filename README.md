### Files

#### Permission
  You have permission for edit below files & folders which will not track by git:
  - init.php (copy from init-sample.php - do not delete sample file)
  - conn.php (copy from conn-sample.php - do not delete sample file)
  
    
    >Before you need to give permission a+rwx to uploads folder
  - uploads/data (here you can put any json file it will be not track by git)
  - uploads/images (here you can upload or put any images files, it will be not track by git)

#### Exam JSON generate file
  ./result/config/exam_json_generate.php  - Generation Json file (exams.json) for loading exam name in form
    There is static json file for fast loading if need or update any exam you need to create new (exams.json) file. This json file auto generat when execute/visit/run this phpfile (./result/config/exam_json_generate.php).
    This (exam.json) file will not include any git tracking.


### Why I'm use this
I've found it from github, it's copyright and licens info is written below.
I am just create for my pracice and it make for my class assignment for my University, Norhtern College, Bangladesh.



### createPdf

  It's found from internet
  If you want to edit this just your content find <div id="root"> and start your content uder this div id.
  
  Example
  --------
  <div id="root">
    .............
    .............
      Content
    .............
    .............
  </div>
    
  Any one can use this template it's open source.
  I've found this
  ------------------
    * @overview es6-promise - a tiny implementation of Promises/A+.
    * @copyright Copyright (c) 2014 Yehuda Katz, Tom Dale, Stefan Penner and contributors (Conversion to ES6 API by Jake Archibald)
    * @license   Licensed under MIT license
    * See https://raw.githubusercontent.com/stefanpenner/es6-promise/master/LICENSE
    * @version   v4.2.5+7f2b526d

  this is file for create pdf
  PDF Deatailse below noe
    -----------------------
    Name                : Sample of (Northern College Bangladesh, SPL Practical Coverpage)
    Paper size          : A4
    Main Content Area   : <duv id="root"> //this id is required !important.

  It has more than file
  but you need to just edit index.php form with your midification and coverpage.php with your modification but under the <div id="root"> you need to all edit for your pdf.

  Size: A4

  You can change any where in file but dont touth js file and under js folder and dont touth any another css must #roo id but you can change any css and make multi file and multi paper size from edit coverpage.php below you find this size. Multi size paper and multi file with multi form or another data you can make this pdf.

  Thank you.
