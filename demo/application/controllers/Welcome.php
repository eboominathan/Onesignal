<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{		
		
		$this->load->view('welcome_message');
	}

	Public function send_push_notification(){	
		$additional_data = array('message' => 'this is additional data');			
		$push_data = array(					
					'message' => 'This is Test Message ', // Message 
					'include_player_ids' => '0981679b-0205-44b0-bb51-4016f55b6b48', // your Player Id 
					'additional_data' => $additional_data  // Any other data with response 
					);
		return send_message($push_data);
}


}
