<div class="post">
<h2>View Task</h2>

<dl>
	<dt>Id</dt>
	<dd>&nbsp;<?php echo $post['Post']['id']?></dd>
	<dt>Title</dt>
	<dd>&nbsp;<?php echo $post['Post']['title']?></dd>
	<dt>Body</dt>
	<dd>&nbsp;<?php echo $post['Post']['body']?></dd>
	<dt>Created</dt>
	<dd>&nbsp;<?php echo $post['Post']['created']?></dd>
	<dt>Modified</dt>
	<dd>&nbsp;<?php echo $post['Post']['modified']?></dd>
</dl>
<ul class="actions">
	<li><?php echo $this->Html->link('Edit Post',   '/posts/edit/' . $post['Post']['id']) ?> </li>
	<li><?php echo $this->Html->link('Delete Post', '/posts/delete/' . $post['Post']['id'], null, 'Are you sure you want to delete: id ' . $post['Post']['id'] . '?') ?> </li>
	<li><?php echo $this->Html->link('List Posts',   '/posts/index') ?> </li>
	<li><?php echo $this->Html->link('New Post',	'/posts/add') ?> </li>
</ul>
</div>

<?php
// if the post has an image display it
if(!empty($post['Post']['image_url'])) {
	$url = $post['Post']['image_url'];
	echo '<div class="uploaded_image">'; ?>
	<img src="<?php echo $this->webroot; ?><?php echo $url ?>" alt="Post Image" />
	<?php
	echo '</div>';
}
?>
<div class="related">
<h3>Related Comments</h3>
<?php if (!empty($post['Comment'])):?>
<table cellpadding="0" cellspacing="0">
<tr>
<?php foreach ($post['Comment']['0'] as $column => $value): ?>
<th><?php echo $column?></th>
<?php endforeach; ?>
<th>Actions</th>
</tr>
<?php foreach ($post['Comment'] as $comment):?>
<tr>
	<?php foreach ($comment as $column => $value):?>
		<td><?php echo $value;?></td>
	<?php endforeach;?>
	<td class="actions">
		<?php echo $this->Html->link('View', '/comments/view/' . $comment['id']);?>
		<?php echo $this->Html->link('Edit', '/comments/edit/' . $comment['id']);?>
		<?php echo $this->Html->link('Delete', '/comments/delete/' . $comment['id'], null, 'Are you sure you want to delete: id ' . $comment['id'] . '?');?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>

<ul class="actions">
	<li><?php echo $this->Html->link('New Comment', '/comments/add/');?> </li>
</ul>
</div>
<div class="related">
<h3>Related Tags</h3>
<?php if (!empty($post['Tag'])):?>
<table cellpadding="0" cellspacing="0">
<tr>
<?php foreach ($post['Tag']['0'] as $column => $value): ?>
<th><?php echo $column?></th>
<?php endforeach; ?>
<th>Actions</th>
</tr>
<?php foreach ($post['Tag'] as $tag):?>
<tr>
	<?php foreach ($tag as $column => $value):?>
		<td><?php echo $value;?></td>
	<?php endforeach;?>
	<td class="actions">
		<?php echo $this->Html->link('View', '/tags/view/' . $tag['id']);?>
		<?php echo $this->Html->link('Edit', '/tags/edit/' . $tag['id']);?>
		<?php echo $this->Html->link('Delete', '/tags/delete/' . $tag['id'], null, 'Are you sure you want to delete: id ' . $tag['id'] . '?');?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>

<ul class="actions">
	<li><?php echo $this->Html->link('New Tag', '/tags/add/');?> </li>
</ul>
</div>
