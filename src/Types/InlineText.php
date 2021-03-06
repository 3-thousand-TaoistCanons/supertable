<?php
/**
 * Type InlineText
 *
 * CLASS 
 *
 * 	   InlineText 
 *
 * USEAGE: 
 *
 * 
 */

Namespace Tuanduimao\Supertable\Types;
use Tuanduimao\Supertable\Type;
use Tuanduimao\Supertable\Validation;
use \Exception as Exception;

class InlineText extends Type {
	
	function __construct( $data=array(), $option=array() ) {

		$opts = array_merge($data, $option );

		// FORMINPUT DATA
		$opts['screen_name'] = (isset($opts['screen_name']))? $opts['screen_name'] : 'InlineText_' . time() . rand(100000,999999);
		$opts['width'] = (isset($opts['width']))? $opts['width'] : "50";
		$opts['maxlength'] = (isset($opts['maxlength']))? $opts['maxlength'] : 50; 
		$opts['minlength'] = (isset($opts['minlength']))? $opts['minlength'] : 1;
		$opts['default'] = (isset($opts['default']))? $opts['default'] : null;
		$opts['placeholder'] = (isset($opts['placeholder']))? $opts['placeholder'] : "";


		$data = [
			'screen_name' => $opts['screen_name'] ,
			'width'  => $opts['width'],
			'maxlength' => $opts['maxlength'],
			'minlength' => $opts['minlength'],
			'default' => $opts['default'],
			'placeholder' => $opts['placeholder'],
		];

		$data_input = [

			'screen_name' => [
				'screen_name' => '字段名称',
				'placeholder' => '请填写字段名称',
				'input_type' => 'text',
				'input_width' => '6', 
				'default' => '',
				'validation' => [
					'required' => true,
					'minwlength'=>2,
					'maxwlength'=>10,
				],
				'message' => [
					'required' => '请填写{screen_name}({name})',
					'minwlength' => '{screen_name}({name})数值不能少于{value}',
					'maxwlength' => '{screen_name}({name})数值不能大于{value}',
				],
				'js.validation' => [
					'required' => true,
					'minlength'=>2,
					'maxlength'=>10,
				],
				'js.messages' => [
					'required' => '请填写字段名称',
					'minlength' => '字段名称数值不能少于2个字',
					'maxlength' => '字段名称数值不能超过10个字',
				],
			],

			'width' => [
				'screen_name' =>  '显示宽度',
				'placeholder' => '请选择字段显示宽度',
				'input_type' => 'select',
				'input_width' => '6', 
				'input_option' => [
					'1'=>'1/12',
					'2'=>'2/12',
					'3'=>'3/12',
					'4'=>'4/12',
					'5'=>'5/12',
					'6'=>'6/12',
					'7'=>'7/12',
					'8'=>'8/12',
					'9'=>'9/12',
					'10'=>'10/12',
					'11'=>'11/12',
					'12'=>'12/12'
				],
				'input_tips' => '录入信息时，这个字段的显示宽度。( 共12列网格 )',
				'default' => 6,
				'validation' =>[
					'required' => true,
					'allow'=>['1','2','3','4','5','6','7','8','9','10','11','12'],
				],
				'message' => [
					'required' => '请选择{screen_name}({name})',
					'allow' => '{screen_name}({name})不正确，请重新选择。',
				],
				'js.validation' => [
					'required' => true,
					'allow'=>['1','2','3','4','5','6','7','8','9','10','11','12'],
				],
				'js.messages' => [
					'required' => '请选择显示宽度',
					'allow' => '显示宽度不正确，请重新选择',
				],
			],

			'maxlength' => [
				'screen_name' =>  '最大字数',
				'placeholder' => '最多可以输入字数',
				'input_type' => 'text',
				'input_width' => '6', 
				'default' => 50,
				'validation' => [
					'required' => false,
					'digits'=>true,
					'min'=>1,
					'max'=>400,
				],

				'message' => [
					'digits' => '{screen_name}({name})格式不正确，请输入数字',
					'min' => '{screen_name}({name})数值不能少于{value}',
					'max' => '{screen_name}({name})数值不能大于{value}',
				],

				'js.validation' => [
					'required' => false,
					'digits'=>true,
					'min'=>1,
					'max'=>400,
				],
				'js.messages' => [
					'digits' => '最大字数格式不正确，请输入数字',
					'min' => '最大字数不能少于1',
					'max' => '最大字数不能超过400',
				],
			],

			'minlength' => [
				'screen_name' =>  '最小字数',
				'placeholder' => '至少输入字数',
				'input_type' => 'text',
				'input_width' => '6', 
				'default' => 1,
				'validation' => [
					'required' => false,
					'digits'=>true,
					'min'=>0,
					'max'=>400,
				],
				'message' => [
					'digits' => '{screen_name}({name})格式不正确，请输入数字',
					'min' => '{screen_name}({name})数值不能少于{value}',
					'max' => '{screen_name}({name})数值不能大于{value}',
				],

				'js.validation' => [
					'required' => false,
					'digits'=>true,
					'min'=>0,
					'max'=>400,
				],

				'js.messages' => [
					'digits' => '最小字数格式不正确，请输入数字',
					'min' => '最小字数不能少于0',
					'max' => '最小字数不能超过400',
				],
			],

			'default' => [
				'screen_name' =>  '默认值',
				'placeholder' =>  '填写该字段的默认值',
				'input_type' => 'text',
				'input_width' => '6', 
				'validation' => [
					'required' => false,
					'minwlength'=>'{minlength}.value',
					'maxwlength'=>'{maxlength}.value',
				],

				'message' => [
					'maxwlength' => '{screen_name}({name})不能超过{value}个字',
					'minwlength' => '{screen_name}({name})至少输入{value}个字',
				],
				'js.validation' => [
					'required' => false,
					'minlength'=>1,
					'maxlength'=>50,
				],
				'js.messages' => [
					'maxlength' => '默认值不能超过50个字',
					'minlength' => '默认值至少输入1个字',
				],
			],

			'placeholder' => [
				'screen_name' =>  '填写提示',
				'placeholder' =>  '字段格式的提示信息',
				'input_type' => 'text',
				'input_width' => '6', 
				'validation' =>[
					'required' => false,
					'minwlength'=>1,
					'maxwlength'=>50,
				],

				'message' =>[
					'maxwlength' => '{screen_name}({name})不能超过{value}个字',
					'minwlength' => '{screen_name}({name})至少输入{value}个字',
				],

				'js.validation' => [
					'required' => false,
					'minlength'=>1,
					'maxlength'=>50,
				],
				'js.messages' => [
					'minlength' => '填写提示至少输入1个字',
					'maxlength' => '填写提示不能超过50个字'
				],
			],
		];

		$data_message = [
			'required' =>  '请填写{screen_name}',
			'maxlength' => '{screen_name}不能超过{maxlength}个字',
			'minlength' => '{screen_name}至少{minlength}个字',
		];

		parent::__construct( $data, $opts );
		$this->setDataInput( $data_input );
		$this->setDataMessage( $data_message );
		$this->setDataFormat('string');
		$this->_cname = '单行文本';
	}


