<div class="posts">
<h2>List Posts</h2>

<table cellpadding="0" cellspacing="0">
<tr>
	<th>Id</th>
	<th>Title</th>
	<th>Body</th>
	<th>Created</th>
	<th>Modified</th>
	<th>Actions</th>
</tr>
<?php foreach ($posts as $post): ?>
<tr>
	<td><?php echo $post['Post']['id']; ?></td>
	<td><?php echo $post['Post']['title']; ?></td>
	<td><?php echo $post['Post']['body']; ?></td>
	<td><?php echo $post['Post']['created']; ?></td>
	<td><?php echo $post['Post']['modified']; ?></td>
	<td class="actions">
		<?php echo $this->Html->link('View','/admin/posts/view/' . $post['Post']['id'])?>
		<?php echo $this->Html->link('Edit','/admin/posts/edit/' . $post['Post']['id'])?>
		<?php echo $this->Html->link('Delete','/admin/posts/delete/' . $post['Post']['id'], null, 'Are you sure you want to delete id ' . $post['Post']['id'])?>
	</td>
</tr>
<?php endforeach; ?>
</table>

<ul class="actions">
	<li><?php echo $this->Html->link('New Post', '/admin/posts/add'); ?></li>
</ul>
</div>