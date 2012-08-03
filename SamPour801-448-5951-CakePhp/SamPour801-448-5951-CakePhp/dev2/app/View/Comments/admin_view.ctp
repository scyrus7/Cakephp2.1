<div class="comment">
<h2>View Comment</h2>

<dl>
	<dt>Id</dt>
	<dd>&nbsp;<?php echo $comment['Comment']['id']?></dd>
	<dt>Post</dt>
	<dd>&nbsp;<?php echo $this->Html->link($comment['Post']['title'], '/admin/posts/view/' .$comment['Post']['id'])?></dd>
	<dt>Name</dt>
	<dd>&nbsp;<?php echo $comment['Comment']['name']?></dd>
	<dt>Email</dt>
	<dd>&nbsp;<?php echo $comment['Comment']['email']?></dd>
	<dt>Text</dt>
	<dd>&nbsp;<?php echo $comment['Comment']['text']?></dd>
	<dt>Created</dt>
	<dd>&nbsp;<?php echo $comment['Comment']['created']?></dd>
</dl>
<ul class="actions">
	<li><?php echo $this->Html->link('Edit Comment',   '/admin/comments/edit/' . $comment['Comment']['id']) ?> </li>
	<li><?php echo $this->Html->link('Delete Comment', '/admin/comments/delete/' . $comment['Comment']['id'], null, 'Are you sure you want to delete: id ' . $comment['Comment']['id'] . '?') ?> </li>
	<li><?php echo $this->Html->link('List Comments',   '/admin/comments/index') ?> </li>
	<li><?php echo $this->Html->link('New Comment',	'/admin/comments/add') ?> </li>
	<li><?php echo $this->Html->link('List Post', '/admin/posts/index/')?> </li>
	<li><?php echo $this->Html->link('New Posts', '/admin/posts/add/')?> </li>
</ul>

</div>
