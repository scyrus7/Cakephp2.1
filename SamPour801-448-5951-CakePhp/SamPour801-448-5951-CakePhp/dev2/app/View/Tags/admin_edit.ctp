<h2>Edit Tag</h2>
<form action="<?php echo $this->Html->url('/admin/tags/edit/'.$this->Html->tagValue('Tag/id')); ?>" method="post">
<div class="optional"> 
	<?php echo $this->Form->labelTag('Tag/tag', 'Tag');?>
 	<?php echo $this->Html->input('Tag/tag', array('size' => '60'));?>
	<?php echo $this->Html->tagErrorMsg('Tag/tag', 'Please enter the Tag.');?>
</div>
<div class="optional"> 
	<?php echo $this->Form->labelTag('Post/Post', 'Related Posts');?>
 	<?php echo $this->Html->selectTag('Post/Post', $posts, $selectedPosts, array('multiple' => 'multiple', 'class' => 'selectMultiple'), array(), true);?>
	<?php echo $this->Html->tagErrorMsg('Post/Post', 'Please select the Related Posts.');?>
</div>
<?php echo $this->Html->hidden('Tag/id')?>
<div class="submit">
	<?php echo $this->Html->submit('Save');?>
</div>
</form>
<ul class="actions">
<li><?php echo $this->Html->link('Delete','/admin/tags/delete/' . $this->Html->tagValue('Tag/id'), null, 'Are you sure you want to delete: id ' . $this->Html->tagValue('Tag/id'));?>
<li><?php echo $this->Html->link('List Tags', '/admin/tags/index')?></li>
</ul>
