<?php
    class Pages extends Controller{
        public function __construct()
        {
           
        }

        public function index()
        { 
            $data = ['title'=> 'MyCustomPHPMVC'];
            $this->view('pages/index', $data);
        }

        public function about()
        {
            $data = ['title'=> 'About'];
            $this->view('pages/about',$data);
        }
    }