<?php



class TasksController extends AppController {
	var $name = 'Tasks';
	var $components = array('Session','Facebook.Connect');
	public $actsAs = array('Uploader.Attachment');
	public $helpers = array('Html', 'Form','Facebook.Facebook');

	function index() {
		if(($this->Connect->user('id')))
			{
				$this->Task->recursive = 0;
		$this->set('tasks', $this->Task->find('all'));
			}
	 else if ($this -> Session -> read('Auth.User.id') == '' || $this -> Session -> read('Auth.User.id') == null )
	  {
	  $this->redirect(array('controller' => 'users', 'action' => 'login'));
	  }
	  else{
		$this->Task->recursive = 0;
		$this->set('tasks', $this->Task->find('all'));
		}
	}

	function view($id) {
		$this->Task->id = $id;
	
		
   // $condition1 = array("Task.id" => $id);
    //Example usage with a model:
  //  $latitude = $this->Post->find('first', array('conditions' => $conditions));
//	$latitude = $this->Task->find('fields'=>array('Task.latitude as latitude, 'conditions' => $conditions2'));
	
	$latitude = $this->Task->find('first', array(
    'fields' => array(
        'latitude',      
    ),
    'conditions' => array(
        "Task.id = '$id' ")      
	));		
	//echo $latitude['Task']['latitude'];
	
	
	// Get longitude
	$longitude = $this->Task->find('first', array(
    'fields' => array(
        'longitude',      
    ),
    'conditions' => array(
        "Task.id = '$id' ")      
	));		
	//echo $longitude['Task']['longitude'];

	
		$this->set('task', $this->Task->read());
		

	}

	function add() {
		if (!empty($this->data)) 
		{
		
	//		 if (!empty($this->data) && is_uploaded_file($this->data['Task']['File']['tmp_name'])) 
	//		 {
	//			$fileData = fread(fopen($this->data['Task']['File']['tmp_name'], "r"),  $this->data['Task']['File']['size']);
				
	//			$this->data['Task']['name'] = $this->data['Task']['File']['name'];
	//			$this->data['Task']['type'] = $this->data['Task']['File']['type'];
	//			$this->data['Task']['size'] = $this->data['Task']['File']['size'];
	//			$this->data['Task']['data'] = $fileData;
		
				if ($this->Task->save($this->data)) 
				{
					$this->Session->setFlash('Your To dos has been saved.');
					$this->redirect(array('action' => 'index'));
				}
	//		}
	}
	}
	
	function delete($id) {
	if ($this->Task->delete($id)) {
		$this->Session->setFlash('The To dos with id: ' . $id . ' has been deleted.');
		$this->redirect(array('action' => 'index'));
	}
}

function edit($id = null) {
	$this->Task->id = $id;
	if (empty($this->data)) {
		$this->data = $this->Task->read();
	} else {
		if ($this->Task->save($this->data)) {
			$this->Session->setFlash('Your To dos has been updated.');
			$this->redirect(array('action' => 'index'));
		}
	}
}

}
?>