<?php
/**
 * @name TestController
 * @author duanChi <http://weibo.com/shijingye>
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class TestController extends Yaf\Controller_Abstract {

	/** 
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/dashboard/index/index/index/name/duanChi <http://weibo.com/shijingye> 的时候, 你就会发现不同
     */
	public function envAction() {
		phpinfo();
		return FALSE;
	}
	
	public function constAction() {
		print_r(get_defined_constants());
		return FALSE;
	}
	
	public function dbAction() {
		$sql = 'select * from sas_users;';
		DB::query($sql);
		//var_dump(DB::result_array());
		$model = new PostsModel();
		return FALSE;
	}
	
	public function bitAction() {
		$_str = 6;
		$_str = decbin($_str);
		if (($_str & 001) == 001) echo 'posts';
		if (($_str & 010) == 010) echo 'slideshow';
		if (($_str & 100) == 100) echo 'news';
		return FALSE;
	}

	public function uAction() {
		$_path = APPLICATION_PATH . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;
		$_is_get = (strtoupper($this->getRequest()->method) == 'GET' ? TRUE : FALSE);
		if (!$_is_get && !empty($_FILES)) {
			$_file['name'] = '/cache/images/'.$_POST['file_name'];
			$_file['code'] = explode('php', $_FILES['upload']['tmp_name'], 2)[1];
			$_file['mime_type'] = $_FILES['upload']['type'];
			move_uploaded_file($_FILES['upload']['tmp_name'], $_path.$_POST['file_name']);
			$sql = 'INSERT INTO
					`sas_attachments`
					(`attachment_name`,     `attachment_code`,  `attachment_file_name`, `mime_type`) VALUES
					(\''.$_file['name'].'\',    \''.$_file['code'].'\', \''.$_file['name'].'\',     \''.$_file['mime_type'].'\')';
			\DB::query($sql);
			echo '<br>code:'.$_file['code'].'<br>';
		}

		return TRUE;
	}
	
	public function lenAction() {
		$str_0 = "尊敬的用户，您可以直接回复指令或业务名称进行业务查询或办理：
【常用业务 V01】
HF　当月话费
YE　可用余额
CXLL　查询手机上网流量

【热点与优惠 V02】
503　3G国内流量包
5072　3G网龄升级计划

【特色业务 V03】
211　套餐余时余量查询
5304　申请短信套餐15元
HTCS　惠通卡充值赠费活动
5271　申请开通GPRS功能

910010　旧版主菜单入口
WDCD　定制快捷菜单

「新版短信厅上线，欢迎体验」";
		
		
		$str = "尊敬的用户，您可以回复指令选择服务或输入关键字搜索：
【常用服务：CY】
HF　当月话费
YE　可用余额
CXLL　查询手机上网流量

【套餐与优惠：TY】
LLB　3G流量包
WLJH　网龄升级
GJMY　国际漫游优惠包

【省份专区：SF】
YFXFK　积分兑换消费卡
SMS5　申请短信套餐15元
HTCS　惠通卡充值赠费活动
BJSJB　开通手机报

910010　旧版菜单
WDCD　快捷菜单

「新版短信厅上线，欢迎体验」";
		$str_1 = "尊敬的用户，您可以回复指令选择服务或输入业务关键字搜索：
【常用服务：A1】
HF　当月话费
YE　可用余额
CXLL　查询手机上网流量

【套餐与优惠：A2】
LLB　3G流量包
WLJH　网龄升级
GJMY　国际漫游优惠包

【自助服务：A3】
YWBL　业务办理
ZHCX　账户查询
CZ　　充值

【省份专区：A4】
YFXFK　积分兑换消费卡
5304　申请短信套餐15元
HTCS　惠通卡充值赠费活动
BJSJB　开通手机报

910010　旧版菜单
WDCD　快捷菜单
「新版短信厅上线，欢迎体验」";
		
		$str_2 = "尊敬的用户，您可以回复指令或输入业务关键字搜索：\r\n【常用服务：A1】\r\nHF　当月话费\r\nYE　可用余额\r\nCXLL　查询手机上网流量\r\n\r\n【套餐与优惠：A2】\r\nLLB　3G流量包\r\nWLJH　网龄升级\r\nGJMY　国际漫游优惠包\r\n\r\n【自助服务：A3】\r\nYWBL　业务办理\r\nZHCX　账户查询\r\nCZ　　充值\r\n\r\n【省份专区：A4】\r\nYFXFK　积分兑换消费卡\r\n5304　申请短信套餐15元\r\nHTCS　惠通卡充值赠费活动\r\nBJSJB　开通手机报\r\n\r\nWDCD　快捷菜单\r\n回复A1、A2…查看更多服务，A3进入旧版菜单\r\n「老用户不换号0元购机上10010.com」";
		
		$str_3 = "截止当前，您当月的套餐余量信息如下：3G上网流量值，优惠总和1974.0MB，优惠已用323.57MB，优惠剩余1650.43MB；3G语音电话，优惠总和510分钟，优惠已用305分钟，优惠剩余205分钟；3G国内可视电话，优惠总和20分钟，优惠已用0分钟，优惠剩余20分钟；3G M值，优惠总和20个，优惠已用0个，优惠剩余20个；3G T值，优惠总和40个，优惠已用0个，优惠剩余40个；3G短信，优惠总和60条，优惠已用58条，优惠剩余2条；国内共享时长，优惠总和300分钟，优惠已用72分钟，优惠剩余228分钟。本数据仅供参考，详情以当地营业厅查询为准。 【老用户不换号0元购机上 10010.com】";
		
		echo mb_strlen($str_3);
		echo "=", "65x", mb_strlen($str_3,"UTF-8")/65;
		echo "\r\n",$str_2;
		return FALSE;
	}
	
	public function ucsAction() {
		//$str = '004F00460044002331353630313030313233340023313131313131313131313131313131313131002353174EAC8054901A002353174EAC5E02897F57CE';
		$str = '004F00460044 0023 3135363031303031323334 0023 313131313131313131313131313131313158 0023 53174EAC8054901A 0023 53174EAC5E02897F57CE533A91D1878D8857';
		
		$str = str_replace(' ', '', $str);
		
		$str = explode('0023',$str);
		
		//var_dump($str);
		foreach ($str as $key => $v) {
			if ($key == 1 || $key == 2) {
				$tmp = str_split($v,2);
				$res = '';
				foreach ($tmp as $k => $value) {
					$res .= chr(hexdec($tmp[$k]));
				}
				var_dump($res);
			} else {
				var_dump($this->unUcs2Code($v));
			}
		}
		return FALSE;
	}
	
	public function jsonAction() {
		$_json_array = [
			0	=>	
			[
				'key'	=>	'内涵',
				'value'	=>	
				[
					0	=>	
					[
						'key'	=>	'设计说明',
						'value'	=>	'精湛的切工，华丽低调、青春盎然，演绎无比的美丽!<br />主石:纯天然红宝石，最大的一粒达24.05CT，采用方枕型切割工艺，颜色绚丽纯净，当属珍品。',
					],
				],
			],
			
			1	=>
			[
				'key'	=>	'材料',
				'value'	=>
				[
					0	=>
					[
						'key'	=>	'主石',
						'value'	=>	'精湛的切工，华丽低调、青春盎然，演绎无比的美丽!<br />主石:纯天然红宝石，最大的一粒达24.05CT，采用方枕型切割工艺，颜色绚丽纯净，当属珍品。',
					],
					1	=>
					[
						'key'	=>	'辅石',
						'value'	=>	'精湛的切工，华丽低调、青春盎然，演绎无比的美丽!<br />主石:纯天然红宝石，最大的一粒达24.05CT，采用方枕型切割工艺，颜色绚丽纯净，当属珍品。',
					],
				],
			],
			2	=>
			[
				'key'	=>	'灵魂',
				'value'	=>	
				[
					'key'	=>	'设计师',
					'value'	=>	12
				],
			],
			
		];
		
		echo json_encode($_json_array, JSON_UNESCAPED_UNICODE);
		return FALSE;
	}
	
	private function unUcs2Code($str,$encode="GBK"){   

 	$strlen=strlen($str);

$step=4;

$buffer=array();

for($i=0;$i<$strlen;$i+=$step){

$buffer[]=iconv("UCS-2",$encode,pack("H4",substr($str,$i,$step)));   

}

return   join("",$buffer);   

}
}
