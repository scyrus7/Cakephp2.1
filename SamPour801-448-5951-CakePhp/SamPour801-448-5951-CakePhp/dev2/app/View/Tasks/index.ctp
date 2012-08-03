<!-- File: /app/views/posts/index.ctp  (edit links added) -->
	 <div id="google_translate_element"></div><script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<h1>To do list</h1>
<p><?php echo $this->Html->link("Add To dos", array('action' => 'add')); ?></p>
<table>
	<tr>
		<th>Id</th>
		<th>Title</th>
                <th>Action</th>
		<th>Created</th>
	</tr>

<!-- Here's where we loop through our $tasks array, printing out task info -->

<?php foreach ($tasks as $task): ?>
	<tr>
		<td><?php echo $task['Task']['id']; ?></td>
		<td>
			<?php echo $this->Html->link($task['Task']['title'], array('action' => 'view', $task['Task']['id']));?>
                </td>
                <td>
			<?php echo $this->Html->link('Delete', 
				array('action' => 'delete', $task['Task']['id']), null, 'Are you sure you want to delete this to do? This can not be redone.');?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $task['Task']['id']));?>
		</td>
		<td><?php echo $task['Task']['created']; ?></td>
	</tr>
<?php endforeach; ?>

</table>
