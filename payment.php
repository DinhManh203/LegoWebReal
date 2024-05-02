<?php
    session_start();

    if(isset($_POST['order_pay_btn'])){

        $order_status = $_POST['order_status'];
        $order_total_price = $_POST['order_total_price'];

    }

    include('layouts/header.php');
?>




    <!-- Payment -->
    <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="font-weight-bold" style="color: coral;">Payment</h2>
        <hr class="mx-auto w-50" style="background-color: #fb774b;">
    </div>

    <div class="mx-auto container text-center">


        <?php if(isset($_POST['order_status']) && $_POST['order_status'] == "not paid"){ ?>
            
            <?php $amount = strval($_POST['order_total_price']); ?>
            <?php $order_id = $_POST['order_id']; ?>
            <p>Total Payment: $<?php echo $_POST['order_total_price'];?></p>

            <!-- <form action="server/paymentController.php" method="POST">

                <button type="submit" name="" class="btn btn-primary" value="VNPay" style="width: 28%">VNPay</button>

            </form> -->

            <div id="paypal-button" class="paypalBank container text-center pt-3" style="width: 30%">

                <input type="hidden" id="amount" value="<?php echo $amount ?>">

            </div> 

        <?php } else if(isset($_SESSION['total']) && ($_SESSION['total'] != 0)) { ?>

            <?php $amount = strval($_SESSION['total']); ?>
            <?php $order_id = $_SESSION['order_id']; ?>

            <p>Total payment: $<?php echo $_SESSION['total'];?></p>
            
            <!-- <form action="server/paymentController.php" method="POST">
                
                <button type="submit" name="" class="btn btn-primary btn-medium" value="VNPay" style="">VNPay</button>

            </form> -->

            <div id="paypal-button" class="container text-center pt-3" style="width: 30%">

                <input type="hidden" id="amount" value="<?php echo $amount ?>">

            </div> 
        
        
        <?php } else { ?>

            <p>You don't have an order </p>

        <?php } ?>

    </div>

    
</section>

<script src="https://www.paypal.com/sdk/js?client-id=AcJMwPfjAOK4JTabPeG-mOrV0CfaDL_KPNNwjwp4vUdVswBA5fSwE1FyvFPaRpxMwKwTV0pu0llJT9GE&currency=USD"></script>

    <style>
    @media screen and (max-width: 400px) {
    #paypal-button {
    width: 100%;
    }
    }

    @media screen and (min-width: 400px) {
    #paypal-button {
    width: 250px;
    }
    }
    </style>

    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        paypal.Button.render({
        // Configure environment
        env: 'sandbox',
        client: {
        sandbox: 'AcJMwPfjAOK4JTabPeG-mOrV0CfaDL_KPNNwjwp4vUdVswBA5fSwE1FyvFPaRpxMwKwTV0pu0llJT9GE',
        production: 'demo_production_client_id'
        },
        locale: 'en_US',
        style: {
        size: 'responsive',
        color: 'gold',
        shape: 'pill',
        layout: 'vertical',
        shape: 'rect',
        },


        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment   
        payment: function(data, actions) {
            var totalAmount = '<?php echo $amount; ?>';
        return actions.payment.create({
            transactions: [{
            amount: {
                total: totalAmount,
                currency: 'USD',
            }
            }]
        });
        },

        createOrder: function(data, actions){
            return actions.order.create({
                    purchase_units: [{
                    amount: {
                        value: '<?php echo $amount; ?>'
                    }
                }]
            });
        },
        

        // Execute the payment
        onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function() {
            // Show a confirmation message to the buyer
            window.alert('Thank you for your purchase!');
            window.location.href = "server/complete_payment.php?order_id=<?php echo $order_id; ?> ";
        });
        }
        }, '#paypal-button');

    </script>

    </script>

</script>



<?php

include('layouts/footer.php');

?>