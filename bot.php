<?php
$chanel_id='1554124381';
$chanel_secret='4dcaf6dcf554a105cf64aaaf966cf7c7';
$access_token='jgAhX6d4MS4O+oEZrL8xfb12vh6Zq5mKCfIx5F4pjdrBRrlhUaj2HChnWnmC55AAIkULSUOFFJy8kbdBil3LJLeHMzsBMjhWqZe9MqLtOmj1UVewSBSA0TdAC8fAeASRSOlLDZ4xYXW+ECxm+xbvogdB04t89/1O/w1cDnyilFU=';
$uid='U276b787d18de24f2979a0fefd7cb1457';


$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$thai_month_arr=array(
    "0"=>"",
    "1"=>"มกราคม",
    "2"=>"กุมภาพันธ์",
    "3"=>"มีนาคม",
    "4"=>"เมษายน",
    "5"=>"พฤษภาคม",
    "6"=>"มิถุนายน", 
    "7"=>"กรกฎาคม",
    "8"=>"สิงหาคม",
    "9"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"                 
);
function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
    $thai_date_return="วัน".$thai_day_arr[date("w",$time)];
    $thai_date_return.= "ที่ ".date("j",$time);
    $thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
    $thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);
    $thai_date_return.= "  ".date("H:i",$time)." น.";
    return $thai_date_return;
}



