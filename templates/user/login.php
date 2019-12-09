<div class="row">
	<form action="/user/doLogin" method="post" class="col-6">
		<div class="form-group">
		  <label for="email">E-Mail Adresse</label>
	  	<input id="inputEmail" name="inputEmail" type="email" class="form-control">
		</div>
		<div class="form-group">
		  <label for="password">Passwort</label>
	  	<input id="inputPassword" name="inputPassword" type="password" class="form-control">
		</div>
		<button type="submit" name="send" class="btn btn-primary">Anmelden</button>
		<a href="/user/registration">Oder müssen sie zuerst einen neuen Account erstellen?</a>
	</form>
</div>
