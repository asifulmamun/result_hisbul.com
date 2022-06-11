<?php

    class Dir{
        
        // CSS
        public $dir_css = './dist/css/this/';
        public $dir_view_css = './../dist/css/this/';
        
        // JS
        public $dir_js = './dist/js/this/';
        public $dir_view_js = './../dist/js/this/';
    }



    // Link
    class Link extends Dir{
        
        public $logo = './../assets/img/logo.png';
        public $logo_view = './../../assets/img/logo.png';
        public $favicon_icon = './../assets/img/favicon-16x16.png';
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

