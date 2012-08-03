<?php
class CommentsController extends AppController {

	var $name = 'Comments';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->Comment->recursive = 0;
		$this->set('comments', $this->Comment->find('all'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Comment.');
			$this->redirect('/comments/index');
		}
		$this->set('comment', $this->Comment->read(null, $id));
	}

	function add() {
		if (empty($this->data)) {
			$this->set('posts', $this->Comment->Post->generateList());
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Comment->save($this->data)) {
				$this->Session->setFlash('The Comment has been saved');
				$this->redirect('/comments/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('posts', $this->Comment->Post->generateList());
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Comment');
				$this->redirect('/comments/index');
			}
			$this->data = $this->Comment->read(null, $id);
			$this->set('posts', $this->Comment->Post->generateList());
		} else {
			$this->cleanUpFields();
			if ($this->Comment->save($this->data)) {
				$this->Session->setFlash('The Comment has been saved');
				$this->redirect('/comments/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('posts', $this->Comment->Post->generateList());
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Comment');
			$this->redirect('/comments/index');
		}
		if ($this->Comment->del($id)) {
			$this->Session->setFlash('The Comment deleted: id '.$id.'');
			$this->redirect('/comments/index');
		}
	}


	function admin_index() {
		$this->Comment->recursive = 0;
		$this->set('comments', $this->Comment->findAll());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Comment.');
			$this->redirect('/admin/comments/index');
		}
		$this->set('comment', $this->Comment->read(null, $id));
	}

	function admin_add() {
		if (empty($this->data)) {
			$this->set('posts', $this->Comment->Post->generateList());
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Comment->save($this->data)) {
				$this->Session->setFlash('The Comment has been saved');
				$this->redirect('/admin/comments/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('posts', $this->Comment->Post->generateList());
			}
		}
	}

	function admin_edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Comment');
				$this->redirect('/admin/comments/index');
			}
			$this->data = $this->Comment->read(null, $id);
			$this->set('posts', $this->Comment->Post->generateList());
		} else {
			$this->cleanUpFields();
			if ($this->Comment->save($this->data)) {
				$this->Session->setFlash('The Comment has been saved');
				$this->redirect('/admin/comments/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('posts', $this->Comment->Post->generateList());
			}
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Comment');
			$this->redirect('/admin/comments/index');
		}
		if ($this->Comment->del($id)) {
			$this->Session->setFlash('The Comment deleted: id '.$id.'');
			$this->redirect('/admin/comments/index');
		}
	}

}
?>