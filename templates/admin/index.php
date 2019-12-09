<div class="row">
	<form action="/admin/newProduct" method="post" class="col-6">
		<div class="form-group">
			<label for="lprice">Preis</label>
			<input id="lprice" name="lprice" type="number" step="0.5" min="1" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="lname">Produktname</label>
			<input id="lname" name="lname" type="text" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="ldescription">Beschreibung</label>
			<textarea id="ldescription" name="ldescription" type="email" class="form-control" required></textarea>
		</div>

		<div class="row">
			<div class=" col-md-4">
				<button type="submit" name="add" class="btn btn-primary">Produkt Hinzufügen</button>
			</div>
		</div>
	</form>
</div>