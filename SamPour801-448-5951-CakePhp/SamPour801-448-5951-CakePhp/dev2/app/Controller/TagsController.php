<?php
class TagsController extends AppController {

	var $name = 'Tags';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->Tag->recursive = 0;
		$this->set('tags', $this->Tag->find('all'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Tag.');
			$this->redirect('/tags/index');
		}
		$this->set('tag', $this->Tag->read(null, $id));
	}

	function add() {
		if (empty($this->data)) {
			$this->set('posts', $this->Tag->Post->generateList());
			$this->set('selectedPosts', null);
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Tag->save($this->data)) {
				$this->Session->setFlash('The Tag has been saved');
				$this->redirect('/tags/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('posts', $this->Tag->Post->generateList());
				if (empty($this->data['Post']['Post'])) { $this->data['Post']['Post'] = null; }
				$this->set('selectedPosts', $this->data['Post']['Post']);
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Tag');
				$this->redirect('/tags/index');
			}
			$this->data = $this->Tag->read(null, $id);
			$this->set('posts', $this->Tag->Post->generateList());
			if (empty($this->data['Post'])) { $this->data['Post'] = null; }
			$this->set('selectedPosts', $this->_selectedArray($this->data['Post']));
		} else {
			$this->cleanUpFields();
			if ($this->Tag->save($this->data)) {
				$this->Session->setFlash('The Tag has been saved');
				$this->redirect('/tags/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('posts', $this->Tag->Post->generateList());
				if (empty($this->data['Post']['Post'])) { $this->data['Post']['Post'] = null; }
				$this->set('selectedPosts', $this->data['Post']['Post']);
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Tag');
			$this->redirect('/tags/index');
		}
		if ($this->Tag->del($id)) {
			$this->Session->setFlash('The Tag deleted: id '.$id.'');
			$this->redirect('/tags/index');
		}
	}


	function admin_index() {
		$this->Tag->recursive = 0;
		$this->set('tags', $this->Tag->findAll());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Tag.');
			$this->redirect('/admin/tags/index');
		}
		$this->set('tag', $this->Tag->read(null, $id));
	}

	function admin_add() {
		if (empty($this->data)) {
			$this->set('posts', $this->Tag->Post->generateList());
			$this->set('selectedPosts', null);
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Tag->save($this->data)) {
				$this->Session->setFlash('The Tag has been saved');
				$this->redirect('/admin/tags/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('posts', $this->Tag->Post->generateList());
				if (empty($this->data['Post']['Post'])) { $this->data['Post']['Post'] = null; }
				$this->set('selectedPosts', $this->data['Post']['Post']);
			}
		}
	}

	function admin_edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Tag');
				$this->redirect('/admin/tags/index');
			}
			$this->data = $this->Tag->read(null, $id);
			$this->set('posts', $this->Tag->Post->generateList());
			if (empty($this->data['Post'])) { $this->data['Post'] = null; }
			$this->set('selectedPosts', $this->_selectedArray($this->data['Post']));
		} else {
			$this->cleanUpFields();
			if ($this->Tag->save($this->data)) {
				$this->Session->setFlash('The Tag has been saved');
				$this->redirect('/admin/tags/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('posts', $this->Tag->Post->generateList());
				if (empty($this->data['Post']['Post'])) { $this->data['Post']['Post'] = null; }
				$this->set('selectedPosts', $this->data['Post']['Post']);
			}
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Tag');
			$this->redirect('/admin/tags/index');
		}
		if ($this->Tag->del($id)) {
			$this->Session->setFlash('The Tag deleted: id '.$id.'');
			$this->redirect('/admin/tags/index');
		}
	}

}
?>