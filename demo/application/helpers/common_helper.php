<?php 
/**
 * Send message
 *
 * To send Push notification using Onesignal 
 *
 * @access	public
 * @param	type	array
 * @return	json	
 */
 
if (! function_exists('send_message'))
{
	function send_message($data)
	{
		$one_signal_app_id = '868610fb-0809-4c8e-982e-647db54a8a50';    
        $one_signal_reset_key = 'ZmZmMmNhOWYtMjllZC00MjQ1LWJjMzEtYzdhMDI4NzgyNDg2';
        $message = $data['message'];        
        $include_player_ids = $data['include_player_ids'];
        $include_player_id =  array($include_player_ids);       
            
        $content = array("en" => "$message");       
        $fields = array(
            'app_id' => $one_signal_app_id,
            'data' => $data['additional_data'],                        
            'include_player_ids' => $include_player_id,
            'contents' => $content
        );

        if(empty($include_player_ids)){
            unset($fields['include_player_ids']);
        }      
        
        $fields = json_encode($fields);
         // print_r($fields); exit;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
            'Authorization: Basic '.$one_signal_reset_key));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        
       return $response;
	}
}



