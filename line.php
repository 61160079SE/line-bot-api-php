<?php

$API_URL = 'https://api.line.me/v2/bot/message/reply';
$ACCESS_TOKEN = '0BrqA6p/82SlLh+r5++IuUYfwY5UfaJ6QyNEE/QRmLG5dxFYDPMglo+K1tJ2A/Qed9gbMUmcMv8QsMV/L95t8vjoVMgjTZzdfxK4dJ9p1v7hhyv7qbrDJPqGqx+UmHvQlSc508iAlmNI8UPv/wYpNQdB04t89/1O/w1cDnyilFU='; // Access Token ค่าที่เราสร้างขึ้น
$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array

if ( sizeof($request_array['events']) > 0 )
{

 foreach ($request_array['events'] as $event)
 {
  $reply_message = '';
  $reply_token = $event['replyToken'];

  if ( $event['type'] == 'message' ) 
  {
   
   if( $event['message']['type'] == 'text' )
   {
		$text = $event['message']['text'];
		
	   	
	   	//if(strpos($text, '@bot') !== false || strpos($text, '@บอท') !== false){

			if($text == "สถานการณ์โควิดวันนี้" || $text == "covid19" || $text == "covid-19" || $text == "Covid-19"){
			     $url = 'https://covid19.th-stat.com/api/open/today';
			     $ch = curl_init($url);
			     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			     curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
			     curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
			     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			     $result = curl_exec($ch);
			     curl_close($ch);   

			     $obj = json_decode($result);

			     $reply_message = $result;
			     $reply_message = 'ติดเชื้อสะสม '. $obj->{'Confirmed'}.' คน'. PHP_EOL .'รักษาหายแล้ว '. $obj->{'Recovered'}.' คน';

			}
	   		
			
// 			if(strpos($text, 'ราคาทองคำ') !== false){
		
// 				$str_msg = explode(" ",$text){
					
// 				}
// 				$curl = curl_init();

// 				curl_setopt_array($curl, array(
// 					CURLOPT_URL => "https://thaiqa.p.rapidapi.com/predict",
// 					CURLOPT_RETURNTRANSFER => true,
// 					CURLOPT_FOLLOWLOCATION => true,
// 					CURLOPT_ENCODING => ",
// 					CURLOPT_MAXREDIRS => 10,
// 					CURLOPT_TIMEOUT => 30,
// 					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 					CURLOPT_CUSTOMREQUEST => "POST",
// 					CURLOPT_POSTFIELDS => "[ {"paragraphs": ["qas":[{  "id": "1","question": ".$str_msg[1]." }],"context": "จราคาทองคำวันนี้  28,000  บาท  ชื่อผู้พัฒนา นายอดิเทพ" }] }]",
// 					CURLOPT_HTTPHEADER => array(
// 						"accept: application/json",
// 						"content-type: application/json",
// 						"x-rapidapi-host: thaiqa.p.rapidapi.com",
// 						"x-rapidapi-key: 4bd72c1600msh0bcbcebb01e9159p179c24jsn4b9ae96378ce"
// 					),
// 				));

// 				$response = curl_exec($curl);
// 				$err = curl_error($curl);

// 				curl_close($curl);

// 				if ($err) {
// 					echo "cURL Error #:" . $err;
// 				} else {
// 					echo $response;
// 				}
// 			}
			
			
			else if($text == "@บอท ขอรหัสนิสิตของผู้พัฒนา ส่งไปที่ https://linebot.kantit.com/stuid.php"){
				$reply_message = 'ok!';
			}
			
			else if($text == "ผมไป train bot มาแล้วครับ"){
				$reply_message = 'ถามใหม่ได้เลย!!';
			}
	   		else if($text == "CDMA"){
				$reply_message = '+1,-3,-1,-1';
			}
	   		else if(strpos($text, 'สวัสดี') !== false){
				$reply_message = 'สวัสดีฮับ';
			}
			else if(strpos($text, 'ล้ำ') !== false){
				$reply_message = 'แน่นอน';
			}
			else if(strpos($text, 'แนะนำ') !== false){
				$reply_message = 'search google จะดีกว่านะครับ';
			}
			else if(strpos($text, 'เคร') !== false || strpos($text, 'โอเคร') !== false || strpos($text, 'โอเค') !== false){
				$reply_message = 'โอเค';
			}
			else if($text == 'หนุกดีครับ'){
				$reply_message = '5555';
			}
			else if(strpos($text, 'ดี') !== false){
				$reply_message = 'ดี ๆ';
			}
			else if(strpos($text, 'เกินไปแล้ว') !== false){
				$reply_message = 'ใช่เลย ๆ';
			}
			else if(strpos($text, '555') !== false){
				$reply_message = '55555';
			}
			else if(strpos($text, 'bug') !== false){
				$reply_message = 'คิดไปเองครับ';
			}
			else if(strpos($text, 'อาหาร') !== false){
				$reply_message = 'ผมก็หิว';
			}
			else if(strpos($text, 'รำคาญ') !== false || strpos($text, 'ไม่ชอบ') !== false || strpos($text, 'แย่') !== false || strpos($text, 'ไม่ดี') !== false){
				$reply_message = 'เดียวก็ชินฮับ';
			}

			else if(strpos($text, 'ใคร') !== false && strpos($text, 'ผู้พัฒนา') !== false){
				$reply_message = 'อดิเทพ-079 ครับ !!';
			}
			else if(strpos($text, 'ชื่ออะไร') !== false || strpos($text, 'ชื่อว่าอะไร') !== false){
				$reply_message = 'อดิเทพ-079 ครับ !!';
			}
			else if(strpos($text, 'บอท') !== false || strpos($text, 'bot') !== false){
				$reply_message = 'ผมเหรอ?';
			}
			else{
				//$reply_message = '('.$text.') ได้รับข้อความเรียบร้อยครับ'; 
				$reply_message = 'ไม่รู้สิฮับ อิอิ'; 
			}
		//}//if
	   
   }else
    $reply_message = 'ระบบได้รับ '.ucfirst($event['message']['type']).' ของคุณแล้ว';
  
  }
  else
   $reply_message = 'ระบบได้รับ Event '.ucfirst($event['type']).' ของคุณแล้ว';
 
  if( strlen($reply_message) > 0 )
  {
   //$reply_message = iconv("tis-620","utf-8",$reply_message);
   $data = [
    'replyToken' => $reply_token,
    'messages' => [['type' => 'text', 'text' => $reply_message]]
   ];
   $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

   $send_result = send_reply_message($API_URL, $POST_HEADER, $post_body);
   echo "Result: ".$send_result."\r\n";
  }
 }
}

echo "OK";

function send_reply_message($url, $post_header, $post_body)
{
 $ch = curl_init($url);
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 $result = curl_exec($ch);
 curl_close($ch);

 return $result;
}

?>
