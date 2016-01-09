<div class="tc-board-card col-sm-3">
	<h5 style="position:relative;width:100%">
		<a href=<?php echo "index.php?page=board&amp;board=".$this->id."&amp;user=".$_GET['user'] ?> >
			<?php echo $this->name ?>
		</a>
		<a class="tc-delete-board" href=<?php echo "index.php?page=profile&amp;action=removeBoard&amp;board=".$this->id."&amp;user=".$_GET['user'] ?> >
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
		</a>
	</h5>
	<p><?php echo $this->description ?></p>
</div>