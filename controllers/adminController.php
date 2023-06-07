<?php

require_once(ROOT_PATH.'/core/controller.php');


class AdminController extends Controller
{

    public function index()
    {
        $data=array(
            'name'=>'admin'
        );
        $this->load_view('admin',$data);
    }

    public function admin()
    {
        $data = array();
        $products=ProductModel::all()->count();
        $categories=CategoryModel::all()->count();
        $orders=OrderModel::all()->count();
        $delivers=OrderModel::all()->count();

        $data=array(
            'products'=>$products,
            'categories'=>$categories,
            'orders'=>$orders,
            'delivers'=>$delivers,
        );
        $this->load_view('admin',$data);
    }

    

}