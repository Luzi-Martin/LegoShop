<div class="super_container">
    <div class="single_product">
        <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
            <div class="row">
                <div class="col-md-4 order-lg-1 order-2">
                    <div class="image_list">
                        <div><img src="../../images/lego-stein.png" alt=""></div>
                    </div>
                </div>
                <div class="">
                    <form action="/admin/saveProduct" method="post" class="col">
                        <div class="form-group">
                            <label for="lprice">Preis</label>
                            <?php
                            echo '<input id="lprice" name="lprice" type="number" step="0.5" value="' . $product->price . '" min="1" class="form-control" required>';
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="lname">Produktname</label>
                            <?php
                            echo '<input id="lname" name="lname" value="' . $product->name . '"type="text" class="form-control" required>';
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="ldescription">Beschreibung</label>
                            <?php
                            echo '<textarea id="ldescription" name="ldescription" type="email" class="form-control" required>' . $product->description . '</textarea>';
                            echo '<input type="hidden"  value="' . $product->id . '" name="id">';
                            ?>
                        </div>

                        <div class="row">
                            <div class=" col-md-4">
                                <button type="submit" name="add" class="btn btn-primary">Speichern</button>
                            </div>
                        </div>
                    </form>
                    <form action="/admin/delete" method="post" class="col">
                        <div class="row mt-5">
                            <div class="col-md-4">
                                <?php
                                echo '<input type="hidden" name="id" value="' . $product->id . '">';
                                ?>
                                <button type="submit" class="btn btn-primary">Löschen</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>