<div class="col-sm-3 tc-list"> 
	<h4><?php echo $this->name ?>
		<a class="tc-remove-list" href=<?php echo "index.php?page=board&amp;action=removeList&amp;list=".$this->id."&amp;user=".$_GET['user']."&amp;board=".$_GET['board'] ?> >
			<span class="glyphicon glyphicon-remove" aria-hidden="true" ></span>
		</a>
	</h4>
		<?php 
			foreach ($this->getCards() as $key => $card) {
				$card->output();
			}
		?>
	<form style="margin-top:10px" action=<?php echo "index.php?page=board&amp;action=addCard&amp;list=".$this->id."&amp;user=".$_GET['user']."&amp;board=".$_GET['board'] ?> method="post">
		<div class="form-group">
			<label>Add a new card</label>
			<input type="text" name="name" class="form-control" placeholder="Name">
		</div>
		<input class="btn btn-default" style="float:right" type="submit">
	</form>
</div>