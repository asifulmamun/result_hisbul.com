<?php

// DB Connection
require_once './conn.php';

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS `$dbname`.`takmil_1442` (
    `madrasah_code` varchar(50),
    `roll` varchar(50),
    `bukhari_101` varchar(250),
    `bukhari_102` varchar(250),
    `muslim_103` varchar(250),
    `muslim_104` varchar(250),
    `tirmizi_105` varchar(250),
    `tirmizi_106` varchar(250),
    `abu_daud_107` varchar(250),
    `nasai_108` varchar(250),
    `tohavi_109` varchar(250),
    `muatta_110` varchar(250),
    `kiriyat_111` varchar(250),
    `total` varchar(250),
    `division` varchar(250),
    `name` longtext
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
    
if ($conn->query($sql) === TRUE) {
    echo "You have success to create table and column. Now download your CSV file from google sheet then upload/import with phpmyadmin at database. If getting problem Contact with Al Mamun - asifulmamun - +8801721600688";
} else {
    echo "Error creating table: " . $conn->error . "Contact with Al Mamun - asifulmamun - +8801721600688, hello@asifulmamun.info";
}

$conn->close();