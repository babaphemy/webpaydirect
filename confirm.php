    <?php
    session_start();
    include('incs/options.php');
    include('head.php');
    $amt1 = $_POST['amount'] * 100;
    $splitamt = $amt1 - ($amt1 * 0.015);
    $splitnodecimal = floor($splitamt);
    $_SESSION['amt4hash'] = $amt1;
    $tref = $_SESSION['genref'];

    ?>



    <body>
    <div class="container">

        <!-- row 3: article/aside -->
        <div class="row" style="text-align: center">
            <div class="col-md-offset-4 col-md-4 col-md-offset-4">
                <h2>CONFIRMATION PAGE</h2>

                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">WEBPAY TEST</div>
                        <div class="panel-body">
                            <span class="glyphicon-credit-card"></span>

                            <form name="contactform" method="post"
                                  action="https://sandbox.interswitchng.com/webpay/pay">
                                <h4><span class="glyphicon glyphicon-pushpin"></span>
                                    Your Reference: <p>(<span style="color:#F00"><?php echo $tref; ?></span>)</p><br/>
                                    You are paying : <p>(<span
                                            style="color:#F00"><?php echo $_SESSION['amt4hash'] / 100; ?></span>)</p>
                                </h4>
                                <fieldset>
                                    <legend>Confirm your payment</legend>
                                    <input name="product_id" type="hidden" value="<?php echo $pdtid; ?>">
                                    <input name="pay_item_id" type="hidden" value="<?php echo $payitemid; ?>">
                                    <input name="currency" type="hidden" value="566">
                                    <input name="amount" type="hidden" value="<?php echo $amt1; ?>">
                                    <input name="txn_ref" type="hidden" value="<?php echo $reference; ?>">
                                    <input name="site_redirect_url" type="hidden" value="<?php echo $callbackpage; ?>">
                                    <fieldset class="form-group">
                                        <label for="formGroupExampleInput">Your Hash Result</label>
                                        <input type="text" class="form-control" value="<?php echo dohash($amt1); ?>"
                                               name="hash"/>
                                    </fieldset>
                                    <input name="cust_name" type="hidden" value="Test">
                                    <input name="cust_id" type="hidden" value="AD99">
                                    <input name="payment_params" type="hidden" value="payment_split" />
                                    <input name="xml_data" type="hidden" value=
                                    '<payment_item_detail>
                  <item_details detail_ref="<?php echo $reference ;?>" institution="ESSL Ltd" sub_location="NAUTICAL CORE" faculty="NA">
                  <item_detail item_id="1" item_name="member fees" item_amt="<?php echo $splitnodecimal?>" bank_id="8" acct_num="12345678910" />
                   </item_details> </payment_item_detail>' />






                                    <button type="submit">Pay</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- end container -->

    <!-- javascript -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $('a.btn-info').tooltip()
    </script>
    </body>
    </html>
