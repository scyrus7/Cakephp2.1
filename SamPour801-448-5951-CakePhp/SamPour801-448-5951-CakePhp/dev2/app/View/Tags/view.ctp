<div class="tag">
<h2>View Tag</h2>

<dl>
	<dt>Id</dt>
	<dd>&nbsp;<?php echo $tag['Tag']['id']?></dd>
	<dt>Tag</dt>
	<dd>&nbsp;<?php echo $tag['Tag']['tag']?></dd>
	<dt>Created</dt>
	<dd>&nbsp;<?php echo $tag['Tag']['created']?></dd>
	<dt>Modified</dt>
	<dd>&nbsp;<?php echo $tag['Tag']['modified']?></dd>
</dl>
<ul class="actions">
	<li><?php echo $this->Html->link('Edit Tag',   '/tags/edit/' . $tag['Tag']['id']) ?> </li>
	<li><?php echo $this->Html->link('Delete Tag', '/tags/delete/' . $tag['Tag']['id'], null, 'Are you sure you want to delete: id ' . $tag['Tag']['id'] . '?') ?> </li>
	<li><?php echo $this->Html->link('List Tags',   '/tags/index') ?> </li>
	<li><?php echo $this->Html->link('New Tag',	'/tags/add') ?> </li>
</ul>

</div>
<div class="related">
<h3>Related tasks</h3>
<?php if (!empty($tag['Post'])):?>
<table cellpadding="0" cellspacing="0">
<tr>
<?php foreach ($tag['Post']['0'] as $column => $value): ?>
<th><?php echo $column?></th>
<?php endforeach; ?>
<th>Actions</th>
</tr>
<?php foreach ($tag['Post'] as $post):?>
<tr>
	<?php foreach ($post as $column => $value):?>
		<td><?php echo $value;?></td>
	<?php endforeach;?>
	<td class="actions">
		<?php echo $this->Html->link('View', '/posts/view/' . $post['id']);?>
		<?php echo $this->Html->link('Edit', '/posts/edit/' . $post['id']);?>
		<?php echo $this->Html->link('Delete', '/posts/delete/' . $post['id'], null, 'Are you sure you want to delete: id ' . $post['id'] . '?');?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>

<ul class="actions">
	<li><?php echo $this->Html->link('New Post', '/posts/add/');?> </li>
</ul>
</div>
