<?php
//copyright Copyright (C) 2008 PHPRO.ORG. All rights reserved.
//version //autogentag//
//license new bsd http://www.opensource.org/licenses/bsd-license.php
//filesource
//package Breadcrumbs
//Author Kevin Waterson

class breadcrumbs{
   
  
//string, breadcrums
    public $breadcrumbs;

//string pointer
    private $pointer = '&raquo;';

//string url
    private $url;

//string parts
    private $parts;
    
//current script
    public $current_script;
    
//this is our constructor
    public function __construct()
    {
        $this->setParts();
        $this->setURL();
        $this->breadcrumbs = '<li><a href="'.$this->url.'">Home</a></li>';

    }

//set the base url, private function
    private function setURL()
    {
        #$protocol = $_SERVER["SERVER_PROTOCOL"]=='HTTP/1.1' ? 'http' : 'https';
        #$this->url = $protocol.'://'.$_SERVER['HTTP_HOST'];
        $this->url = '//'.$_SERVER['HTTP_HOST'];
    }

//set the pointer
    public function setPointer($pointer)
    {
        $this->pointer = $pointer;
    }

//make the array  of parts
    private function setParts()
    {
        $parts = explode('/', $_SERVER['REQUEST_URI']);
        array_pop($parts);
        array_shift($parts);
    $this->parts = $parts;
    }
//now make the breadcrumbs
    public function crumbs()
    {
        global $bc;
        
    //echo  '<ul class ="breadcrumbs">';
      

        foreach($this->parts as $part)
        {
    
        if($part != 'casinoreviews'){
            if($bc){ 
            $this->url .= "/$part";
            $this->breadcrumbs .= '<li>'.$this->pointer.'<a href="'.$this->url.'/"><span>'.ucfirst($part).'</span></a></li>';
                
            }
              elseif($part == end($this->parts)){
              $this->url .= '';
              $this->breadcrumbs .= '<li><a><span>'.ucfirst($part).'</span></a></li>';

             }
          }
   
        }
        //$this->current_script = '<li>'. basename($_SERVER['SCRIPT_NAME'],'.php').'</li>';

    //echo '</ul>';
    

    }

} //end of class




?>
