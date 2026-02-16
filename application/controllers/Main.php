<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Main  extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->view('base/base');
    }


// Pages
    public function index(){

     

        $this->load->view("main/template/header",array("page_title"=>"Home"));
        $this->load->view("main/template/hero");
        $this->load->view("main/content/donation-component-2");
        $this->load->view("main/content/our-process");
        $this->load->view("main/template/footer");
    }
    
    public function about($type = null){
        $this->load->view("main/template/header",array("page_title"=>"About us"));
        

        if($type == "cfti"){
            $heroContent = array('image_name'=>"birthdayBanner.jpg",'heading_content'=>"About CFTI");
            $this->load->view('main/template/hero-banner',$heroContent);
            $this->load->view('main/content/about_cfti');
        }else if($type == "myschool"){
            $heroContent = array('image_name'=>"birthdayBanner.jpg",'heading_content'=>"About My School My Pride");
            $this->load->view('main/template/hero-banner',$heroContent);
            $this->load->view('main/content/about_myschool');
        }else{
            $heroContent = array('image_name'=>"birthdayBanner.jpg",'heading_content'=>"About us");
            $this->load->view('main/template/hero-banner',$heroContent);
            $this->load->view('main/content/about_new');
        }

        $this->load->view("main/template/footer");

    }

    public function howitworks(){
        $this->load->view("main/template/header",array("page_title"=>"How it Works"));
        
        $heroContent = array('image_name'=>"birthdayBanner.jpg",'heading_content'=>"How it Works");
        $this->load->view('main/template/hero-banner',$heroContent);

        $this->load->view('main/content/howitworks');

        $this->load->view("main/template/footer");

    }
// Pages


}


?>