<?php
namespace Home\Controller;
use Think\Controller;
class BaijiaController extends Controller {
    public function index(){
        //实例化模型
        $List = D('List');

        //‘推荐’新闻分类id
        $cid =2;
        //获取新闻列表
        $data = $List->getNews($cid);
        $this->assign('data',$data);

        $this->display();
    }
}