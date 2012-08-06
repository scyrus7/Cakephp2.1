<?php
class PostsController extends AppController {

	var $name = 'Posts';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->Post->recursive = 0;
		$this->set('posts', $this->Post->find('all'));
	}

	function view($id) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Post.');
			$this->redirect('/posts/');
		}
		$this->set('post', $this->Post->read(null, $id));
	}

	function add() {
//		if (empty($this->data)) {
	//		$this->set('tags', $this->Post->Tag->generateList(null,null,null,null,"{n}.tag.Tag"));
	//		$this->set('tags', $this->Tag->find('list', array('fields' => array('tag')))); 
	//	$authors = $this->Post->Tag->find('list', array('fields' => array('Tag.tag'))) ;
	//	$this->set('tags', $authors);
//			if ($this->Post->save($this->data)) {
	//			$this->Session->setFlash('Your To dos has been saved.');
		//		$this->redirect(array('action' => 'index'));
//			}
		
		//	$this->set('selectedTags', null);
		//	$this->render();
//		} else {
	//		$this->cleanUpFields();
			
			// upload the file to the server
			$fileOK = $this->uploadFiles('img/files', $this->data['File']);
			
			// will return
			//Array
			//(
			//	[urls] => Array
			//		(
			//			[0] => img/files/15_zamri.jpg
			//		)
			//
			//)
			
			// print out data
			// $this->pa($this->data);
			
			// if file was uploaded ok
			if(array_key_exists('urls', $fileOK)) {
				// save the url in the form data
				$this->data['Post']['image_url'] = $fileOK['urls'][0];
			}
			
			// try saving the data
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash('The Post has been saved');
				$this->redirect('/posts/');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('tags', $this->Post->Tag->generateList(null,null,null,null,"{n}.Tag.tag"));
				if (empty($this->data['Tag']['Tag'])) { $this->data['Tag']['Tag'] = null; }
				$this->set('selectedTags', $this->data['Tag']['Tag']);
			}
	//	}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Post');
				$this->redirect('/posts/');
			}
			$this->data = $this->Post->read(null, $id);
			$this->set('tags', $this->Post->Tag->generateList(null,null,null,null,"{n}.Tag.tag"));
			if (empty($this->data['Tag'])) { $this->data['Tag'] = null; }
			$this->set('selectedTags', $this->_selectedArray($this->data['Tag']));
		} else {
			$this->cleanUpFields();
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash('The Post has been saved');
				$this->redirect('/posts/');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('tags', $this->Post->Tag->generateList(null,null,null,null,"{n}.Tag.tag"));
				if (empty($this->data['Tag']['Tag'])) { $this->data['Tag']['Tag'] = null; }
				$this->set('selectedTags', $this->data['Tag']['Tag']);
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Post');
			$this->redirect('/posts/');
		}
		if ($this->Post->del($id)) {
			$this->Session->setFlash('The Post deleted: id '.$id.'');
			$this->redirect('/posts/');
		}
	}


	function admin_index() {
		$this->Post->recursive = 0;
		$this->set('posts', $this->Post->find('all'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Post.');
			$this->redirect('/admin/posts/');
		}
		$this->set('post', $this->Post->read(null, $id));
	}

	function admin_add() {
		if (empty($this->data)) {
			$this->set('tags', $this->Post->Tag->generateList(null,null,null,null,"{n}.Tag.tag"));
			$this->set('selectedTags', null);
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash('The Post has been saved');
				$this->redirect('/admin/posts/');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('tags', $this->Post->Tag->generateList(null,null,null,null,"{n}.Tag.tag"));
				if (empty($this->data['Tag']['Tag'])) { $this->data['Tag']['Tag'] = null; }
				$this->set('selectedTags', $this->data['Tag']['Tag']);
			}
		}
	}

	function admin_edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Post');
				$this->redirect('/admin/posts/');
			}
			$this->data = $this->Post->read(null, $id);
			$this->set('tags', $this->Post->Tag->generateList(null,null,null,null,"{n}.Tag.tag"));
			if (empty($this->data['Tag'])) { $this->data['Tag'] = null; }
			$this->set('selectedTags', $this->_selectedArray($this->data['Tag']));
		} else {
			$this->cleanUpFields();
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash('The Post has been saved');
				$this->redirect('/admin/posts/');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('tags', $this->Post->Tag->generateList(null,null,null,null,"{n}.Tag.tag"));
				if (empty($this->data['Tag']['Tag'])) { $this->data['Tag']['Tag'] = null; }
				$this->set('selectedTags', $this->data['Tag']['Tag']);
			}
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Post');
			$this->redirect('/admin/posts/');
		}
		if ($this->Post->del($id)) {
			$this->Session->setFlash('The Post deleted: id '.$id.'');
			$this->redirect('/admin/posts/');
		}
	}

}
?>