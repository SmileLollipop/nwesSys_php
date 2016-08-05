<?php
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model
{
	//表单字段过滤
	protected $insertFields = 'name';
	protected $updateFields = 'name';

	//自动验证表单
	protected $patchValidate = true;
	protected $_validate = array(
		array('name','require','分类名不能为空 !',self::MUST_VALIDATE),
	);


	//查询分类数据
	public function getData()
	{
		static $data = null;  //缓存查询结果
		if (!$data) $data = $this->field('id,name')->select();
		return $data;
	}



}