<h1>Student Data</h1>
<p><?= $this->Html->link('Add Topic', ['action' => 'add']) ?></p>
<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Country</th>
		<th>Gender</th>
		<th>Hobby</th>
		<th>Image</th> 
		<th>Actions</th>
	</tr>

	<?php foreach ($topics as $topic): ?>
		<tr>
			<td> <?= $topic->id ?> </td>
			<td>
				<?= $this->Html->link($topic->fname, ['action' => 'view', $topic->id]) ?>
			</td>
			<td>
				<?= $this->Html->link($topic->email, ['action' => 'view', $topic->id]) ?>
			</td>
			<td>
				<?= $this->Html->link($topic->password, ['action' => 'view', $topic->id]) ?>
			</td>
			<td>
				<?= $this->Html->link($topic->country, ['action' => 'view', $topic->id]) ?>
			</td>
			<td>
				<?= $this->Html->link($topic->gender, ['action' => 'view', $topic->id]) ?>
			</td>
			<td>
				<?= $this->Html->link($topic->hobby, ['action' => 'view', $topic->id]) ?>
			</td>
			<td>
				<?= $this->Html->link($topic->image, ('/uploads/'), ['action' => 'view', $topic->id]);?>	
			</td> 
			<td>
				<?= $this->Html->link('Edit', ['action' => 'edit', $topic->id]) ?>
				||
				<?= $this->Form->postLink('Delete',
					['action' => 'delete', $topic->id],
					['confirm' => 'Are you want to sure?'])
				?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>