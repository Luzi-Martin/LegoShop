<div class="row">
	<form action="/user/doRegistrate" method="post" class="col-6">
		<div class="form-group">
			<label for="fname">Vorname</label>
			<input id="fname" name="fname" type="text" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="lname">Nachname</label>
			<input id="lname" name="lname" type="text" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="email">Mail</label>
			<input id="email" name="email" type="email" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="street">Strasse</label>
			<input id="street" name="street" type="text" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="house_nr">Haus Nummer</label>
			<input id="house_nr" name="house_nr" type="text" class="form-control" required>
		</div>
		<div class="form-group">
			<select name="location_id" class="form-control form-control-sm">
				<?php
				foreach ($locations as $value) {
					echo '<option value="' . $value->id . '">' . $value->name . '</option>';
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label class="control-label" for="password">Passwort</label>
			<input id="password" title="8 oder mehr Zeichen mit einer Mischung aus grossen- und kleinen Buchstaben und Ziffern" pattern="^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$" name="password" type="password" class="form-control" required>
		</div>
		<div class="form-group">

		</div>
		<div class="row">
			<div class=" col-md-5">
				<button type="submit" name="send" class="btn btn-primary">Registrieren</button>
			</div>
			<div>
				<a href="/user/login">Oder haben Sie schon einen Account? Login</a>
			</div>
		</div>
	</form>
</div>