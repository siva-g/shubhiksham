<?php
require './front_connection.php';
/* * *********Above code default in all pages*********** */

echo '<pre>';
print_r($_SERVER);
exit;

$merchant_key = "gtKFFx";
$salt = "eCwWELxi";
$payu_base_url = "https://test.payu.in"; // For Test environment
$action = '';
$currentDir = "http://{$_SERVER['SERVER_NAME']}/shubhiksha_27062017/";
$posted = array();
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        $posted[$key] = $value;
    }
}

$formError = 0;
if (empty($posted['txnid'])) {
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
    $txnid = $posted['txnid'];
}

$hash = '';
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
$formName = isset($_POST['plan1']) ? "plan1Form" : (isset($_POST['plan2']) ? "plan2Form" : (isset($_POST['plan3']) ? "plan3Form" : (isset($_POST['plan4']) ? "plan4Form" : (isset($_POST['plan5']) ? "plan5Form" : "dummyForm"))));
if (empty($posted['hash']) && sizeof($posted) > 0) {
    $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';
    foreach ($hashVarsSeq as $hash_var) {
        $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
        $hash_string .= '|';
    }
    $hash_string .= $salt;
    $hash = strtolower(hash('sha512', $hash_string));
    $action = $payu_base_url . '/_payment';
} elseif (!empty($posted['hash'])) {
    $hash = $posted['hash'];
    $action = $payu_base_url . '/_payment';
}

require 'header.php';
?>
<script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
        if (hash == '') {
            return;
        }
        var payuForm = document.forms.<?php echo $formName; ?>;
        payuForm.submit();
    }
</script>
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    <li class="active">Packages</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4>Details of <strong>Packages</strong></h4>
            </div>
            <div class="col-lg-3">
                <div class="pricing-box-alt special">
                    <div class="pricing-heading">
                        <h3>Plan <strong>20</strong></h3>
                    </div>
                    <div class="pricing-terms">
                        <h6>&#8377; 500</h6>
                    </div>
                    <div class="pricing-content">
                        <ul>
                            <li><i class="icon-ok"></i>Search Profiles</li>
                            <li><i class="icon-ok"></i>View Basic Details</li>
                            <li>Get contact Details upto 20 Profiles</li>
                            <li>Validity: 1 month</li>
                        </ul>
                    </div>
                    <div class="pricing-action">
                        <form action="<?php echo $action; ?>" name="plan1Form" method="POST">
                            <input type="hidden" name="key" value="<?php echo $merchant_key ?>" />
                            <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
                            <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
                            <input type="hidden" name="amount" value="<?php echo (empty($posted['amount'])) ? '500' : $posted['amount'] ?>" />
                            <input type="hidden" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" />
                            <input type="hidden" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" />
                            <input type="hidden" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" />
                            <input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? $currentDir . 'success.php' : $posted['surl'] ?>" />
                            <input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? $currentDir . 'failure.php' : $posted['furl'] ?>" />
                            <input type="hidden" name="curl" value="<?php echo (empty($posted['curl'])) ? $currentDir . 'cancel.php' : $posted['curl'] ?>" />
                            <input type="hidden" name="service_provider" value="" />
                            <a href="#" class="btn btn-medium btn-theme"><i class="icon-bolt"></i> Pay now</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="pricing-box-alt special">
                    <div class="pricing-heading">
                        <h3>Plan <strong>50</strong></h3>
                    </div>
                    <div class="pricing-terms">
                        <h6>&#8377; 1000</h6>
                    </div>
                    <div class="pricing-content">
                        <ul>
                            <li><i class="icon-ok"></i>Search Profiles</li>
                            <li><i class="icon-ok"></i>View Basic Details</li>
                            <li>Get contact Details upto 50 Profiles</li>
                            <li>Validity: 3 months</li>
                        </ul>
                    </div>
                    <div class="pricing-action">
                        <a href="#" class="btn btn-medium btn-theme"><i class="icon-bolt"></i> Pay now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="pricing-box-alt special">
                    <div class="pricing-heading">
                        <h3>Plan <strong>100</strong></h3>
                    </div>
                    <div class="pricing-terms">
                        <h6>&#8377; 2000</h6>
                    </div>
                    <div class="pricing-content">
                        <ul>
                            <li><i class="icon-ok"></i>Search Profiles</li>
                            <li><i class="icon-ok"></i>View Basic Details</li>
                            <li>Get contact Details upto 100 Profiles</li>
                            <li>Validity: 6 months</li>
                        </ul>
                    </div>
                    <div class="pricing-action">
                        <a href="#" class="btn btn-medium btn-theme"><i class="icon-bolt"></i> Pay now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="pricing-box-alt special">
                    <div class="pricing-heading">
                        <h3>Plan <strong>200</strong></h3>
                    </div>
                    <div class="pricing-terms">
                        <h6>&#8377; 5000</h6>
                    </div>
                    <div class="pricing-content">
                        <ul>
                            <li><i class="icon-ok"></i>Search Profiles</li>
                            <li><i class="icon-ok"></i>View Basic Details</li>
                            <li>Get contact Details upto 200 Profiles</li>
                            <li>Validity: 9 months</li>
                        </ul>
                    </div>
                    <div class="pricing-action">
                        <a href="#" class="btn btn-medium btn-theme"><i class="icon-bolt"></i> Pay now</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="pricing-box-alt special">
                        <div class="pricing-heading">
                            <h3>Plan <strong>Unlimited</strong></h3>
                        </div>
                        <div class="pricing-terms">
                            <h6>&#8377; 10000</h6>
                        </div>
                        <div class="pricing-content">
                            <ul>
                                <li><i class="icon-ok"></i>Search Profiles</li>
                                <li><i class="icon-ok"></i>View Basic Details</li>
                                <li>Get contact Details of unlimited Profiles</li>
                                <li>Validity: til marriage</li>
                            </ul>
                        </div>
                        <div class="pricing-action">
                            <a href="#" class="btn btn-medium btn-theme"><i class="icon-bolt"></i> Pay now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- divider -->
        <div class="row">
            <div class="col-lg-12">
                <div class="solidline">
                </div>
            </div>
        </div>
        <!-- end divider -->        
    </div>
</section>

<?php require 'footer.php'; ?>