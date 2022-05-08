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
        public $favicon_icon = './dist/img/favicon.ico';
    }



    /* 
        ------ Site Information -------
    */
    class Info extends Link{
        
        // Head
        public $title_tag = 'February Result Management System';
        
        // Header
        public $site_title = 'FEB-RMS';
        
    
    }