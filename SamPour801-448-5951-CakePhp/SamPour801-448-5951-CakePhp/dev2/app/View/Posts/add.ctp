<h2>New Post</h2>
<form action="<?php echo $this->Html->url('/posts/add'); ?>" method="post" enctype="multipart/form-data">
<div class="optional"> 
	<?php echo $this->Form->labelTag('Post/title', 'Title');?>
 	<?php echo $this->Html->input('Post/title', array('size' => '60'));?>
	<?php echo $this->Html->tagErrorMsg('Post/title', 'Please enter the Title.');?>
</div>
<div class="optional"> 
	<?php echo $this->Form->labelTag( 'Post/body', 'Body' );?>
 	<?php echo $this->Html->textarea('Post/body', array('cols' => '60', 'rows' => '10'));?>
	<?php echo $this->Html->tagErrorMsg('Post/body', 'Please enter the Body.');?>
</div>

<div class="optional">
	<?php
	
	// here i'm using the html helper to create our file input
	/*
	print out of $this->data after form submission
	Array
	(
		[Post] => Array
			(
				[title] => 
				[body] => 
			)
		[File] => Array
			(
				[image] => Array
					(
						[name] => 15_zamri.jpg
						[type] => image/jpeg
						[tmp_name] => C:\server\tmp\php57.tmp
						[error] => 0
						[size] => 56759
					)
			)
	)
	*/

	?>
	<?php echo $this->Form->labelTag('File/image', 'Image'); ?>
    <?php echo $this->Html->file('File/image'); ?>
</div>

<div class="optional">
	<?php echo $this->Form->labelTag('File/image1', 'Image1'); ?>
    <?php echo $this->Html->file('File/image1'); ?>
</div>

<div class="optional"> 
	<?php echo $this->Form->labelTag('Tag/Tag', 'Related Tags');?>
 	<?php echo $this->Html->selectTag('Tag/Tag', $tags, $selectedTags, array('multiple' => 'multiple', 'class' => 'selectMultiple'), array(), false);?>
	<?php echo $this->Html->tagErrorMsg('Tag/Tag', 'Please select the Related Tags.');?>
</div>
<div class="submit">
	<?php echo $this->Html->submit('Add');?>
</div>
</form>
<ul class="actions">
<li><?php echo $this->Html->link('List Posts', '/posts/')?></li>
</ul>