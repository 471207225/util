<?php 

namespace  Util;

class Vote{

	public function hao()
	{
		// 	$url = 'http://count.hao123.com/?callback=jQuery18205802916446700692_1453777298630&k=haomeizi_vote_neg_518&act=incrby&step=1&_='+time();

		$url = 'http://count.hao123.com/?callback=jQuery18207362713546026498_1453778160237&k=haomeizi_vote_neg_519&act=incrby&step=1&_='.$this->getMillisecond();
//ini_set('max_execution_time',300);
//for($j=0;$j<10;$j++){
//	$cache = unserialize(file_get_contents('c_cache.php'));
//	for($i=0;$i<2;$i++){
//		$ch = curl_init($url); //初始化
//		curl_setopt($ch,CURLOPT_HEADER,1); //将头文件的信息作为数据流输出
//		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); //返回获取的输出文本流
//		curl_setopt($ch, CURLOPT_HEADER, 1);
//		curl_setopt($ch, CURLOPT_COOKIE,"BAIDUID=".$cache['BAIDUID']);
//		curl_setopt($ch, CURLOPT_REFERER,'http://www.hao123.com/gaoxiao/haomeizi/0');
//		$string = curl_exec($ch);
//	}

		$ch = curl_init($url); //初始化
		curl_setopt($ch,CURLOPT_HEADER,1); //将头文件的信息作为数据流输出
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); //返回获取的输出文本流
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_REFERER,'http://www.hao123.com/gaoxiao/haomeizi/0');
		$string = curl_exec($ch);
		$matches = array();
		preg_match('/BAIDUID=(.+)1;/',$string,$matches);
		if($matches){
			file_put_contents('c_cache.php',serialize(array('BAIDUID'=>$matches[1].'1')));
		}
//}


//    echo "{\"cook\":\"".$matches[1]."1\"}";
//echo '{"msg":"请重新登录"}';
		//setcookie('BAIDUID',$matches[1].'1',time()+365*24*60*60,'/','.hao123.com');
//echo $_GET['callback'].'('.json_encode(array('cook'=>$matches[1].'1')).')';

	}

	public function hu()
	{
		// 	$url = 'http://count.hao123.com/?callback=jQuery18205802916446700692_1453777298630&k=haomeizi_vote_neg_518&act=incrby&step=1&_='+time();

		$url = 'http://count.hao123.com/?act=incr&k=haomeizi_down_519&callback=commonVoteIncDown&_='.$this->getMillisecond();
//$url = 'http://count.hao123.com/?act=incr&k=haomeizi_up_519&callback=commonVoteIncUp&_='.getMillisecond();
		ini_set('max_execution_time',300);
		for($j=0;$j<1000;$j++){
			$cache = unserialize(file_get_contents('c_cache.php'));
			for($i=0;$i<2;$i++){
				$ch = curl_init($url); //初始化
				curl_setopt($ch,CURLOPT_HEADER,1); //将头文件的信息作为数据流输出
				curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); //返回获取的输出文本流
				curl_setopt($ch, CURLOPT_HEADER, 1);
				curl_setopt($ch, CURLOPT_COOKIE,"BAIDUID=".$cache['BAIDUID']);
				curl_setopt($ch, CURLOPT_REFERER,'http://www.hao123.com/gaoxiao/haomeizi/0');
				$string = curl_exec($ch);
			}

			$ch = curl_init($url); //初始化
			curl_setopt($ch,CURLOPT_HEADER,1); //将头文件的信息作为数据流输出
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); //返回获取的输出文本流
			curl_setopt($ch, CURLOPT_HEADER, 1);
			curl_setopt($ch, CURLOPT_REFERER,'http://www.hao123.com/gaoxiao/haomeizi/0');
			$string = curl_exec($ch);
			$matches = array();
			preg_match('/BAIDUID=(.+)1;/',$string,$matches);
			if($matches){
				file_put_contents('c_cache.php',serialize(array('BAIDUID'=>$matches[1].'1')));
			}
		}



//    echo "{\"cook\":\"".$matches[1]."1\"}";
//echo '{"msg":"请重新登录"}';
//setcookie('BAIDUID',$matches[1].'1',time()+365*24*60*60,'/','.hao123.com');
//echo $_GET['callback'].'('.json_encode(array('cook'=>$matches[1].'1')).')';

	}

	private function getMillisecond() {
		list($t1, $t2) = explode(' ', microtime());
		return $t2  .  ceil( ($t1 * 1000) );
	}
}



?>