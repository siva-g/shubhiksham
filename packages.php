<?php
require './front_connection.php';
/* * *********Above code default in all pages*********** */
$isLoggedIn = false;

$merchant_key = "gtKFFx";
$salt = "eCwWELxi";
$payu_base_url = "https://test.payu.in"; // For Test environment
$action = '';
$currentDir = "http://{$_SERVER['SERVER_NAME']}/shubhiksham/";
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
//$hashSequence = "udf10|udf9|udf8|udf7|udf6|udf5|udf4|udf3|udf2|udf1|email|firstname|productinfo|amount|txnid|key";
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

if (isset($_SESSION['userDetails'])) {
    $isLoggedIn = true;
    $name = $_SESSION['userDetails']['name'];
    $email = $_SESSION['userDetails']['email'];
    $phone = $_SESSION['userDetails']['phone'];
    $userid = $_SESSION['userDetails']['sno'];
}

$form = [
    ['formname' => 'plan1Form', 'amount' => '500', 'productinfo' => 'Plan-20-Rs500', 'udf2' => 30, 'subname' => 'plan1'],
    ['formname' => 'plan2Form', 'amount' => '1000', 'productinfo' => 'Plan-50-Rs1000', 'udf2' => 90, 'subname' => 'plan2'],
    ['formname' => 'plan3Form', 'amount' => '2000', 'productinfo' => 'Plan-100-Rs2000', 'udf2' => 180, 'subname' => 'plan3'],
    ['formname' => 'plan4Form', 'amount' => '5000', 'productinfo' => 'Plan-200-Rs5000', 'udf2' => 270, 'subname' => 'plan4'],
    ['formname' => 'plan5Form', 'amount' => '10000', 'productinfo' => 'Plan-Unlimited-Rs10000', 'udf2' => 1080, 'subname' => 'plan5']
];

foreach ($form as $val) {
    if ($isLoggedIn) {
        $formInput = ['key' => $merchant_key, 'hash' => $hash, 'txnid' => $txnid, 'amount' => $val['amount'], 'productinfo' => $val['productinfo'], 'firstname' => $name, 'email' => $email, 'phone' => $phone, 'udf1' => $userid, 'udf2' => $val['udf2'], 'surl' => $currentDir . 'success.php', 'furl' => $currentDir . 'failure.php', 'curl' => $currentDir . 'cancel.php', 'service_provider' => ''];
        $forms[$val['formname']] = '<form action="' . $action . '" name="' . $val['formname'] . '" method="POST">';
        foreach ($formInput as $ikey => $ivalue) {
            $forms[$val['formname']] .= '<input type="hidden" name="' . $ikey . '" value="' . $ivalue . '" />';
        }
        $forms[$val['formname']] .= '<input type="submit" name="' . $val['subname'] . '" class="btn btn-medium btn-theme" value="Pay now"/>'
                . '</form>';
    } else {
        $forms[$val['formname']] = '<a href="index.php" class="btn btn-medium btn-theme">Login/Register</a>';
    }
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
                        <?php echo $forms['plan1Form']; ?>
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
                        <?php echo $forms['plan2Form']; ?>
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
                        <?php echo $forms['plan3Form']; ?>
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
                        <?php echo $forms['plan4Form']; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-offset-3 col-lg-6">
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
                        <?php echo $forms['plan5Form']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'footer.php'; ?>