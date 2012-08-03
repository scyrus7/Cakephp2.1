<?php
class UsersController extends AppController {
	public $name = 'Users';
	public $helpers = array('Html', 'Form');
	public $components = array('Auth', 'Session');
	
	function beforeFilter() {
  //  $this->Auth->user = 'Users';
  //  Security::setHash("md5");
 //   $this->Auth->fields = array('username' => 'username', 'password' => 'password');
  //  $this->Auth->loginAction = array('controller' => 'Users', 'action' => 'login');
 //   $this->Auth->loginRedirect = array('controller' => 'Tasks', 'action' => 'index');
    //sign up  is a page which don't requires to login
    $this->Auth->allow('register','login','logout');
  //  $this->Auth->authorize = 'controller';
  //  $this->Auth->logoutRedirect = '/';

} 
    function isAuthorized() {

    return true;

}	
	
	public function login() {
	 if ($this->request->is('post')) {
	
		// if the form was submitted
		if(!empty($this->data)) {
			// find the user in the database
			$dbuser = $this->User->findByUsername($this->data['User']['username']);
			// if found and passwords match
			if($this->Auth->login()) {
				// write the username to a session
				$this->Session->write('User', $dbuser);
				// save the login time
				$dbuser['User']['last_login'] = date("Y-m-d H:i:s");
				$this->User->save($dbuser);
				// redirect the user
				$this->Session->setFlash('You have successfully logged in.');
				$this->redirect('/tasks/index');
			} else {
				$this->set('error', 'Either your username or password is incorrect.');
			}
		}
	}
	}
	
	public function register()
	{		
//		$this->data['User']['password'] = $this->Auth->password($this->data['User']['password']);
//          $this->Auth->logout();
	if( $this->request->is('post') )
			  {
				if ( isset($this->data) )
				{	
		//	   $this->data['User']['password'] = Security::hash(Configure::read('Security.salt').($this->data['User']['password'])); 
		//	    $this->data['User']['password']= md5($this->data['User']['password']);

				$this->User->create();		
					if ($this->User->save($this->data)) 
					{
					//		$this->redirect($this->Auth->redirect('/users/login'));		//		
	//					echo "work";
						$this->redirect(array('controller' => 'users', 'action' => 'login'));
		//				$this->redirect('http://www.awesomeshortcut.com/dev/users/index');
						$this->Session->setFlash( 'Thank you for registering! You can now login.' );						
					} // fi
					
				} // fi
				  else{
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
	//			  echo "Not work";
				   }
				   
	}
  }
	

	public function logout() {
		// delete the user session
		$this->Session->destroy();
		 $this->Session->destroy('user');
		$this->Session->delete('User');
		// redirect to posts index page
		$this->Session->setFlash('You have successfully logged out.');
		$this->redirect('/users/login');
	}
	
	function profile() {
	$login_user = $this -> Session -> read('Auth.User.id');
	//print_r($login_user);
	//print_r($dbuser);
	$this->User->id = $login_user;
	//   $this->data['User']['password'] = Security::hash(Configure::read('Security.salt').($this->data['User']['password']));
	if (empty($this->data)) {
		$this->data = $this->User->read();
	} else {
		$this->User->create();	
		if ($this->User->save($this->data)) {
			$this->Session->setFlash('Your profle has been updated.');
			$this->redirect('/tasks/index');
		}
	}
}
	
	function index()
	{
	
	}
}
?>