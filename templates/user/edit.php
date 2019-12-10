
<div class="row">
	<form action="/user/doEdit" method="post" class="col-6">
		<div class="form-group">
			<label for="fname">Vorname</label>
			<?php
				echo '<input id="fname" name="fname" type="text" class="form-control" required value="'. $user->firstName . '">';
			?>
		</div>
		<div class="form-group">
			<label for="lname">Nachname</label>
			<?php
				echo '<input id="lname" name="lname" type="text" class="form-control" required value="' . $user->lastName . '">';
			?>
		</div>
		<div class="form-group">
			<label for="email">Mail</label>
			<?php
				echo '<input id="email" name="email" type="email" class="form-control" required value="' . $user->email . '">';
			?>
		</div>
		<div class="form-group">
			<label for="street">Strasse</label>
			<?php
				echo '<input id="street" name="street" type="text" class="form-control" required value="'. $user->street . '">';
			?>
		</div>
		<div class="form-group">
			<label for="house_nr">Haus Nummer</label>
			<?php
				echo '<input id="house_nr" name="house_nr" type="text" class="form-control" required value="' . $user->house_nr . '">';
			?>
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

		</div>
		<div class="row">
			<div class=" col-md-5">
				<button type="submit" name="send" class="btn btn-primary">Bearbeiten beenden</button>
			</div>
			<div>
				<a href="/">Oder wollen Sie abbrechen?</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5 mt-2">
                <a href?"<button type="submit" class="btn btn-primary">Passwort ändern</button>
			</div>
        </div>
	</form>
</div>

