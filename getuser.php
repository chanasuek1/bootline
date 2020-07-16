$API_URL = 'https://api.line.me/v2/bot/message';
//###### Token Line Bot Register ######//
$accessToken = "P0gU2mHk3dX8RVqVB+aUlSmUtuMtmuEuE8wWIldCIQyDuSyXnvaPN1Gtb891YQiTJAYSOcBB2wS3zT7eBxNO899e4ICjeCXHF8MxoJoOXenjetR8rHGQtNVXerfoFCnj/AXidTuRir+KetsXg4Fs4gdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
 
$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array
 
$arrayHeader = array();
$arrayHeader[] = "Content-Type: application/json";
$arrayHeader[] = "Authorization: Bearer {$accessToken}";
 
//########### Find IDUser IDGroup IDRoom From Source ###############//
if ( sizeof($request_array['events']) > 0 ) {
    foreach ($request_array['events'] as $event) {
        $reply_message = '';
        $reply_token = $event['replyToken'];
 
    if(isset($event['source']['userId'])){
        $id = $event['source']['userId'];
    } else if(isset($event['source']['groupId'])){
        $id = $event['source']['groupId'];
    } else if(isset($event['source']['room'])){
        $id = $event['source']['room'];
    }
 
    $text = $event['message']['text'];
        list($flag, $cmd, $parm1) = explode(' ', $text);
        //###Call Function Save Log ###//
        //saveBotLog($text, $id);
        if($flag == "bot:"){        
            //saveBotLog($text, $id);
            if($cmd == "id"){
                //$output = getFX();
                $arrayPostData['replyToken'] = $request_array['events'][0]['replyToken'];
                $arrayPostData['messages'][0]['type'] = "text";
                $arrayPostData['messages'][0]['text'] = $id;
                replyMsg($arrayHeader,$arrayPostData);
           }
           // ###### Not Word bot Not reply ######## //
            if(!empty($output)){    
                $data = [
                'replyToken' => $reply_token,
                'messages' => [['type' => 'text', 'text' => $output ]]
                    ];
                    $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
                    $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);
                        echo "Result: ".$send_result."\r\n";
            }//Close If empty.
        }//Close If bot.
    }//Close For.
}//Close If.
