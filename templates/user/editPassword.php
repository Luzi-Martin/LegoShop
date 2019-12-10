<div class="row">
	<form action="/user/editPassword" method="post" class="col-6">
		<div class="form-group">
			<label for="fname">Altes Passwort</label>
			<input id="fname" name="fname" type="text" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="lname">Neues Passwort</label>
			<input id="lname" name="lname" type="text" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="email">Neues Passwort wiederholen</label>
			<input id="email" name="email" type="email" class="form-control" required>
		<div class="row">
			<div class=" col-md-5">
				<button type="submit" name="send" class="btn btn-primary">Passwort ändern</button>
			</div>
		</div>
	</form>
</div>