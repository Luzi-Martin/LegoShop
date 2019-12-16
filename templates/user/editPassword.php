	<div class="row">
		<form action="/user/doEditPassword" method="post" class="col-6">
			<div class="form-group">
				<label for="firstNewPwd">Neues Passwort</label>
				<input title="8 oder mehr Zeichen mit einer Mischung aus grossen- und kleinen Buchstaben und Ziffern" pattern="^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$" id="firstNewPwd" name="firstNewPwd" type="password" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="secondNewPwd">Neues Passwort wiederholen</label>
				<input title="8 oder mehr Zeichen mit einer Mischung aus grossen- und kleinen Buchstaben und Ziffern" pattern="^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$" id="secondNewPwd" name="secondNewPwd" type="password" class="form-control" required>
			<div class="row">
				<div class=" col-md-5 mt-2">
					<button type="submit" name="send" class="btn btn-primary">Passwort ändern</button>
				</div>
			</div>
		</form>
	</div>
</div>