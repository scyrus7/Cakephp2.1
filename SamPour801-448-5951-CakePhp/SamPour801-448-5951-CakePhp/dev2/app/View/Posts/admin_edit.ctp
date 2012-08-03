<h2>Edit Post</h2>
<form action="<?php echo $this->Html->url('/admin/posts/edit/'.$this->Html->tagValue('Post/id')); ?>" method="post">
<div class="optional"> 
	<?php echo $form->labelTag('Post/title', 'Title');?>
 	<?php echo $this->Html->input('Post/title', array('size' => '60'));?>
	<?php echo $this->Html->tagErrorMsg('Post/title', 'Please enter the Title.');?>
</div>
<div class="optional"> 
	<?php echo $form->labelTag( 'Post/body', 'Body' );?>
 	<?php echo $this->Html->textarea('Post/body', array('cols' => '60', 'rows' => '10'));?>
	<?php echo $this->Html->tagErrorMsg('Post/body', 'Please enter the Body.');?>
</div>
<div class="optional"> 
	<?php echo $form->labelTag('Tag/Tag', 'Related Tags');?>
 	<?php echo $this->Html->selectTag('Tag/Tag', $tags, $selectedTags, array('multiple' => 'multiple', 'class' => 'selectMultiple'), array(), true);?>
	<?php echo $this->Html->tagErrorMsg('Tag/Tag', 'Please select the Related Tags.');?>
</div>
<?php echo $this->Html->hidden('Post/id')?>
<div class="submit">
	<?php echo $this->Html->submit('Save');?>
</div>
</form>
<ul class="actions">
<li><?php echo $this->Html->link('Delete','/admin/posts/delete/' . $this->Html->tagValue('Post/id'), null, 'Are you sure you want to delete: id ' . $this->Html->tagValue('Post/id'));?>
<li><?php echo $this->Html->link('List Posts', '/admin/posts/index')?></li>
</ul>
