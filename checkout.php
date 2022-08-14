<?php
include("inc/head.php");
ob_start();
// session_start();
isset($_SESSION['username_user']) ? $_SESSION['username_user'] : header('location:login.php');
$id_user = $_SESSION['id_user'];
?>
<link rel="stylesheet" href="css/demo.css">
</head>

<body>
    <?php
    include("inc/header.php");
    ?>
    <div class="container py-5 mt-5">
        <div class="py-5 text-center">

            <h2>Checkout form</h2>
            <!-- <p class="lead">Below is an example form built entirely with Bootstrap 5 form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <!-- <span class="badge badge-secondary badge-pill">3</span> -->
                </h4>
                <ul class="list-group mb-3">
                    <?php
                    connect();

                    $total = 0;
                    $select_cart = mysqli_query($con, "SELECT * FROM cart ");
                    while ($cart = mysqli_fetch_array($select_cart)) {
                        $select_prod = mysqli_query($con, "SELECT * FROM product WHERE id='$cart[product_id]' ");
                        $product_cart = mysqli_fetch_array($select_prod);
                        $total +=  $cart['price'];

                    ?>

                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"><?= $product_cart['name']; ?></h6>
                                <small class="text-muted">$<?= $cart['price']; ?></small>
                            </div>
                            <span class="text-muted">$<?= $cart['price'] * $cart['qty'] ?>.00</span>
                        </li>



                    <?php
                    }; ?>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                        </div>
                        <span class="text-success">$0</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>$<?= $total; ?></strong>
                    </li>
                </ul>
                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_POST["submit"])) {
                $select_address = $_POST['select_address'];
                $paymentMethods = $_POST['paymentMethods'];
                if ($select_address == 0) {
                    $name_address = $_POST['name_address'];
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $address2 = $_POST['address2'];
                    $country = $_POST['country'];
                    $state = $_POST['state'];
                    $zip = $_POST['zip'];
                    $insert = mysqli_query($con, "INSERT INTO addresses (user_id,name,firstname,lastname,email,address,address2,country,state,zip) VALUES('$id_user','$name_address','$firstName','$lastName','$email','$address','$address2','$country','$state','$zip')");
                }
                if ($paymentMethods == 1) {
                    $paymentMethod = $_POST['paymentMethod'];
                    $cc_name = $_POST['cc_name'];
                    $cc_number = $_POST['cc_number'];
                    $cc_expiration = $_POST['cc_expiration'];
                    $cc_cvv = $_POST['cc_cvv'];
                    $insert = mysqli_query($con, "INSERT INTO creditcards (typecard,name,number,expiration,cvv) VALUES('$paymentMethod', '$cc_name','$cc_number','$cc_expiration','$cc_cvv')");
                }
            ?>
                <meta http-equiv="refresh" content=".01;url=summary.php?select_address=<?= $select_address; ?>&paymentMethods=<?= $paymentMethods; ?>">
            <?php
            }
            ?>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Shipping address</h4>
                <form class="needs-validation" novalidate method="POST" action="">
                    <div class="col-12">
                        <label for="country">Select Address</label>
                        <select class="custom-select d-block w-100 " id="select_address" style="height: 38px; " name="select_address" required>
                            <option value="0">+ Add new address...</option>
                            <?php
                            $select_address = mysqli_query($con, "SELECT * FROM addresses Where user_id='$id_user' ");
                            while ($address = mysqli_fetch_array($select_address)) {
                            ?>
                                <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid Address.
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="firstName">Name address</label>
                        <input type="text" class="form-control" name="name_address" id="name" placeholder="Home,Work etc..." value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First name</label>
                                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last name</label>
                                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="email">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" name="email" id="email" value="<?= $_SESSION['email_user'] ?>">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite">
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" placeholder="">
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="">
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>
                        <!-- <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div> -->
                        <hr class="mb-4">
                        <h4 class="mb-3">Payment way</h4>

                        <div class="d-block my-3" id="select_card">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="paymentMethods" type="radio" class="custom-control-input nochecked" value="0" checked required>
                                <label class="custom-control-label" for="credit">Cash on delivery</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="paymentMethods" type="radio" class="custom-control-input checked" value="1" required>
                                <label class="custom-control-label" for="debit">Pay with card</label>
                            </div>
                        </div>

                        <section class="credit_card">
                            <h4 class="mb-3">Payment</h4>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" value="Credit card" type="radio" class="custom-control-input" checked required>
                                    <label class="custom-control-label" for="credit">Credit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="debit" name="paymentMethod" value="Debit card" type="radio" class="custom-control-input" required>
                                    <label class="custom-control-label" for="debit">Debit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="paypal" name="paymentMethod" value="PayPal" type="radio" class="custom-control-input" required>
                                    <label class="custom-control-label" for="paypal">PayPal</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cc-name">Name on card</label>
                                    <input type="text" class="form-control" id="cc-name" name="cc_name" placeholder="" required>
                                    <small class="text-muted">Full name as displayed on card</small>
                                    <div class="invalid-feedback">
                                        Name on card is required
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-number">Credit card number</label>
                                    <input type="text" class="form-control" id="cc-number" name="cc_number" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Credit card number is required
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">Expiration</label>
                                    <input type="text" class="form-control" id="cc-expiration" name="cc_expiration" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Expiration date required
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-cvv">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" name="cc_cvv" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Security code required
                                    </div>
                                </div>
                            </div>
                        </section>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">place order</button>
                </form>
            </div>
        </div>


    </div>


    <?php
    include("inc/footer.php")
    ?>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $("#select_address").change(function() {
                $.ajax({
                    url: "ajax/address.php",
                    type: "post",
                    data: {
                        id: $(this).val()
                    },
                    success: function(result) {
                        // $("#weather-temp").html("<strong>" + result + "</strong> degrees");
                        // var data = array.from(result)
                        // var data = JSON.parse(result);

                        $("#name").val(JSON.parse(result)[2])
                        $("#firstName").val(JSON.parse(result)[3])
                        $("#lastName").val(JSON.parse(result)[4])
                        $("#email").val(JSON.parse(result)[5])
                        $("#address").val(JSON.parse(result)[6])
                        $("#address2").val(JSON.parse(result)[7])
                        $("#country").val(JSON.parse(result)[8])
                        $("#state").val(JSON.parse(result)[9])
                        $("#zip").val(JSON.parse(result)[10])
                    }
                });
            })
            $(".checked").click(function() {
                $(".credit_card").addClass("active")

            })
            $(".nochecked").click(function() {
                $(".credit_card").removeClass("active")

            })


        })
    </script>
</body>

</html>