<div class="comments">
<h2>List Comments</h2>

<table cellpadding="0" cellspacing="0">
<tr>
	<th>Id</th>
	<th>Post</th>
	<th>Name</th>
	<th>Email</th>
	<th>Text</th>
	<th>Created</th>
	<th>Actions</th>
</tr>
<?php foreach ($comments as $comment): ?>
<tr>
	<td><?php echo $comment['Comment']['id']; ?></td>
	<td>&nbsp;<?php echo $this->Html->link($comment['Post']['title'], '/posts/view/' .$comment['Post']['id'])?></td>
	<td><?php echo $comment['Comment']['name']; ?></td>
	<td><?php echo $comment['Comment']['email']; ?></td>
	<td><?php echo $comment['Comment']['text']; ?></td>
	<td><?php echo $comment['Comment']['created']; ?></td>
	<td class="actions">
		<?php echo $this->Html->link('View','/comments/view/' . $comment['Comment']['id'])?>
		<?php echo $this->Html->link('Edit','/comments/edit/' . $comment['Comment']['id'])?>
		<?php echo $this->Html->link('Delete','/comments/delete/' . $comment['Comment']['id'], null, 'Are you sure you want to delete id ' . $comment['Comment']['id'])?>
	</td>
</tr>
<?php endforeach; ?>
</table>

<ul class="actions">
	<li><?php echo $this->Html->link('New Comment', '/comments/add'); ?></li>
</ul>
</div>