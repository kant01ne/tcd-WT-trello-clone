
<div class="tc-container-profile">
	<div class="col-xs-4">
		<h2>Login</h2>
		<p>No password needed. Trello-clone works with trust in its user!</p>
		<form action=<?php echo "index.php?page=login&action=login" ?> method="post">
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" placeholder="Email">
			</div>
			<input class="btn btn-default" style="float:right" type="submit">
		</form>
	</div>
	<div class="col-xs-4 col-xs-offset-2">
		<h2>Register</h2>
		<form action="index.php?page=login&amp;action=register" method="post">
			<div class="form-group">
				<label>Firstname</label>
				<input type="text" class="form-control" name="firstname" placeholder="FirstName">
			</div>
			<div class="form-group">
				<label>Lastname</label>
				<input type="text" class="form-control" name="lastname" placeholder="FirstName">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="FirstName">
			</div>
			<input type="text" name="action" value="create-user" hidden>
			<input class="btn btn-default" style="float:right" type="submit">
		</form>
	</div>
</div>
