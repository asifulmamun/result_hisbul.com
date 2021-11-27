-- Create Table
CREATE TABLE IF NOT EXISTS `alhasmtq_results1442`.`takmil_1442` (
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
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- check duplicate
/* SELECT
    roll, COUNT(roll)
FROM 
    takmil
GROUP BY
    roll
HAVING 
    COUNT(roll) > 1; */
