<?php

class TestController extends Controller{


    public function index()
    {
        $data=array(
            'name'=>'test'
        );
        $this->load_view('new_test',$data);
    }
}