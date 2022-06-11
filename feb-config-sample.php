<?php

    // Link
    class Link{
        
        public $logo_result = './../assets/img/logo.png';
        public $logo_view = './../../assets/img/logo.png';
        public $favicon_icon_result = './../assets/img/favicon-16x16.png';
        public $favicon_icon_view = './../../assets/img/favicon-16x16.png';
    }

    /* 
        ------ Site Information -------
    */
    class Info extends Link{
        
        // Head
        public $title_tag = 'February Education Management System';
        
        // Header
        public $site_title = 'FEB-EMS';
        
    
    }


    /* 
        ------ Database -------
    */
    class DatabaseInfo{

        // Database Information
        protected $servername = "localhost";
        protected $username = "asifulmamun";
        protected $password = "";
        protected $dbname = "febrms";
        
    }

