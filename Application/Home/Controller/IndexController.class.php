<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //实例化模型
        $List = D('List');

        //‘推荐’新闻分类id
        $cid =1;
        //获取新闻列表
        $data = $List->getNews($cid);
        $this->assign('data',$data);

        $this->display();
    }
}