<?php
namespace Admin\Model;
use Think\Model;
class ListModel extends Model {
    //表单字段过滤
    protected $insertFields = 'cid,title,lable';
    protected $updateFields = 'cid,title,lable';

    //自动验证
    protected $patchValidate = true;

    protected $_validate = array(
        array('title','require','新闻标题不能为空！',self::MUST_VALIDATE),
        array('lable','require','新闻标签不能为空！',self::MUST_VALIDATE),
        array('title','1,60','新闻标题不合法（1-60个字符）',self::MUST_VALIDATE,'length'),
        array('lable','1,20','新闻标签不合法（1-20个字符）',self::MUST_VALIDATE,'length'),
    );

    /**
     * 新闻列表
     * @param $cid 分类ID
     * @param int $p 当前页码
     * @return array 查询结果
     */
    public function getList($cid=-1,$p=0){
        //准备查询条件
        $order = 'list.id desc';        //排序条件
        $field = 'c.name as category_name,list.cid,list.id,list.title,list.lable,list.img,list.time';

        //cid=0查找未分类商品，cid>0查找分类ID数组商品，cid<0查找全部商品
        if($cid>=0){

            $where['list.cid']=$cid;
        }

        //准备分页查询
        $pagesize = C('USER_CONFIG.pagesize');              //每页显示商品数
        $count = $this->alias('list')->where($where)->count(); //获取符合条件的商品总数
        $Page = new \Think\Page($count,$pagesize);          //实例化分页类
        $this->_customPage($Page);
                                //定制分页类样式
        //查询数据
        $data = $this->alias('list')->join('__CATEGORY__ AS c ON c.id=list.cid','LEFT')->field($field)
            ->where($where)->order($order)->page($p,$pagesize)->select();

        //返回结果
        return array(
            'data' => $data,              //新闻列表数组
            'pagelist' => $Page->show(),  //分页链接HTML
        );
    }

    //定制分页类样式
    private function _customPage($Page){
        $Page->lastSuffix = false;
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('first','首页');
        $Page->setConfig('last','尾页');
    }


   // 根据$where条件查询新闻数据
    public function getNews($where){
        //定义需要的字段
        $field = 'id,cid,title,lable,img';
        return $this->field($field)->where($where)->find();
    }



    //根据$where条件删除新闻预览图文件
    public function delImgFile($where){
        //取出原图文件名
        $img = $this->where($where)->getField('img');
        if(!$img) return ;  //商品图片不存在时直接返回
        $path = "./Public/Uploads/big/$img";    //准备大图路径
        if(is_file($path)) unlink($path);         //删除大图文件
        $path = "./Public/Uploads/small/$img";  //准备小图路径
        if(is_file($path)) unlink($path);         //删除小图文件
        //会残留空目录，可以通过其它方式定期清理
    }

    //上传预览图文件并生成缩略图
    //返回数组（flag=是否执行成功，error=失败时的错误信息，path=成功时的保存路径）
    public function uploadImg($upfile){
        //准备上传目录
        $file['temp'] = './Public/Uploads/temp/';                       //准备临时目录
        file_exists($file['temp']) or mkdir($file['temp'],0777,true);   //自动创建临时目录
        //上传文件
        $Upload = new \Think\Upload(array(
            'exts' => array('jpg','jpeg','png','gif'), //允许的文件后缀
            'rootPath' => $file['temp'],               //文件保存路径
            'autoSub' => false,                        //不生成子目录
        ));
        if(false===($rst = $Upload->uploadOne($_FILES[$upfile]))){
            //上传失败时，返回错误信息
            return array('flag'=>false,'error'=>$Upload->getError());
        }
        //准备生成缩略图
        $file['name'] = $rst['savename'];						  //文件名
        $file['save'] = date('Y-m/d/');                           //子目录
        $file['path1'] = './Public/Uploads/big/'.$file['save'];   //大图路径
        $file['path2'] = './Public/Uploads/small/'.$file['save']; //小图路径
        //创建保存目录
        file_exists($file['path1']) or mkdir($file['path1'],0777,true);
        file_exists($file['path2']) or mkdir($file['path2'],0777,true);
        //生成缩略图
        $Image = new \Think\Image();                //实例化图像处理类
        $Image->open($file['temp'].$file['name']);  //打开文件
        $Image->thumb(300,250,2)->save($file['path1'].$file['name']);//保存大图
        $Image->open($file['temp'].$file['name']);  //再次打开文件
        $Image->thumb(95,68,2)->save($file['path2'].$file['name']);//保存小图
        unlink($file['temp'].$file['name']);        //删除临时文件
        //返回文件路径
        return array('flag'=>true,'path'=>$file['save'].$file['name']);
    }




} 