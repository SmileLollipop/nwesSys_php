<?php
/**
 * Created by PhpStorm.
 * User: Rachel
 * Date: 2016/7/1
 * Time: 23:05
 */
namespace Admin\Controller;
//新闻控制器
class ListController extends CommonController
{

    //新闻列表
    public function index()
    {
        //实例化模型
        $List = D('List');
        $Category = D('Category');

        //获取分类列表
        $data['category'] = $Category->getData();

        //获取参数
        $p = I('get.p/d',0);       //当前页码
        $cid = I('get.cid/d',-1);  //分类ID（0表示未分类，-1表示全部分类）

        //获取新闻列表
        $data['list'] = $List->getList($cid,$p);

        //防止空页被访问
        if(empty($data['list']['data']) && $p > 0){
            $this->redirect('List/index',array('cid'=>$cid));
        }

        $data['cid'] = $cid;
        $data['p'] = $p;

        $this->assign($data);
        $this->display();
    }

    //新闻添加
    public function add()
    {
        //获取新闻分类
        $Category = D('Category');
        $data = $Category->getData();
        $this->assign('category', $data);

        //添加新闻
        $List = D('List');
        //错误标志
        $flag=true;

        if (IS_POST) {

            if (!$List->create(null, 1)) {  //创建数据对象

                $this->assign('errors', $List->getError());
                $flag=false;

            }
            //处理特殊字段

            $List->img = '';      //新闻预览图

            //如果有图片上传，则上传并生成预览图
            if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
                $rst = $List->uploadImg('img');  //上传并生成预览图
                if (!$rst['flag']) {    //判断是否上传成功
                    $this->assign('uploadError', $rst['error']);
                    $flag=false;
                }
                    $List->img = $rst['path'];  //上传成功，保存文件路径
            }


            if($flag){

                //添加到数据库
                if (!$List->add()) {

                    $this->error('添加新闻失败！');
                }

                $this->assign('success', true);

            }else{ //显示旧的数据

                $old=array(
                    'cid' =>I('post.cid',0),
                    'title' =>I('post.title'),
                    'lable' =>I('post.lable'),
                );
                $this->assign('old',$old);
            }

        }

        $this->display();

    }

    //新闻删除
    public function del() {

        //获取参数
        $cid = I('get.cid/d',0); //分类ID
        $p = I('get.p/d',0);     //当前页码
        $id = I('post.id/d',0);  //待处理的新闻ID
        //生成跳转地址
        $jump = U('List/index',array('cid'=>$cid,'p'=>$p));
        //实例化模型
        $List = D('List');
        //检查表单令牌
        if(!$List->autoCheckToken($_POST)){
            $this->error('表单已过期，请重新提交',$jump);
        }
        //准备where条件
        $where = array('id'=>$id);
        //删除新闻图片
        $List->delImgFile($where);
        //删除新闻数据
        $List->where($where)->delete();
        //删除成功，跳转
        redirect($jump);

    }

    //新闻修改
    public function edit(){
        //获取参数
        $id = I('get.id/d',0);         //待修改新闻ID
        $p = I('get.p/d',0);           //当前页码
        $cid = I('get.cid/d',0,'abs'); //待修改新闻的分类ID
        //实例化模型
        $Category = D('Category');
        $List = D('List');
        //准备where条件
        $where = array('id'=>$id);

        //错误标志
        $flag=true;

        if(IS_POST){
            //创建数据对象
            if(!$List->create(null,2)){
                $this->assign('errors', $List->getError());
                $flag=false;
            }
            //处理特殊字段
            $List->cid = $cid;    //保存新闻分类

            //如果有预览图文件上传，则更新预览图
            if(isset($_FILES['img']) && $_FILES['img']['error']===0) {
                $rst = $List->uploadImg('img');  //上传并生成预览图
                if(!$rst['flag']){					  //判断是否上传成功
                    $this->assign('uploadError', $rst['error']);
                    $flag=false;
                }
                $List->img = $rst['path'];  //上传成功，保存文件路径
                $List->delImgFile($where);  //删除新闻图片
            }
            //修改新闻成功
            if($flag){

                //保存到数据库
                if(false === $List->where($where)->save()){
                    $this->error('修改新闻失败！');
                }
                $this->assign('success',true);

            }
        }
        //查询新闻数据
        $data['list'] = $List->getNews($where);
        if(!$data['list']){
            $this->error('修改失败：新闻不存在。');
        }


        //查询分类列表
        $data['category'] = $Category->getData();
        $data['cid'] = $cid;
        $data['id'] = $id;
        $data['p'] = $p;
        $this->assign($data);
        $this->display();
    }



}