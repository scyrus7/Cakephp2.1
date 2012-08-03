<div class="tags">
<h2>List Tags</h2>

<table cellpadding="0" cellspacing="0">
<tr>
	<th>Id</th>
	<th>Tag</th>
	<th>Created</th>
	<th>Modified</th>
	<th>Actions</th>
</tr>
<?php foreach ($tags as $tag): ?>
<tr>
	<td><?php echo $tag['Tag']['id']; ?></td>
	<td><?php echo $tag['Tag']['tag']; ?></td>
	<td><?php echo $tag['Tag']['created']; ?></td>
	<td><?php echo $tag['Tag']['modified']; ?></td>
	<td class="actions">
		<?php echo $this->Html->link('View','/tags/view/' . $tag['Tag']['id'])?>
		<?php echo $this->Html->link('Edit','/tags/edit/' . $tag['Tag']['id'])?>
		<?php echo $this->Html->link('Delete','/tags/delete/' . $tag['Tag']['id'], null, 'Are you sure you want to delete id ' . $tag['Tag']['id'])?>
	</td>
</tr>
<?php endforeach; ?>
</table>

<ul class="actions">
	<li><?php echo $this->Html->link('New Tag', '/tags/add'); ?></li>
</ul>
</div>