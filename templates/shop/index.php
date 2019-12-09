<div class="shop">
    <h1>Das sind alle Angebote</h1>
    <div class="product-container">
        <div class="product">
            <?php
            foreach ($products as $product) {
                echo 
                '<div class="list-group-item list-group-item-action card">
                  <img src="../images/lego-stein.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">' . $product->name . '</h5>
                    <p class="card-text">Der Preis ist ' . $product->price . '.-</p>
                    <button href="product.php?id='. $product->id. '" class="btn btn-primary">Go somewhere</button>
                    </div>
                </div>';
                }
            ?>
        </div>
    </div>
</div>