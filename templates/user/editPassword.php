	<div class="row">
		<form action="/user/doEditPassword" method="post" class="col-6">
			<div class="form-group">
				<label for="firstNewPwd">Neues Passwort</label>
				<input id="firstNewPwd" name="firstNewPwd" type="password" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="secondNewPwd">Neues Passwort wiederholen</label>
				<input id="secondNewPwd" name="secondNewPwd" type="password" class="form-control" required>
			<div class="row">
				<div class=" col-md-5 mt-2">
					<button type="submit" name="send" class="btn btn-primary">Passwort ändern</button>
				</div>
			</div>
		</form>
	</div>
</div>