	/**
	 * 生成 jquery-validation 验证规则 
	 * @return [type] [description]
	 */
	public function jsValidation() {

		$column_name = $this->get('column_name');
		$screen_name = $this->get('screen_name');
		$rules = [
			'maxlength' => $this->get('maxlength'),
			'minlength' => $this->get('minlength'),
		];

		$messages = [
			'maxlength' => "{$screen_name}不能超过".$this->get('maxlength')."个字",
			'minlength' => "{$screen_name}至少".$this->get('minlength')."个字",
		];

		if ( $this->isRequired() ) {
			$rules['required'] = true;
			$messages['required'] = "请填写{$screen_name}";
		}
		return json_encode(['rules'=> [$column_name=>$rules], 'messages'=>[$column_name=>$messages]]);
	}


	/**
	 * 重载数据校验函数
	 * @param  [type] $value [description]
	 * @return [type]        [description]
	 */
	public function validation( & $value ) {
		
		$this->cleanError();
		

		$value = strval($value);
		$errflag = false;
		
		$name = $this->_data['screen_name'];
		$name = ( $name != "" ) ? $name : $this->_option['screen_name'];

		// 校验是否必填
		if( $this->_option['required'] && ($value === null  || $value === "") ) {
			$message = $this->_message('required', array('screen_name'=>$this->_data['screen_name']) );
			$this->errors = array_merge($this->errors, [ "$name"=>[['method'=>'required','message'=>$message]] ] );
			return false;

		} else if ( $value === null || $value === "" ) {
			return true;
		}

		$check = new Validation();

		// 校验最小值
		if ( !$check->minwlength($value, $this->_data['minlength']) ) {
			$message = $this->_message('minlength', array(
				'screen_name'=>$this->_option['screen_name'],
				'minlength'=>$this->_data['minlength'],
			));
			$this->errors = array_merge($this->errors, [ "$name"=>[['method'=>'minlength','message'=>$message]] ] );
			$errflag = true;
		}


		// 校验最大值
		if ( !$check->maxwlength($value, $this->_data['maxlength']) ) {
			$message = $this->_message('maxlength', array(
				'screen_name'=>$this->_option['screen_name'],
				'maxlength'=>$this->_data['maxlength'],
			));
			$this->errors = array_merge($this->errors, [ "$name"=>[['method'=>'maxlength','message'=>$message]] ] );
			$errflag = true;
		}

		return !$errflag;
	}

}