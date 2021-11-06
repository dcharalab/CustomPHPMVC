<?php
    class Pages extends Controller{
        public function __construct()
        {
           
        }

        public function index()
        { 
            $data = [
                'title'=> 'Posts',
                'description' => 'Simple social network built on the CustomMVC PHP'
            ];
            $this->view('pages/index', $data);
        }

        public function about()
        {
            $data = [
                'title'=> 'About',
                'description' => 'App to share posts'
            ];
            $this->view('pages/about',$data);
        }
    }