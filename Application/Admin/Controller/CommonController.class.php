<?php
/**
 * Created by PhpStorm.
 * User: Rachel
 * Date: 2016/7/1
 * Time: 10:32
 */
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
        public  function __construct(){
            parent::__construct();//先执行父类构造方法
                $this->checkUser();//登录检查
                //已经登录，为模块分配用户变量
                $this->assign('admin_name',session('userinfo.name'));
        }
        //检查用户是否已经登录
        private function checkUser(){
            if(!session('?userinfo')){//未登录，请先登录
                $this->redirect('Login/index');
            }
        }
}