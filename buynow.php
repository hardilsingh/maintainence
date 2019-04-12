<?php include("includes/main-rest.php") ?>


<?php

$MERCHANT_KEY = "4jzVPXY0";
$SALT = "rFlBU53S61";
// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";    // For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if (!empty($_POST)) {
    //print_r($_POST);
    foreach ($_POST as $key => $value) {
        $posted[$key] = $value;
    }
}

$formError = 0;

if (empty($posted['txnid'])) {
    // Generate random transaction id
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
    $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if (empty($posted['hash']) && sizeof($posted) > 0) {
    if (
        empty($posted['key'])
        || empty($posted['txnid'])
        || empty($posted['amount'])
        || empty($posted['firstname'])
        || empty($posted['email'])
        || empty($posted['phone'])
        || empty($posted['productinfo'])
        || empty($posted['surl'])
        || empty($posted['furl'])
        || empty($posted['service_provider'])
    ) {
        $formError = 1;
    } else {
        //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = '';
        foreach ($hashVarsSeq as $hash_var) {
            $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
            $hash_string .= '|';
        }

        $hash_string .= $SALT;


        $hash = strtolower(hash('sha512', $hash_string));
        $action = $PAYU_BASE_URL . '/_payment';
    }
} elseif (!empty($posted['hash'])) {
    $hash = $posted['hash'];
    $action = $PAYU_BASE_URL . '/_payment';
}
?>

<head>
    <script>
        var hash = '<?php echo $hash ?>';

        function submitPayuForm() {
            if (hash == '') {
                return;
            }
            var payuForm = document.forms.payuForm;
            payuForm.submit();
        }
    </script>
</head>
<style>
    .breadcrumb {
        background-color: transparent;
        padding: 20px 30px;
    }
</style>

<body onload="submitPayuForm()">
    <div role="columnheader" class="container-fluid signup">


        <!-- START OF NAVIGATION BAR -->
        <?php include("includes/navbar.php") ?>
        <!-- /END OF NAVIGATION BAR -->


        <div class="row" role="row">
            <div class="col-lg-12 banner" role="columnheader">
                <h6 class="display-4 text-center heading" role="heading" style="margin-bottom:3rem; margin-top: 2rem"><i class="fas fa-rupee-sign" style="color:green; margin-right: 1.5rem"></i>Subscribe<span style="color: green">.</span></h1>
                </h6>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Buy now</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h2 class="h2 text-center display-4" style="font-size:35px; color:slategray">Please select a payment method
                    to proceed.</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h2 class="h2 text-center display-4" style="font-size:25px; margin-bottom: 90px; color:green">You can
                    cancel the membership plan at anytime.</h2>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12 mx-auto" role="columnheader" style="padding: 20px 30px;">
            <?php if ($formError) { ?>

                <span style="color:red">Please fill all mandatory fields.</span>
                <br />
                <br />
            <?php } ?>

            <form action="<?php echo $action; ?>" method="post" name="payuForm">
                <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                <input type="hidden" name="hash" value="<?php echo $hash ?>" />
                <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
                <table>
                    <tr>
                        <td>Amount: </td>
                        <td><input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /></td>
                        <td>First Name: </td>
                        <td><input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
                        <td>Phone: </td>
                        <td><input name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Product Info: </td>
                        <td colspan="3"><textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea></td>
                    </tr>
                    <tr style="display:none;">
                        <td>Success URI: </td>
                        <td colspan="3"><input name="surl" value="service.test/payumoney/success.php" size="64" /></td>
                    </tr>
                    <tr style="display:none;">
                        <td>Failure URI: </td>
                        <td colspan="3"><input name="furl" value="service.test/payumoney/failure.php" size="64" /></td>
                    </tr>

                    <tr>
                        <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
                    </tr>
                    <tr>
                        <?php if (!$hash) { ?>
                            <td colspan="4"><input type="submit" value="Submit" /></td>
                        <?php } ?>
                    </tr>
                </table>
            </form>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ol style="color:gray">
                    <li>By clicking on subscribe you agree to our terms and services.</li>
                    <li>You can revert back to no plan at any time.</li>
                    <li>Your outstanding blance will not be refunded.</li>
                    <li>The membership will get cancelled at the end of your time period.</li>
                </ol>
            </div>
        </div>


        <div class="row" role="row">
            <div class="col-lg-12" role="columnheader">

                <!-- START OF FOOTER -->
                <?php include("includes/footer.php") ?>
                <!-- /END OF FOOTER -->

            </div>
        </div>
    </div>
</body>

</html>