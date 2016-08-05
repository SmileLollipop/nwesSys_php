<?php
namespace Admin\Controller;
//新闻分类控制器
class CategoryController extends CommonController
{


    //分类列表
    public function index()
    {

        $Category = D('Category');
        $data = $Category->getData();
        $this->assign('category', $data);
        $this->display();


    }

    //添加分类
    public function add()
    {
        //实例化模型
        $Category = D('Category');

        if (IS_POST) {

            if (!$Category->create(null, 1)) {  //创建数据对象

                $this->assign('add_error', $Category->getError());

            } else if (!$Category->add()) {  //添加到数据库

                $this->error('添加失败：保存到数据库失败。');

            } else {    //添加成功

                $this->assign('success', '添加成功,可继续添加！');

            }
            if (isset($_POST['return'])) {

                $this->assign('add_error', null);
                $this->assign('success', null);

            }
            $data = $Category->getData();
            $this->assign('category', $data);
            $this->display('Category/index');


        }

    }

    //修改分类
    public function edit()
    {
        //获取参数
        $id = I('post.edit-id/d', 0); //待修改分类的ID，“/d”用于转换为整型

        //实例化模型
        $Category = D('Category');

        if (IS_POST) {

            if (!$Category->create(null, 2)) {  //创建数据对象

                $this->assign('edit_error', $Category->getError());

                if (isset($_POST['return'])) {
                    $this->assign('edit_error', null);
                }
                $data = $Category->getData();
                $this->assign('category', $data);
                $this->display('Category/index');

            } else if (false === $Category->where(array('id' => $id))->save()) {  //添加到数据库

                $this->error('添加失败：保存到数据库失败。');

            } else {    //添加成功

                $this->redirect('Category/index');

            }

        }


    }

    //删除分类
    public function del()
    {

        //获取参数
        $id = I('post.id/d', 0);  //待删除分类ID

        //生成跳转地址
        $jump = U('Category/index');
        //实例化模型
        $Category = M('Category');

        //检查表单令牌
        if (!$Category->autoCheckToken($_POST)) {
            $this->error('表单已过期，请重新提交', $jump);
        }
        //删除分类
        if (!$Category->where(array('id' => $id))->delete()) {
            $this->error('删除分类失败', $jump);
        }
        //删除成功，跳转到分类列表
        redirect($jump);
    }
}