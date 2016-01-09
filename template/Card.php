<div class="tc-card">
	<h5>
		<?php echo $this->name ?>
		<a class="tc-remove-card" href=<?php echo "index.php?page=board&amp;action=removeCard&amp;card=".$this->id."&amp;user=".$_GET['user']."&amp;board=".$_GET['board'] ?> >
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
		</a>
	</h5>
	<p><?php echo $this->description ?></p>
</div>