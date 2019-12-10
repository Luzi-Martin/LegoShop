<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Produkt</th>
                            <th scope="col" class="">Preis</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <div id="products">
                            <?php
                            foreach ($products as $p) {
                                echo '<tr>
                                    <td><img src="../../images/lego-stein.png" style="width: 50px" /> </td>
                                    <td> <a class="" href="/shop/product?id=' . $p->id . '">' . $p->name . '  </a></td>
                                    <td class="">' . $p->price . ' CHF</td>
                                    <td class="">
                                        <button type="button" class="close" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </td>
                                   
                                </tr> ';
                            }
                            ?>
                        </div>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right">
                                <?php
                                $price = 0;

                                foreach ($products as $p) {
                                    $price += $p->price;
                                }

                                echo '<p id="total">' . $price . '<strong></strong></p>';

                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="index" class="btn button btn-primary">Weiter Einkaufen</a>
                </div>
                <div class="col-sm-12 col-md-6 ">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Bezahlen</button>
                </div>
            </div>
        </div>
    </div>
</div>