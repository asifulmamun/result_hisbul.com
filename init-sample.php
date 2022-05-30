<?php

    class Dir{
        
        // CSS
        public $dir_css = './dist/css/';
        
        // JS
        public $dir_js = './dist/js/';
    }



    // Link
    class Link extends Dir{
        
        public $logo = './dist/img/logo.png';
        public $favicon_icon = './dist/img/favicon-16x16.png';
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

