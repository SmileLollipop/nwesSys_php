<?php
namespace Home\Model;
use Think\Model;
class ListModel extends Model {


    // 根据新闻分类id查询新闻数据
    public function getNews($cid){
        //排序条件
        $order = 'id desc';
        $where['cid']=$cid;
        return $this->where($where)->order($order)->select();
    }




} 