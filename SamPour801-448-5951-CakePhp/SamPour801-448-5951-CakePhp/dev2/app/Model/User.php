<?php
class User extends AppModel {
	var $name = 'User';
	
	public $validate = array(
				'id' => array('rule' => 'blank',
				'on' => 'create'),
					
				'username'=>
				array(
						'isUnique'=>array(
							'rule'=>'isUnique',
							'message'=>'This username has already been taken.',
							),
						'stringLength'=>array(
							'rule'=>array('between', 1, 40),
							'message'=>'This field must be between 1 and 40 characters long.',
							),
						),
				
				'password' => array('rule' => 'alphanumeric',
				'required' => true),
				
				'password_confirm' =>array('rule' => array('confirmPassword'),
				'message'=>'Mismatch'),
				
				'email'=>array(
						'isUnique'=>array(
							'rule'=>'isUnique',
							'message'=>'This email already existed.',
							),
						'email'=>array(
							'rule'=>array('email', true),
							'message'=>'Please supply a valid email address.',
							),
						
						),
    
				);
				
	function confirmPassword($data) {
//	$valid = false;
  //$this->data['User']['password'] = Security::hash(Configure::read('Security.salt')); 
		if ($this->data['User']['password'] == ($this->data['User']['password']))
	//	 $this->data['User']['password'] = Security::hash(Configure::read('Security.salt').($this->data['User']['password'])); 
//		if ( $this->data['User']['password'] = Security::hash(Configure::read('Security.salt').($this->data['User']['password'])))
		{
	 $this->data['User']['password'] = Security::hash(Configure::read('Security.salt').($this->data['User']['password']));
		return true;
		}
		 return false; 

	}
	
	


				
	
	
}
?>