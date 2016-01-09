<div class="tc-container-board">
	<h1 class="tc-board-title">
		<?php echo $this->boardModel->getName() ?>
	</h1>
	<h3>
		<?php echo $this->boardModel->getDescription() ?>
	</h3>
	<?php 
		foreach ($this->boardModel->getLists() as $key => $list) {
			$list->output();
		}
	?>
	<form action=<?php echo "index.php?page=board&amp;action=addList&amp;user=".$_GET['user']."&amp;board=".$_GET['board'] ?> method="post">
		<div class="form-group col-sm-3">
			<label>Add a new list</label>
			<input type="text" name="name" class="form-control" placeholder="Name">
			<input class="btn btn-default" style="margin-top:10px;float:right" type="submit">
		</div>
	</form>
</div>