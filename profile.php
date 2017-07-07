<?php
require './front_connection.php';
/* * *********Above code default in all pages*********** */

if (!isset($_SESSION['userDetails'])) {
    header('Location:login.php');
}

require 'header.php';
?>
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    <li class="active">Profile</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">
                    <strong>Profile</strong>
                </h2>
                <hr>
                <?php $User = $_SESSION['userDetails']; ?>
                <div class="row">
                    <div class="col-lg-offset-3 col-lg-6">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td class="text-right">Name</td>
                                    <td><?php echo $User['name']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Email Address</td>
                                    <td><?php echo $User['email']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Phone Number</td>
                                    <td><?php echo $User['phone']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Date of Birth</td>
                                    <td><?php echo date('jS M Y', strtotime($User['dob'])); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Gender</td>
                                    <td><?php echo $User['gender'] == 1 ? 'Male' : 'Female'; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Status</td>
                                    <td><?php echo $User['status'] == 1 ? 'Active' : 'In-Active'; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--                <form method="post" action="freeregaction.php" enctype="multipart/form-data">
                                    <table style="border: solid 1px; padding:5px;" border="0" cellpadding="0" cellspacing="0" width="90%">
                                        <tbody><tr>
                                                <td colspan="3" class="regtitle" align="left">Personal Details</td>
                                            </tr>
                                            <tr>
                                                <td width="49%"><table border="0" cellpadding="5" cellspacing="0" width="100%">
                                                        <tbody><tr>
                                                                <td align="left">திருமண நிலை <span class="star">*</span></td>
                                                                <td align="right">
                                                                    <select class="regfrm-select" name="mstatus" id="mstatus">
                                                                        <option selected="selected" value="">தேர்வு செய்க</option>
                                                                        <option value="திருமணமாகதவர்">திருமணமாகதவர்</option>
                                                                        <option value="மறுமணம் / விவாகரத்தானவர்கள் / துணையை இழந்தவர்கள்">மறுமணம் / விவாகரத்தானவர்கள் / துணையை இழந்தவர்கள்</option>
                                                                        <option value="ஜாதி தடைஇல்லை / எம்மதமும் சம்மதம் / கலப்பு திருமணம்">ஜாதி தடைஇல்லை / எம்மதமும் சம்மதம் / கலப்பு திருமணம்</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">பெயர் <span class="star">*</span></td>
                                                                <td align="right"><input name="name" id="name" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">மதம் <span class="star">*</span></td>
                                                                <td align="right">
                                                                    <select class="regfrm-select" name="religion" id="religion">
                                                                        <option selected="selected" value="">தேர்வு செய்க</option>
                                                                        <option value="Hindu">இந்து</option>
                                                                        <option value="Christian">கிறிஸ்தவம்</option>
                                                                        <option value="Muslim">முஸ்லீம்</option>
                                                                    </select>
                                                                    <script> document.getElementById('religion').value = ''</script>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">இனம் <span class="star">*</span></td>
                                                                <td align="right">
                                                                    <select class="regfrm-select" name="caste" id="caste">
                                                                        <option value="Select">தேர்வு செய்க</option>
                                                                        <option value="நாடார்">நாடார்</option>
                                                                        <option value="அசைவ பிள்ளைமார்">அசைவ பிள்ளைமார்</option>
                                                                        <option value="ஆசாரியர்">ஆசாரியர்</option>
                                                                        <option value="யாதவர்">யாதவர்</option>
                                                                        <option value="அகமுடையார்">அகமுடையார்</option>
                                                                        <option value="கவரா நாயுடு">கவரா நாயுடு</option>
                                                                        <option value="கள்ளர்">கள்ளர்</option>
                                                                        <option value="மறவர்">மறவர்</option>
                                                                        <option value="செட்டியார்">செட்டியார்</option>
                                                                        <option value="கிறிஸ்தவர்">கிறிஸ்தவர்</option>
                                                                        <option value="முதலியார்">முதலியார்</option>
                                                                        <option value="சைவப்பிள்ளை">சைவப்பிள்ளை</option>
                                                                        <option value="இல்லத்து பிள்ளைமார்">இல்லத்து பிள்ளைமார்</option>
                                                                        <option value="PR">PR</option>
                                                                        <option value="PL">PL</option>
                                                                        <option value="ரெட்டியார்">ரெட்டியார்</option>
                                                                        <option value="கவுண்டர்">கவுண்டர்</option>
                                                                        <option value="முஸ்லீம்">முஸ்லீம்</option>
                                                                        <option value="கம்மவார் நாயுடு">கம்மவார் நாயுடு</option>
                                                                        <option value="பலிஜா நாயுடு">பலிஜா நாயுடு</option>
                                                                        <option value="அருந்ததியர்">அருந்ததியர்</option>
                                                                        <option value="நாயர்">நாயர்</option>
                                                                        <option value="மூப்பனார்">மூப்பனார்</option>
                                                                        <option value="மருத்துவர்">மருத்துவர்</option>
                                                                        <option value="வீரசைவம்">வீரசைவம்</option>
                                                                        <option value="வண்ணார்">வண்ணார்</option>
                                                                        <option value="வன்னியர்">வன்னியர்</option>
                                                                        <option value="சௌராஷ்டிரா">சௌராஷ்டிரா</option>
                                                                        <option value="நாயக்கர்">நாயக்கர்</option>
                                                                        <option value="வேளார்">வேளார்</option>
                                                                        <option value="உடையார்">உடையார்</option>
                                                                        <option value="மறுமணம்">மறுமணம்</option>
                                                                    </select>
                                                                    <script> document.getElementById('caste').value = ''</script>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">உட்பிரிவு <span class="star">*</span></td>
                                                                <td align="right"><input name="scaste" id="scaste" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">குலம்/கோத்திரம்</td>
                                                                <td align="right"><input name="kulam" id="kulam" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">உயரம்</td>
                                                                <td align="right"><input name="height" id="height" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">கல்வி <span class="star">*</span></td>
                                                                <td align="right"><input name="education" id="education" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                
                                                            <tr>
                                                                <td align="left">உடல் தகுதி</td>
                                                                <td align="right"><input name="healthdet" id="healthdet" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                        </tbody></table></td>
                                                <td width="2%">&nbsp;</td>
                                                <td valign="top" width="49%"><table border="0" cellpadding="5" cellspacing="0" width="100%">
                                                        <tbody><tr>
                                                                <td align="left">பாலினம் <span class="star">*</span></td>
                                                                <td align="right">
                                                                    <select class="regfrm-select" name="gender" id="gender">
                                                                        <option selected="selected" value="">தேர்வு செய்க</option>
                                                                        <option value="male">ஆண்</option>
                                                                        <option value="female">பெண்</option>
                                                                    </select>
                
                                                                    <script> document.getElementById('gender').value = ''</script>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">பிறந்த நாள் <span class="star">*</span></td>
                                                                <td align="right">
                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                        <tbody><tr><td><font size="3">
                                                                                    <select size="1" name="dobday" class="regfrm-select" id="dobday" style="width:70px;">
                                                                                        <option selected="selected" value="">--Date--</option>
                                                                                        <option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>					</select></font><font size="2">
                                                                                    </font>
                                                                                    <font size="3">
                                                                                    <select size="1" name="dobmonth" class="regfrm-select" id="dobmonth" style="width:92px;">
                                                                                        <option value="" selected="selected">-- Month --</option>
                                                                                        <option value="01">January</option>
                                                                                        <option value="02">February</option>
                                                                                        <option value="03">March</option>
                                                                                        <option value="04">April</option>
                                                                                        <option value="05">May</option>
                                                                                        <option value="06">June</option>
                                                                                        <option value="07">July</option>
                                                                                        <option value="08">August</option>
                                                                                        <option value="09">September</option>
                                                                                        <option value="10">October</option>
                                                                                        <option value="11">November</option>
                                                                                        <option value="12">December</option>
                                                                                    </select><font size="2">
                                                                                    </font>					</font>
                                                                                    <select size="1" name="dobyear" class="regfrm-select" id="dobyear" style="width:70px;">
                                                                                        <option selected="selected" value="">-Year-</option>
                                                                                        <option value="1954">1954</option><option value="1955">1955</option><option value="1956">1956</option><option value="1957">1957</option><option value="1958">1958</option><option value="1959">1959</option><option value="1960">1960</option><option value="1961">1961</option><option value="1962">1962</option><option value="1963">1963</option><option value="1964">1964</option><option value="1965">1965</option><option value="1966">1966</option><option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option>					</select></td>
                                                                            </tr></tbody></table>
                
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">பிறந்த நேரம்</td>
                                                                <td align="right">
                
                
                                                                    <input name="dobtime" id="dobtime" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">நிறம்</td>
                                                                <td align="right">
                                                                    <select name="color" class="regfrm-select" id="color">
                                                                        <option selected="selected" value="">தெரிவு செய்க </option>
                                                                        <option value="சிவப்பு">சிவப்பு</option>
                                                                        <option value="மாநிறம்">மாநிறம்</option>
                                                                        <option value="கருப்பு">கருப்பு</option>
                                                                        <option value="புதுநிறம்">புதுநிறம்</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">தொழில்/ வேலை</td>
                                                                <td align="right"><input name="job" id="job" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">வருமானம்</td>
                                                                <td align="right"><input name="salary" id="salary" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">பணிபுரியுமிடம்</td>
                                                                <td align="right"><input name="workingplace" id="workingplace" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">குலதெய்வம்</td>
                                                                <td align="right"><input name="kulagod" id="kulagod" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">மாற்றுத்திறனாளி</td>
                                                                <td align="right"><input name="handicapte" id="handicapte" placeholder="குறிப்பு" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                        </tbody></table></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="regtitle" align="left">Family Details</td>
                                            </tr>
                                            <tr>
                                                <td width="49%"><table border="0" cellpadding="5" cellspacing="0" width="100%">
                                                        <tbody><tr>
                                                                <td align="left">தந்தை பெயர் <span class="star">*</span></td>
                                                                <td align="right"><input name="fname" id="fname" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">தந்தை வேலை</td>
                                                                <td align="right"><input name="fjob" id="fjob" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">உடன்பிறப்பு
                                                                    (இவரையும் சேர்த்து) </td>
                                                                <td align="right"><input name="brosis" id="brosis" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">பூர்வீகம்</td>
                                                                <td align="right"><input name="poorvigam" id="poorvigam" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">சொத்துக்கள்</td>
                                                                <td align="right"><input name="asset" id="asset" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                        </tbody></table></td>
                                                <td width="2%">&nbsp;</td>
                                                <td width="49%"><table border="0" cellpadding="5" cellspacing="0" width="100%">
                                                        <tbody><tr>
                                                                <td align="left">தாயார் பெயர் <span class="star">*</span></td>
                                                                <td align="right"><input name="mname" id="mname" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">தாயார் வேலை</td>
                                                                <td align="right"><input name="mjob" id="mjob" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">திருமணமானவர்</td>
                                                                <td align="right"><input name="mbrosis" id="mbrosis" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">இருப்பிடம்</td>
                                                                <td align="right"><input name="place" id="place" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">சீர்வரிசை</td>
                                                                <td align="right"><input name="cheer" id="cheer" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                        </tbody></table></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="regtitle" align="left">Horoscope Details</td>
                                            </tr>
                                            <tr>
                                                <td width="49%"><table border="0" cellpadding="5" cellspacing="0" width="100%">
                                                        <tbody><tr>
                                                                <td align="left">நட்சத்திரம்</td>
                                                                <td align="right">
                                                                    <select class="regfrm-select" name="star" id="star">
                                                                        <option selected="selected" value="">தெரிவு செய்க </option>
                                                                        <option value="அசுவினி">அசுவினி</option>
                                                                        <option value="பரணி">பரணி</option>
                                                                        <option value="கார்த்திகை">கார்த்திகை</option>
                                                                        <option value="ரோகிணி">ரோகிணி</option>
                                                                        <option value="மிருகசீரிடம்">மிருகசீரிடம்</option>
                                                                        <option value="திருவாதிரை">திருவாதிரை</option>
                                                                        <option value="புனர்பூசம்">புனர்பூசம்</option>
                                                                        <option value="பூசம்">பூசம்</option>
                                                                        <option value="ஆயில்யம்">ஆயில்யம்</option>
                                                                        <option value="மகம்">மகம்</option>
                                                                        <option value="பூரம்">பூரம்</option>
                                                                        <option value="உத்திரம்">உத்திரம்</option>
                                                                        <option value="அஸ்தம்">அஸ்தம்</option>
                                                                        <option value="சித்திரை">சித்திரை</option>
                                                                        <option value="சுவாதி">சுவாதி</option>
                                                                        <option value="விசாகம்">விசாகம்</option>
                                                                        <option value="அனுஷம்">அனுஷம்</option>
                                                                        <option value="கேட்டை">கேட்டை</option>
                                                                        <option value="மூலம்">மூலம்</option>
                                                                        <option value="பூராடம்">பூராடம்</option>
                                                                        <option value="உத்திராடம்">உத்திராடம்</option>
                                                                        <option value="திருவோணம்">திருவோணம்</option>
                                                                        <option value="அவிட்டம்">அவிட்டம்</option>
                                                                        <option value="சதயம்">சதயம்</option>
                                                                        <option value="பூரட்டாதி">பூரட்டாதி</option>
                                                                        <option value="உத்திரட்டாதி">உத்திரட்டாதி</option>
                                                                        <option value="ரேவதி">ரேவதி</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">ராசி</td>
                                                                <td align="right">
                                                                    <select class="regfrm-select" name="raasi" id="raasi">
                                                                        <option selected="selected" value="">தெரிவு செய்க </option>
                                                                        <option value="மேஷம்">மேஷம்</option>
                                                                        <option value="ரிஷபம்">ரிஷபம்</option>
                                                                        <option value="மிதுனம்">மிதுனம்</option>
                                                                        <option value="கடகம்">கடகம்</option>
                                                                        <option value="சிம்மம்">சிம்மம்</option>
                                                                        <option value="கன்னி">கன்னி</option>
                                                                        <option value="துலாம்">துலாம்</option>
                                                                        <option value="விருச்சிகம்">விருச்சிகம்</option>
                                                                        <option value="தனுசு">தனுசு</option>
                                                                        <option value="மகரம்">மகரம்</option>
                                                                        <option value="கும்பம்">கும்பம்</option>
                                                                        <option value="மீனம்">மீனம்</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">லக்னம்</td>
                                                                <td align="right">
                                                                    <select class="regfrm-select" name="laknam" id="laknam">
                                                                        <option selected="selected" value="">தெரிவு செய்க </option>
                                                                        <option value="மேஷம்">மேஷம்</option>
                                                                        <option value="ரிஷபம்">ரிஷபம்</option>
                                                                        <option value="மிதுனம்">மிதுனம்</option>
                                                                        <option value="கடகம்">கடகம்</option>
                                                                        <option value="சிம்மம்">சிம்மம்</option>
                                                                        <option value="கன்னி">கன்னி</option>
                                                                        <option value="துலாம்">துலாம்</option>
                                                                        <option value="விருச்சிகம்">விருச்சிகம்</option>
                                                                        <option value="தனுசு">தனுசு</option>
                                                                        <option value="மகரம்">மகரம்</option>
                                                                        <option value="கும்பம்">கும்பம்</option>
                                                                        <option value="மீனம்">மீனம்</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </tbody></table></td>
                                                <td width="2%">&nbsp;</td>
                                                <td valign="top" width="49%"><table border="0" cellpadding="5" cellspacing="0" width="100%">
                                                        <tbody><tr>
                                                                <td align="left">திசை இருப்பு</td>
                                                                <td align="right"><select class="regfrm-select" name="disha" id="disha">
                                                                        <option selected="selected" value="">தெரிவு செய்க </option>
                                                                        <option value="சூரிய மகா திசை">சூரிய மகா திசை</option>
                                                                        <option value="சந்திர மகா திசை">சந்திர மகா திசை</option>
                                                                        <option value="செவ்வாய் மகா திசை">செவ்வாய் மகா திசை</option>
                                                                        <option value="ராகு மகா திசை">ராகு மகா திசை</option>
                                                                        <option value="வியாழ மகா திசை">வியாழ மகா திசை</option>
                                                                        <option value="சனி மகா திசை">சனி மகா திசை</option>
                                                                        <option value="புதன் மகா திசை">புதன் மகா திசை</option>
                                                                        <option value="கேது மகா திசை">கேது மகா திசை</option>
                                                                        <option value="சுக்கிர மகா திசை">சுக்கிர மகா திசை</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" align="center"><table border="0" cellpadding="5" cellspacing="0">
                                                                        <tbody><tr>
                                                                                <td><input name="dyear" id="dyear" placeholder="வருடம்" class="frm-txt" style="width:60px;" type="text"></td>
                                                                                <td><input name="dmonth" id="dmonth" placeholder="மாதம்" class="frm-txt" style="width:60px;" type="text"></td>
                                                                                <td><input name="dday" id="dday" placeholder="நாள்" class="frm-txt" style="width:60px;" type="text"></td>
                                                                            </tr>
                                                                        </tbody></table></td>
                                                            </tr>
                                                        </tbody></table></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody><tr>
                                                                <td width="45%"><table class="horobdr" border="0" cellpadding="5" cellspacing="0">
                                                                        <tbody><tr>
                                                                                <td class="horobdr" align="center" height="63" width="63">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr1rpu">
                                                                                                                <td><input name="1rpu" id="1rpu" value="pu" onclick="return uncheck('rpu', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr1rsun">
                                                                                                                <td><input name="1rsun" id="1rsun" value="sun" onclick="return uncheck('rsun', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr1rragu">
                                                                                                                <td><input name="1rragu" id="1rragu" value="ragu" onclick="return uncheck('rragu', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr1rvij">
                                                                                                                <td><input name="1rvij" id="1rvij" value="vij" onclick="return uncheck('rvij', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr1rchk">
                                                                                                                <td><input name="1rchk" id="1rchk" value="chk" onclick="return uncheck('rchk', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr1rsat">
                                                                                                                <td><input name="1rsat" id="1rsat" value="sat" onclick="return uncheck('rsat', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr1rchan">
                                                                                                                <td><input name="1rchan" id="1rchan" value="chan" onclick="return uncheck('rchan', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr1rkee">
                                                                                                                <td><input name="1rkee" id="1rkee" value="kee" onclick="return uncheck('rkee', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr1rsev">
                                                                                                                <td><input name="1rsev" id="1rsev" value="sev" onclick="return uncheck('rsev', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr1rlac">
                                                                                                                <td><input name="1rlac" id="1rlac" value="lac" onclick="return uncheck('rlac', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                                <td class="horobdr" align="center" height="63" width="63">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr2rpu">
                                                                                                                <td><input name="2rpu" id="2rpu" value="pu" onclick="return uncheck('rpu', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr2rsun">
                                                                                                                <td><input name="2rsun" id="2rsun" value="sun" onclick="return uncheck('rsun', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr2rragu">
                                                                                                                <td><input name="2rragu" id="2rragu" value="ragu" onclick="return uncheck('rragu', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr2rvij">
                                                                                                                <td><input name="2rvij" id="2rvij" value="vij" onclick="return uncheck('rvij', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr2rchk">
                                                                                                                <td><input name="2rchk" id="2rchk" value="chk" onclick="return uncheck('rchk', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr2rsat">
                                                                                                                <td><input name="2rsat" id="2rsat" value="sat" onclick="return uncheck('rsat', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr2rchan">
                                                                                                                <td><input name="2rchan" id="2rchan" value="chan" onclick="return uncheck('rchan', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr2rkee">
                                                                                                                <td><input name="2rkee" id="2rkee" value="kee" onclick="return uncheck('rkee', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr2rsev">
                                                                                                                <td><input name="2rsev" id="2rsev" value="sev" onclick="return uncheck('rsev', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr2rlac">
                                                                                                                <td><input name="2rlac" id="2rlac" value="lac" onclick="return uncheck('rlac', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                                <td class="horobdr" align="center" height="63" width="64">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr3rpu">
                                                                                                                <td><input name="3rpu" id="3rpu" value="pu" onclick="return uncheck('rpu', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr3rsun">
                                                                                                                <td><input name="3rsun" id="3rsun" value="sun" onclick="return uncheck('rsun', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr3rragu">
                                                                                                                <td><input name="3rragu" id="3rragu" value="ragu" onclick="return uncheck('rragu', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr3rvij">
                                                                                                                <td><input name="3rvij" id="3rvij" value="vij" onclick="return uncheck('rvij', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr3rchk">
                                                                                                                <td><input name="3rchk" id="3rchk" value="chk" onclick="return uncheck('rchk', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr3rsat">
                                                                                                                <td><input name="3rsat" id="3rsat" value="sat" onclick="return uncheck('rsat', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr3rchan">
                                                                                                                <td><input name="3rchan" id="3rchan" value="chan" onclick="return uncheck('rchan', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr3rkee">
                                                                                                                <td><input name="3rkee" id="3rkee" value="kee" onclick="return uncheck('rkee', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr3rsev">
                                                                                                                <td><input name="3rsev" id="3rsev" value="sev" onclick="return uncheck('rsev', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr3rlac">
                                                                                                                <td><input name="3rlac" id="3rlac" value="lac" onclick="return uncheck('rlac', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                                <td class="horobdr" align="center" height="63" width="64">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr4rpu">
                                                                                                                <td><input name="4rpu" id="4rpu" value="pu" onclick="return uncheck('rpu', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr4rsun">
                                                                                                                <td><input name="4rsun" id="4rsun" value="sun" onclick="return uncheck('rsun', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr4rragu">
                                                                                                                <td><input name="4rragu" id="4rragu" value="ragu" onclick="return uncheck('rragu', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr4rvij">
                                                                                                                <td><input name="4rvij" id="4rvij" value="vij" onclick="return uncheck('rvij', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr4rchk">
                                                                                                                <td><input name="4rchk" id="4rchk" value="chk" onclick="return uncheck('rchk', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr4rsat">
                                                                                                                <td><input name="4rsat" id="4rsat" value="sat" onclick="return uncheck('rsat', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr4rchan">
                                                                                                                <td><input name="4rchan" id="4rchan" value="chan" onclick="return uncheck('rchan', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr4rkee">
                                                                                                                <td><input name="4rkee" id="4rkee" value="kee" onclick="return uncheck('rkee', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr4rsev">
                                                                                                                <td><input name="4rsev" id="4rsev" value="sev" onclick="return uncheck('rsev', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr4rlac">
                                                                                                                <td><input name="4rlac" id="4rlac" value="lac" onclick="return uncheck('rlac', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="horobdr" align="center" height="64" width="63">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr12rpu">
                                                                                                                <td><input name="12rpu" id="12rpu" value="pu" onclick="return uncheck('rpu', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr12rsun">
                                                                                                                <td><input name="12rsun" id="12rsun" value="sun" onclick="return uncheck('rsun', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr12rragu">
                                                                                                                <td><input name="12rragu" id="12rragu" value="ragu" onclick="return uncheck('rragu', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr12rvij">
                                                                                                                <td><input name="12rvij" id="12rvij" value="vij" onclick="return uncheck('rvij', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr12rchk">
                                                                                                                <td><input name="12rchk" id="12rchk" value="chk" onclick="return uncheck('rchk', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr12rsat">
                                                                                                                <td><input name="12rsat" id="12rsat" value="sat" onclick="return uncheck('rsat', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr12rchan">
                                                                                                                <td><input name="12rchan" id="12rchan" value="chan" onclick="return uncheck('rchan', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr12rkee">
                                                                                                                <td><input name="12rkee" id="12rkee" value="kee" onclick="return uncheck('rkee', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr12rsev">
                                                                                                                <td><input name="12rsev" id="12rsev" value="sev" onclick="return uncheck('rsev', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr12rlac">
                                                                                                                <td><input name="12rlac" id="12rlac" value="lac" onclick="return uncheck('rlac', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                                <td colspan="2" rowspan="2" class="horobdr" align="center" height="118"><p align="center"><b><span lang="ta">Raasi</span></b></p></td>
                                                                                <td class="horobdr" align="center" height="64" width="64">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr5rpu">
                                                                                                                <td><input name="5rpu" id="5rpu" value="pu" onclick="return uncheck('rpu', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr5rsun">
                                                                                                                <td><input name="5rsun" id="5rsun" value="sun" onclick="return uncheck('rsun', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr5rragu">
                                                                                                                <td><input name="5rragu" id="5rragu" value="ragu" onclick="return uncheck('rragu', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr5rvij">
                                                                                                                <td><input name="5rvij" id="5rvij" value="vij" onclick="return uncheck('rvij', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr5rchk">
                                                                                                                <td><input name="5rchk" id="5rchk" value="chk" onclick="return uncheck('rchk', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr5rsat">
                                                                                                                <td><input name="5rsat" id="5rsat" value="sat" onclick="return uncheck('rsat', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr5rchan">
                                                                                                                <td><input name="5rchan" id="5rchan" value="chan" onclick="return uncheck('rchan', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr5rkee">
                                                                                                                <td><input name="5rkee" id="5rkee" value="kee" onclick="return uncheck('rkee', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr5rsev">
                                                                                                                <td><input name="5rsev" id="5rsev" value="sev" onclick="return uncheck('rsev', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr5rlac">
                                                                                                                <td><input name="5rlac" id="5rlac" value="lac" onclick="return uncheck('rlac', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="horobdr" align="center" height="64" width="63">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr11rpu">
                                                                                                                <td><input name="11rpu" id="11rpu" value="pu" onclick="return uncheck('rpu', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr11rsun">
                                                                                                                <td><input name="11rsun" id="11rsun" value="sun" onclick="return uncheck('rsun', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr11rragu">
                                                                                                                <td><input name="11rragu" id="11rragu" value="ragu" onclick="return uncheck('rragu', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr11rvij">
                                                                                                                <td><input name="11rvij" id="11rvij" value="vij" onclick="return uncheck('rvij', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr11rchk">
                                                                                                                <td><input name="11rchk" id="11rchk" value="chk" onclick="return uncheck('rchk', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr11rsat">
                                                                                                                <td><input name="11rsat" id="11rsat" value="sat" onclick="return uncheck('rsat', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr11rchan">
                                                                                                                <td><input name="11rchan" id="11rchan" value="chan" onclick="return uncheck('rchan', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr11rkee">
                                                                                                                <td><input name="11rkee" id="11rkee" value="kee" onclick="return uncheck('rkee', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr11rsev">
                                                                                                                <td><input name="11rsev" id="11rsev" value="sev" onclick="return uncheck('rsev', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr11rlac">
                                                                                                                <td><input name="11rlac" id="11rlac" value="lac" onclick="return uncheck('rlac', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                                <td class="horobdr" align="center" height="64" width="64">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr6rpu">
                                                                                                                <td><input name="6rpu" id="6rpu" value="pu" onclick="return uncheck('rpu', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr6rsun">
                                                                                                                <td><input name="6rsun" id="6rsun" value="sun" onclick="return uncheck('rsun', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr6rragu">
                                                                                                                <td><input name="6rragu" id="6rragu" value="ragu" onclick="return uncheck('rragu', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr6rvij">
                                                                                                                <td><input name="6rvij" id="6rvij" value="vij" onclick="return uncheck('rvij', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr6rchk">
                                                                                                                <td><input name="6rchk" id="6rchk" value="chk" onclick="return uncheck('rchk', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr6rsat">
                                                                                                                <td><input name="6rsat" id="6rsat" value="sat" onclick="return uncheck('rsat', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr6rchan">
                                                                                                                <td><input name="6rchan" id="6rchan" value="chan" onclick="return uncheck('rchan', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr6rkee">
                                                                                                                <td><input name="6rkee" id="6rkee" value="kee" onclick="return uncheck('rkee', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr6rsev">
                                                                                                                <td><input name="6rsev" id="6rsev" value="sev" onclick="return uncheck('rsev', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr6rlac">
                                                                                                                <td><input name="6rlac" id="6rlac" value="lac" onclick="return uncheck('rlac', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="horobdr" align="center" height="64" width="63">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr10rpu">
                                                                                                                <td><input name="10rpu" id="10rpu" value="pu" onclick="return uncheck('rpu', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr10rsun">
                                                                                                                <td><input name="10rsun" id="10rsun" value="sun" onclick="return uncheck('rsun', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr10rragu">
                                                                                                                <td><input name="10rragu" id="10rragu" value="ragu" onclick="return uncheck('rragu', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr10rvij">
                                                                                                                <td><input name="10rvij" id="10rvij" value="vij" onclick="return uncheck('rvij', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr10rchk">
                                                                                                                <td><input name="10rchk" id="10rchk" value="chk" onclick="return uncheck('rchk', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr10rsat">
                                                                                                                <td><input name="10rsat" id="10rsat" value="sat" onclick="return uncheck('rsat', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr10rchan">
                                                                                                                <td><input name="10rchan" id="10rchan" value="chan" onclick="return uncheck('rchan', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr10rkee">
                                                                                                                <td><input name="10rkee" id="10rkee" value="kee" onclick="return uncheck('rkee', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr10rsev">
                                                                                                                <td><input name="10rsev" id="10rsev" value="sev" onclick="return uncheck('rsev', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr10rlac">
                                                                                                                <td><input name="10rlac" id="10rlac" value="lac" onclick="return uncheck('rlac', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                                <td class="horobdr" align="center" height="64" width="63">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr9rpu">
                                                                                                                <td><input name="9rpu" id="9rpu" value="pu" onclick="return uncheck('rpu', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr9rsun">
                                                                                                                <td><input name="9rsun" id="9rsun" value="sun" onclick="return uncheck('rsun', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr9rragu">
                                                                                                                <td><input name="9rragu" id="9rragu" value="ragu" onclick="return uncheck('rragu', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr9rvij">
                                                                                                                <td><input name="9rvij" id="9rvij" value="vij" onclick="return uncheck('rvij', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr9rchk">
                                                                                                                <td><input name="9rchk" id="9rchk" value="chk" onclick="return uncheck('rchk', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr9rsat">
                                                                                                                <td><input name="9rsat" id="9rsat" value="sat" onclick="return uncheck('rsat', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr9rchan">
                                                                                                                <td><input name="9rchan" id="9rchan" value="chan" onclick="return uncheck('rchan', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr9rkee">
                                                                                                                <td><input name="9rkee" id="9rkee" value="kee" onclick="return uncheck('rkee', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr9rsev">
                                                                                                                <td><input name="9rsev" id="9rsev" value="sev" onclick="return uncheck('rsev', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr9rlac">
                                                                                                                <td><input name="9rlac" id="9rlac" value="lac" onclick="return uncheck('rlac', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                                <td class="horobdr" align="center" height="64" width="64">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr8rpu">
                                                                                                                <td><input name="8rpu" id="8rpu" value="pu" onclick="return uncheck('rpu', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr8rsun">
                                                                                                                <td><input name="8rsun" id="8rsun" value="sun" onclick="return uncheck('rsun', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr8rragu">
                                                                                                                <td><input name="8rragu" id="8rragu" value="ragu" onclick="return uncheck('rragu', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr8rvij">
                                                                                                                <td><input name="8rvij" id="8rvij" value="vij" onclick="return uncheck('rvij', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr8rchk">
                                                                                                                <td><input name="8rchk" id="8rchk" value="chk" onclick="return uncheck('rchk', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr8rsat">
                                                                                                                <td><input name="8rsat" id="8rsat" value="sat" onclick="return uncheck('rsat', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr8rchan">
                                                                                                                <td><input name="8rchan" id="8rchan" value="chan" onclick="return uncheck('rchan', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr8rkee">
                                                                                                                <td><input name="8rkee" id="8rkee" value="kee" onclick="return uncheck('rkee', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr8rsev">
                                                                                                                <td><input name="8rsev" id="8rsev" value="sev" onclick="return uncheck('rsev', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr8rlac">
                                                                                                                <td><input name="8rlac" id="8rlac" value="lac" onclick="return uncheck('rlac', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                                <td class="horobdr" align="center" height="64" width="64">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr7rpu">
                                                                                                                <td><input name="7rpu" id="7rpu" value="pu" onclick="return uncheck('rpu', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr7rsun">
                                                                                                                <td><input name="7rsun" id="7rsun" value="sun" onclick="return uncheck('rsun', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr7rragu">
                                                                                                                <td><input name="7rragu" id="7rragu" value="ragu" onclick="return uncheck('rragu', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr7rvij">
                                                                                                                <td><input name="7rvij" id="7rvij" value="vij" onclick="return uncheck('rvij', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr7rchk">
                                                                                                                <td><input name="7rchk" id="7rchk" value="chk" onclick="return uncheck('rchk', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr7rsat">
                                                                                                                <td><input name="7rsat" id="7rsat" value="sat" onclick="return uncheck('rsat', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr7rchan">
                                                                                                                <td><input name="7rchan" id="7rchan" value="chan" onclick="return uncheck('rchan', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr7rkee">
                                                                                                                <td><input name="7rkee" id="7rkee" value="kee" onclick="return uncheck('rkee', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr7rsev">
                                                                                                                <td><input name="7rsev" id="7rsev" value="sev" onclick="return uncheck('rsev', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr7rlac">
                                                                                                                <td><input name="7rlac" id="7rlac" value="lac" onclick="return uncheck('rlac', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody></table></td>
                                                                <td width="10%">&nbsp;</td>
                                                                <td width="45%"><table class="horobdr" border="0" cellpadding="5" cellspacing="0">
                                                                        <tbody><tr>
                                                                                <td class="horobdr" align="center" height="63" width="63">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr1apu">
                                                                                                                <td><input name="1apu" id="1apu" value="pu" onclick="return uncheck('apu', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr1asun">
                                                                                                                <td><input name="1asun" id="1asun" value="sun" onclick="return uncheck('asun', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr1aragu">
                                                                                                                <td><input name="1aragu" id="1aragu" value="ragu" onclick="return uncheck('aragu', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr1avij">
                                                                                                                <td><input name="1avij" id="1avij" value="vij" onclick="return uncheck('avij', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr1achk">
                                                                                                                <td><input name="1achk" id="1achk" value="chk" onclick="return uncheck('achk', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr1asat">
                                                                                                                <td><input name="1asat" id="1asat" value="sat" onclick="return uncheck('asat', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr1achan">
                                                                                                                <td><input name="1achan" id="1achan" value="chan" onclick="return uncheck('achan', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr1akee">
                                                                                                                <td><input name="1akee" id="1akee" value="kee" onclick="return uncheck('akee', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr1asev">
                                                                                                                <td><input name="1asev" id="1asev" value="sev" onclick="return uncheck('asev', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr1alac">
                                                                                                                <td><input name="1alac" id="1alac" value="lac" onclick="return uncheck('alac', '1')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                                <td class="horobdr" align="center" height="63" width="63">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr2apu">
                                                                                                                <td><input name="2apu" id="2apu" value="pu" onclick="return uncheck('apu', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr2asun">
                                                                                                                <td><input name="2asun" id="2asun" value="sun" onclick="return uncheck('asun', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr2aragu">
                                                                                                                <td><input name="2aragu" id="2aragu" value="ragu" onclick="return uncheck('aragu', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr2avij">
                                                                                                                <td><input name="2avij" id="2avij" value="vij" onclick="return uncheck('avij', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr2achk">
                                                                                                                <td><input name="2achk" id="2achk" value="chk" onclick="return uncheck('achk', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr2asat">
                                                                                                                <td><input name="2asat" id="2asat" value="sat" onclick="return uncheck('asat', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr2achan">
                                                                                                                <td><input name="2achan" id="2achan" value="chan" onclick="return uncheck('achan', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr2akee">
                                                                                                                <td><input name="2akee" id="2akee" value="kee" onclick="return uncheck('akee', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr2asev">
                                                                                                                <td><input name="2asev" id="2asev" value="sev" onclick="return uncheck('asev', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr2alac">
                                                                                                                <td><input name="2alac" id="2alac" value="lac" onclick="return uncheck('alac', '2')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                                <td class="horobdr" align="center" height="63" width="64">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr3apu">
                                                                                                                <td><input name="3apu" id="3apu" value="pu" onclick="return uncheck('apu', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr3asun">
                                                                                                                <td><input name="3asun" id="3asun" value="sun" onclick="return uncheck('asun', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr3aragu">
                                                                                                                <td><input name="3aragu" id="3aragu" value="ragu" onclick="return uncheck('aragu', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr3avij">
                                                                                                                <td><input name="3avij" id="3avij" value="vij" onclick="return uncheck('avij', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr3achk">
                                                                                                                <td><input name="3achk" id="3achk" value="chk" onclick="return uncheck('achk', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr3asat">
                                                                                                                <td><input name="3asat" id="3asat" value="sat" onclick="return uncheck('asat', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr3achan">
                                                                                                                <td><input name="3achan" id="3achan" value="chan" onclick="return uncheck('achan', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr3akee">
                                                                                                                <td><input name="3akee" id="3akee" value="kee" onclick="return uncheck('akee', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr3asev">
                                                                                                                <td><input name="3asev" id="3asev" value="sev" onclick="return uncheck('asev', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr3alac">
                                                                                                                <td><input name="3alac" id="3alac" value="lac" onclick="return uncheck('alac', '3')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                                <td class="horobdr" align="center" height="63" width="64">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr4apu">
                                                                                                                <td><input name="4apu" id="4apu" value="pu" onclick="return uncheck('apu', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr4asun">
                                                                                                                <td><input name="4asun" id="4asun" value="sun" onclick="return uncheck('asun', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr4aragu">
                                                                                                                <td><input name="4aragu" id="4aragu" value="ragu" onclick="return uncheck('aragu', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr4avij">
                                                                                                                <td><input name="4avij" id="4avij" value="vij" onclick="return uncheck('avij', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr4achk">
                                                                                                                <td><input name="4achk" id="4achk" value="chk" onclick="return uncheck('achk', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr4asat">
                                                                                                                <td><input name="4asat" id="4asat" value="sat" onclick="return uncheck('asat', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr4achan">
                                                                                                                <td><input name="4achan" id="4achan" value="chan" onclick="return uncheck('achan', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr4akee">
                                                                                                                <td><input name="4akee" id="4akee" value="kee" onclick="return uncheck('akee', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr4asev">
                                                                                                                <td><input name="4asev" id="4asev" value="sev" onclick="return uncheck('asev', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr4alac">
                                                                                                                <td><input name="4alac" id="4alac" value="lac" onclick="return uncheck('alac', '4')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="horobdr" align="center" height="64" width="63">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr12apu">
                                                                                                                <td><input name="12apu" id="12apu" value="pu" onclick="return uncheck('apu', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr12asun">
                                                                                                                <td><input name="12asun" id="12asun" value="sun" onclick="return uncheck('asun', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr12aragu">
                                                                                                                <td><input name="12aragu" id="12aragu" value="ragu" onclick="return uncheck('aragu', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr12avij">
                                                                                                                <td><input name="12avij" id="12avij" value="vij" onclick="return uncheck('avij', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr12achk">
                                                                                                                <td><input name="12achk" id="12achk" value="chk" onclick="return uncheck('achk', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr12asat">
                                                                                                                <td><input name="12asat" id="12asat" value="sat" onclick="return uncheck('asat', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr12achan">
                                                                                                                <td><input name="12achan" id="12achan" value="chan" onclick="return uncheck('achan', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr12akee">
                                                                                                                <td><input name="12akee" id="12akee" value="kee" onclick="return uncheck('akee', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr12asev">
                                                                                                                <td><input name="12asev" id="12asev" value="sev" onclick="return uncheck('asev', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr12alac">
                                                                                                                <td><input name="12alac" id="12alac" value="lac" onclick="return uncheck('alac', '12')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                                <td colspan="2" rowspan="2" class="horobdr" align="center" height="118"><p align="center"><b><span lang="ta">Amsam</span></b></p></td>
                                                                                <td class="horobdr" align="center" height="64" width="64">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr5apu">
                                                                                                                <td><input name="5apu" id="5apu" value="pu" onclick="return uncheck('apu', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr5asun">
                                                                                                                <td><input name="5asun" id="5asun" value="sun" onclick="return uncheck('asun', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr5aragu">
                                                                                                                <td><input name="5aragu" id="5aragu" value="ragu" onclick="return uncheck('aragu', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr5avij">
                                                                                                                <td><input name="5avij" id="5avij" value="vij" onclick="return uncheck('avij', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr5achk">
                                                                                                                <td><input name="5achk" id="5achk" value="chk" onclick="return uncheck('achk', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr5asat">
                                                                                                                <td><input name="5asat" id="5asat" value="sat" onclick="return uncheck('asat', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr5achan">
                                                                                                                <td><input name="5achan" id="5achan" value="chan" onclick="return uncheck('achan', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr5akee">
                                                                                                                <td><input name="5akee" id="5akee" value="kee" onclick="return uncheck('akee', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr5asev">
                                                                                                                <td><input name="5asev" id="5asev" value="sev" onclick="return uncheck('asev', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr5alac">
                                                                                                                <td><input name="5alac" id="5alac" value="lac" onclick="return uncheck('alac', '5')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="horobdr" align="center" height="64" width="63">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr11apu">
                                                                                                                <td><input name="11apu" id="11apu" value="pu" onclick="return uncheck('apu', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr11asun">
                                                                                                                <td><input name="11asun" id="11asun" value="sun" onclick="return uncheck('asun', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr11aragu">
                                                                                                                <td><input name="11aragu" id="11aragu" value="ragu" onclick="return uncheck('aragu', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr11avij">
                                                                                                                <td><input name="11avij" id="11avij" value="vij" onclick="return uncheck('avij', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr11achk">
                                                                                                                <td><input name="11achk" id="11achk" value="chk" onclick="return uncheck('achk', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr11asat">
                                                                                                                <td><input name="11asat" id="11asat" value="sat" onclick="return uncheck('asat', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr11achan">
                                                                                                                <td><input name="11achan" id="11achan" value="chan" onclick="return uncheck('achan', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr11akee">
                                                                                                                <td><input name="11akee" id="11akee" value="kee" onclick="return uncheck('akee', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr11asev">
                                                                                                                <td><input name="11asev" id="11asev" value="sev" onclick="return uncheck('asev', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr11alac">
                                                                                                                <td><input name="11alac" id="11alac" value="lac" onclick="return uncheck('alac', '11')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                                <td class="horobdr" align="center" height="64" width="64">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr6apu">
                                                                                                                <td><input name="6apu" id="6apu" value="pu" onclick="return uncheck('apu', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr6asun">
                                                                                                                <td><input name="6asun" id="6asun" value="sun" onclick="return uncheck('asun', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr6aragu">
                                                                                                                <td><input name="6aragu" id="6aragu" value="ragu" onclick="return uncheck('aragu', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr6avij">
                                                                                                                <td><input name="6avij" id="6avij" value="vij" onclick="return uncheck('avij', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr6achk">
                                                                                                                <td><input name="6achk" id="6achk" value="chk" onclick="return uncheck('achk', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr6asat">
                                                                                                                <td><input name="6asat" id="6asat" value="sat" onclick="return uncheck('asat', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr6achan">
                                                                                                                <td><input name="6achan" id="6achan" value="chan" onclick="return uncheck('achan', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr6akee">
                                                                                                                <td><input name="6akee" id="6akee" value="kee" onclick="return uncheck('akee', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr6asev">
                                                                                                                <td><input name="6asev" id="6asev" value="sev" onclick="return uncheck('asev', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr6alac">
                                                                                                                <td><input name="6alac" id="6alac" value="lac" onclick="return uncheck('alac', '6')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="horobdr" align="center" height="64" width="63">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr10apu">
                                                                                                                <td><input name="10apu" id="10apu" value="pu" onclick="return uncheck('apu', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr10asun">
                                                                                                                <td><input name="10asun" id="10asun" value="sun" onclick="return uncheck('asun', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr10aragu">
                                                                                                                <td><input name="10aragu" id="10aragu" value="ragu" onclick="return uncheck('aragu', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr10avij">
                                                                                                                <td><input name="10avij" id="10avij" value="vij" onclick="return uncheck('avij', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr10achk">
                                                                                                                <td><input name="10achk" id="10achk" value="chk" onclick="return uncheck('achk', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr10asat">
                                                                                                                <td><input name="10asat" id="10asat" value="sat" onclick="return uncheck('asat', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr10achan">
                                                                                                                <td><input name="10achan" id="10achan" value="chan" onclick="return uncheck('achan', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr10akee">
                                                                                                                <td><input name="10akee" id="10akee" value="kee" onclick="return uncheck('akee', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr10asev">
                                                                                                                <td><input name="10asev" id="10asev" value="sev" onclick="return uncheck('asev', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr10alac">
                                                                                                                <td><input name="10alac" id="10alac" value="lac" onclick="return uncheck('alac', '10')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                                <td class="horobdr" align="center" height="64" width="63">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr9apu">
                                                                                                                <td><input name="9apu" id="9apu" value="pu" onclick="return uncheck('apu', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr9asun">
                                                                                                                <td><input name="9asun" id="9asun" value="sun" onclick="return uncheck('asun', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr9aragu">
                                                                                                                <td><input name="9aragu" id="9aragu" value="ragu" onclick="return uncheck('aragu', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr9avij">
                                                                                                                <td><input name="9avij" id="9avij" value="vij" onclick="return uncheck('avij', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr9achk">
                                                                                                                <td><input name="9achk" id="9achk" value="chk" onclick="return uncheck('achk', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr9asat">
                                                                                                                <td><input name="9asat" id="9asat" value="sat" onclick="return uncheck('asat', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr9achan">
                                                                                                                <td><input name="9achan" id="9achan" value="chan" onclick="return uncheck('achan', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr9akee">
                                                                                                                <td><input name="9akee" id="9akee" value="kee" onclick="return uncheck('akee', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr9asev">
                                                                                                                <td><input name="9asev" id="9asev" value="sev" onclick="return uncheck('asev', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr9alac">
                                                                                                                <td><input name="9alac" id="9alac" value="lac" onclick="return uncheck('alac', '9')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                                <td class="horobdr" align="center" height="64" width="64">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr8apu">
                                                                                                                <td><input name="8apu" id="8apu" value="pu" onclick="return uncheck('apu', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr8asun">
                                                                                                                <td><input name="8asun" id="8asun" value="sun" onclick="return uncheck('asun', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr8aragu">
                                                                                                                <td><input name="8aragu" id="8aragu" value="ragu" onclick="return uncheck('aragu', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr8avij">
                                                                                                                <td><input name="8avij" id="8avij" value="vij" onclick="return uncheck('avij', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr8achk">
                                                                                                                <td><input name="8achk" id="8achk" value="chk" onclick="return uncheck('achk', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr8asat">
                                                                                                                <td><input name="8asat" id="8asat" value="sat" onclick="return uncheck('asat', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr8achan">
                                                                                                                <td><input name="8achan" id="8achan" value="chan" onclick="return uncheck('achan', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr8akee">
                                                                                                                <td><input name="8akee" id="8akee" value="kee" onclick="return uncheck('akee', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr8asev">
                                                                                                                <td><input name="8asev" id="8asev" value="sev" onclick="return uncheck('asev', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr8alac">
                                                                                                                <td><input name="8alac" id="8alac" value="lac" onclick="return uncheck('alac', '8')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                                <td class="horobdr" align="center" height="64" width="64">
                                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody><tr>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr7apu">
                                                                                                                <td><input name="7apu" id="7apu" value="pu" onclick="return uncheck('apu', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>பு</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr7asun">
                                                                                                                <td><input name="7asun" id="7asun" value="sun" onclick="return uncheck('asun', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சூ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr7aragu">
                                                                                                                <td><input name="7aragu" id="7aragu" value="ragu" onclick="return uncheck('aragu', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ரா</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr7avij">
                                                                                                                <td><input name="7avij" id="7avij" value="vij" onclick="return uncheck('avij', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>வி</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr7achk">
                                                                                                                <td><input name="7achk" id="7achk" value="chk" onclick="return uncheck('achk', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சு</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                                                                                        <tbody><tr id="tr7asat">
                                                                                                                <td><input name="7asat" id="7asat" value="sat" onclick="return uncheck('asat', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ச</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr7achan">
                                                                                                                <td><input name="7achan" id="7achan" value="chan" onclick="return uncheck('achan', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>சந்</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr7akee">
                                                                                                                <td><input name="7akee" id="7akee" value="kee" onclick="return uncheck('akee', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>கே</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr7asev">
                                                                                                                <td><input name="7asev" id="7asev" value="sev" onclick="return uncheck('asev', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>செ</td>
                                                                                                            </tr>
                                                                                                            <tr id="tr7alac">
                                                                                                                <td><input name="7alac" id="7alac" value="lac" onclick="return uncheck('alac', '7')" type="checkbox">
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td>ல</td>
                                                                                                            </tr>
                                                                                                        </tbody></table></td>
                                                                                            </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody></table></td>
                                                            </tr>
                                                        </tbody></table></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="regtitle" align="left">Contact Details</td>
                                            </tr>
                                            <tr>
                                                <td valign="top" width="49%"><table border="0" cellpadding="5" cellspacing="0" width="100%">
                                                        <tbody><tr>
                                                                <td align="left">தொலைபேசி எண் 1 <span class="star">*</span></td>
                                                                <td align="right"><input name="phone1" id="phone1" class="frm-txt frm-wd" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">தொலைபேசி எண் 2</td>
                                                                <td align="right"><input name="phone2" id="phone2" class="frm-txt frm-wd" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">இமெயில்</td>
                                                                <td align="right"><input name="email" id="email" class="frm-txt frm-wd" type="text"></td>
                                                            </tr>
                                                        </tbody></table></td>
                                                <td width="2%">&nbsp;</td>
                                                <td valign="top" width="49%"><table border="0" cellpadding="5" cellspacing="0" width="100%">
                                                        <tbody><tr>
                                                                <td align="left" valign="top">முகவரி <span class="star">*</span></td>
                                                                <td align="right">
                                                                    <textarea name="address" id="address" style="height:75px;" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)"></textarea>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">மாவட்டம் <span class="star">*</span></td>
                                                                <td align="right"><input name="district" id="district" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                
                                                        </tbody></table></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="regtitle" align="left">Other Information</td>
                                            </tr>
                                            <tr>
                                                <td valign="top" width="49%"><table border="0" cellpadding="5" cellspacing="0" width="100%">
                                                        <tbody><tr>
                                                                <td align="left">போட்டோ</td>
                                                                <td align="right"><input name="photo" id="photo" class="frm-txt frm-wd" type="file"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">ஜாதகம்</td>
                                                                <td align="right"><input name="horoscope" id="horoscope" class="frm-txt frm-wd" type="file"></td>
                                                            </tr>	
                                                        </tbody></table></td>
                                                <td width="2%">&nbsp;</td>
                                                <td valign="top" width="49%"><table border="0" cellpadding="5" cellspacing="0" width="100%">
                                                        <tbody><tr>
                                                                <td align="left" valign="top">எதிர் பார்ப்பு</td>
                                                                <td align="right">
                                                                    <input name="expetation" id="expetation" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">பதிந்தவர்</td>
                                                                <td align="right"><input name="createdby" id="createdby" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" type="text"></td>
                                                            </tr>
                                                        </tbody></table></td>
                                            </tr>
                                            <tr><td colspan="3">&nbsp;</td></tr>
                                            <tr>
                                                <td colspan="3"><table border="0" cellpadding="5" cellspacing="0" width="100%">
                                                        <tbody><tr><td align="left">
                                                                    <b>உங்களுக்கு பொருந்தக்குடிய நட்சத்திரங்களை இங்கே டிக் செய்க</b>
                                                                </td></tr></tbody></table>
                                                </td>
                                            </tr>	
                                            <tr><td>&nbsp;</td></tr>
                                            <tr><td colspan="3" align="center">
                                                    <table border="0" cellpadding="5" cellspacing="0" width="89%">
                                                        <tbody><tr><td style="border: solid 1px #ccc; padding:5px; background-color:#f5f5f5">
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="அசுவினி" type="checkbox">&nbsp; அசுவினி						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="பரணி" type="checkbox">&nbsp; பரணி						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="கார்த்திகை" type="checkbox">&nbsp; கார்த்திகை						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="ரோகிணி" type="checkbox">&nbsp; ரோகிணி						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="மிருகசீரிடம்" type="checkbox">&nbsp; மிருகசீரிடம்						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="திருவாதிரை" type="checkbox">&nbsp; திருவாதிரை						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="புனர்பூசம்" type="checkbox">&nbsp; புனர்பூசம்						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="பூசம்" type="checkbox">&nbsp; பூசம்						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="ஆயில்யம்" type="checkbox">&nbsp; ஆயில்யம்						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="மகம்" type="checkbox">&nbsp; மகம்						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="பூரம்" type="checkbox">&nbsp; பூரம்						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="உத்திரம்" type="checkbox">&nbsp; உத்திரம்						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="அஸ்தம்" type="checkbox">&nbsp; அஸ்தம்						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="சித்திரை" type="checkbox">&nbsp; சித்திரை						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="சுவாதி" type="checkbox">&nbsp; சுவாதி						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="விசாகம்" type="checkbox">&nbsp; விசாகம்						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="அனுஷம்" type="checkbox">&nbsp; அனுஷம்						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="கேட்டை" type="checkbox">&nbsp; கேட்டை						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="மூலம்" type="checkbox">&nbsp; மூலம்						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="பூராடம்" type="checkbox">&nbsp; பூராடம்						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="உத்திராடம்" type="checkbox">&nbsp; உத்திராடம்						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="திருவோணம்" type="checkbox">&nbsp; திருவோணம்						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="அவிட்டம்" type="checkbox">&nbsp; அவிட்டம்						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="சதயம்" type="checkbox">&nbsp; சதயம்						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="பூரட்டாதி" type="checkbox">&nbsp; பூரட்டாதி						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="உத்திரட்டாதி" type="checkbox">&nbsp; உத்திரட்டாதி						</div>
                                                                    <div style="float:left; width:120px;">
                                                                        <input name="matchstar[]" id="matchstar[]" value="ரேவதி" type="checkbox">&nbsp; ரேவதி						</div>
                                                                </td></tr></tbody></table>
                                                </td></tr>
                                            <tr><td colspan="3">&nbsp;</td></tr>
                                            <tr>
                                                <td colspan="3"><table border="0" cellpadding="5" cellspacing="0" width="100%"><tbody><tr><td>
                                                                    தகவல்<br>
                                                                    <textarea name="thagaval" id="thagaval" style="height:75px; width:99%" class="frm-txt frm-wd" onkeypress="javascript:convertThis(event)" onkeydown="toggleKBMode(event)" placeholder="வேறு ஏதேனும் முக்கிய தகவல்கள் இருந்தால் இங்கே பதிவு செய்க"></textarea></td></tr></tbody></table>
                                                </td>
                                            </tr>
                                            <tr><td colspan="3">&nbsp;</td></tr>
                                            <tr>
                                                <td colspan="3" align="center">
                                                    <input name="ids" value="" type="hidden">
                                                    <input value="Add" class="btn" onclick="return validate();" type="submit">
                                                </td>
                                            </tr>
                                        </tbody></table>
                                </form>-->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Member's
                    <strong>Testimonials</strong>
                </h2>
                <hr>
                <p><strong>*</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                <p><strong>*</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            </div>
        </div>
    </div>

</div>
<!-- /.container -->

<?php require 'footer.php'; ?>