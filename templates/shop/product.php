<div class="super_container">
    <div class="single_product">
        <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
            <div class="row">
                <div class="col-md-4 order-lg-1 order-2">
                    <div class="image_list">
                        <div><img src="../../images/lego-stein.png" alt=""></div>
                    </div>
                </div>
                <div class="col-lg-6 order-3">
                    <div class="product_description">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Shop</a></li>
                                <li class="breadcrumb-item active">Produkt</li>
                            </ol>
                        </nav>
                        <?php
                        echo '<h3 class="product_name">' . $product->name . '</h3>';
                        echo '<hr>
                            <div class="margin-top-4">';
                        echo '<p>' . $product->price . ' CHF</p>';
                        echo '</div>
                            <hr>
                            <div class="margin-top-4">';
                        echo '<p>' . $product->description . '</p>';
                        ?>

                    </div>
                    <hr class="singleline">
                    <div class="order_info d-flex flex-row">

                    </div>
                    <div class="row">
                        <div class="col-xs-6" style="margin-left: 13px;">

                        </div>
                    </div>
                    <div class="row margin-top-4">
                        <div class="col">
                            <?php
                                echo '<a href="addToShoppingCart?id=' . $product->id. '" name="add" class="btn btn-primary">Zu Warenkorb hinzufügen</a>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>