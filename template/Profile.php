<div class="tc-container-profile">
	<div class="tc-main-title">
		<h1 >Welcome <?php echo $this->userModel->getFirstName(); ?> </h1>
	</div>
	<div class="col-sm-12">
		<h2 >Your boards</h2>
		<?php 
		foreach ($this->userModel->getBoards() as $key => $board) {
			$board->output();
		}
		?>
	</div>
	<div class="col-sm-12">
		<div class="col-sm-3 tc-add-board" onclick="addBoard()">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			Create a board
			<form class="tc-form-add-board" style="display:none;margin-top:35px" action=<?php echo "index.php?page=profile&amp;action=addBoard&amp;user=".$_GET['user'] ?> method="post">
				<div class="form-group">
				    <label for="exampleInputPassword1">Name</label>
				  	<input type="text" name="name" class="form-control"  placeholder="Name">
				</div>
				<input type="submit" style="float:right" class="btn btn-danger">
			</form>
		</div>
	</div>
</div>