function answer($text){
	$footer_txt='';//"\nxxxxxxxxxxxx";
	$regex = $str = '';
	$hint = '';
	while(true){
	$regex = '/(ขอ|ลืม).?(user|ยุสเซอ|ยูสเซอร์|ยุสเซอร์|ยูสเซอ|รหัส).{0,20}polis/i';
		if(preg_match($regex ,$text)){	
			$hint = "ถ้าไม่มี userPOLIS หรือ ลืมรหัส https://drive.google.com/open?id=0B7nTI-InTW94MXBucjc1d1FKSDQ";
			break;
		}
		
		$regex = '/(ช่วยราชการ)/i';
		if(preg_match($regex ,$text)){	
		$hint = "กรณีมาช่วยราชการ แจ้งรายละเอียดที่นี่ https://goo.gl/forms/PCRror9giDgXwidX2
\nตรวจสอบรายการที่แอดมินทำแล้วที่นี่ https://docs.google.com/spreadsheets/d/1J6X6iHQ3SGpJZHhy1CzxWx1jx1qovK1dxR6YL9BlgQo/edit?usp=sharing";
			break;
		}

		$regex = '/(ขอ|ลืม).?(user|ยุสเซอ|ยูสเซอร์|ยุสเซอร์|ยูสเซอ|รหัส).{0,20}ptm/i';
		if(preg_match($regex ,$text)){	
		$hint = "user และ password ของระบบ PTM ใช้รหัสเดียวกับ Polis ดูวิธีขอได้ที่นี่
\n https://drive.google.com/open?id=0B7nTI-InTW94MXBucjc1d1FKSDQ";
			break;
		}
		
		$regex = '/(ดู|ตรวจ).?เลข13หลัก/i'; 
		if(preg_match($regex ,$text)){	
			$hint = "คู่มือการตรวจสอบเลข 13 หลัก 
			\nhttps://drive.google.com/open?id=1QDACQjiiPeENEhzhuCpyJk1Nrkd5ij6w";
			break;

		}
	
		$regex = '/(ขอ|ขอเพิ่ม|เพิ่ม|ขอใช้).{0,10}(สิท|สิทธิ|สิด|สิทธิ์).*PTM/i';
		if(preg_match($regex ,$text)){	
		$hint = "ใครยังไม่มีสิทธิ PTM ขอที่นี่เท่านั้นนะครับ(เฉพาะสิทธิ PTM)👉🏼 https://docs.google.com/forms/d/e/1FAIpQLSf24tN-VSpIG-fakLQjvKdqAPPl3j5GWpbqnU_9FCMVN6d4qw/viewform
\nตรวจสอบรายการที่กำหนดสิทธิ์ 👉🏼 https://docs.google.com/spreadsheets/d/1DzRGXqItzcjZ8APlkOKLX65bnp7oPzQkzuraMcuz4_o/edit?usp=sharing";
			break;
		}
		
		$is_match=false;
		$regex=array('/Portable/i','/(google chrome|googlechrome|กูเกิ้ลโครม){1,1}.{0,20}น้อยกว่า.{0,10}40/i');
		foreach($regex as $reg){
			
			if(preg_match($reg ,$text)){
				$is_match=true;
				$hint = "Q:การติดตั้ง Google Chrome Portable ทำอย่างไรA:หากต้องการติดตั้ง GC ver 40++ \nในกรณีที่นำใส่ Flashdrive แล้ว ทำตามนี้ได้เลย\nhttps://youtu.be/avefA-irJb4 ดาวน์โหลดที่นี่ https://drive.google.com/open?id=1G9-u6aohHKMBZQhWBKFedIurfhKJMb_6";
				break;
			}
					
		}
		if($is_match){
			break;
		}
	
	$is_match=false;
	$regex=array(
	'/กรอก.*(ข้อมูล|ใบสั่ง){1,1}.{0,10}ผิด/i'
	,'/(พิมพ์|พิม)(ข้อมูล|ใบสั่ง){1,1}.{0,10}ผิด/i'
	,'/บันทึก.*(ข้อมูล|ใบสั่ง){1,1}.{0,10}ผิด/i'
	,'/บันทึก.*(ข้อมูล|ใบสั่ง){1,1}.{0,10}ผิด/i'
	,'/แก้ไข.*ใบสั่ง/i'
	);
		foreach($regex as $reg){
			if(preg_match($reg ,$text)){
				$is_match=true;
$hint = "📍การแก้ไขการบันทึกใบสั่ง
\nใช้ user สว. เข้าเมนูค้นหา —> ยกเลิก—->ขอแก้ไขใบสั่งเล่มใหม่—> กดยืนยัน
\nจากนั้นนำเลขที่ใบสั่งนั้นบันทึกใหม่
\n Cr: NuPle Supaporn @KTB
";				
				break;
			}		

	$is_match=false;
	$regex=array(
'/login ล้มเหลว/i'
	);
		foreach($regex as $reg){
			if(preg_match($reg ,$text)){
				$is_match=true;
$hint = "
1.ทดสอบเข้าระบบ POLIS ว่าเข้าได้หรือไม่ หากไม่ได้ให้ขอรหัส POLIS พิมพ์คำว่า ขอรหัส polis
2.ถ้าเข้าระบบ polis ได้ให้โทรแจ้งกำลังพลบก.ของท่านเพื่อตรวจสอบการครองตำแหน่ง ให้จนท.ติ๊กครองตำแหน่ง
";			
				break;
			}		
		}
		if($is_match){
			break;
		}
		
	//
	$is_match=false;
	$regex=array(
	'/กรอก.*(ข้อมูล|ใบสั่ง){1,1}.{0,10}ผิด/i'
	,'/(พิมพ์|พิม)(ข้อมูล|ใบสั่ง){1,1}.{0,10}ผิด/i'
	,'/บันทึก.*(ข้อมูล|ใบสั่ง){1,1}.{0,10}ผิด/i'
	,'/บันทึก.*(ข้อมูล|ใบสั่ง){1,1}.{0,10}ผิด/i'
	,'/แก้ไข.*ใบสั่ง/i'
	);
		foreach($regex as $reg){
			if(preg_match($reg ,$text)){
				$is_match=true;
$hint = "📍การแก้ไขการบันทึกใบสั่ง
\nใช้ user สว. เข้าเมนูค้นหา —> ยกเลิก—->ขอแก้ไขใบสั่งเล่มใหม่—> กดยืนยัน
\nจากนั้นนำเลขที่ใบสั่งนั้นบันทึกใหม่
\n Cr: NuPle Supaporn @KBANK
";				
				break;
			}		
		}
		if($is_match){
			break;
		}
		
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			$text_ex = $text;
			$text = answer($text_ex);
			
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];
			
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json'
			, 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
//echo answer('วรกร');
?>
