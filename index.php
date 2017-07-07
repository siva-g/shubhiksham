<?php
require './front_connection.php';
/* * *********Above code default in all pages*********** */
require 'header.php';
?>
<style>
    .carousel-inner.onebyone-carosel { margin: auto; width: 90%; }
    .onebyone-carosel .active.left { left: -33.33%; }
    .onebyone-carosel .active.right { left: 33.33%; }
    .onebyone-carosel .next { left: 33.33%; }
    .onebyone-carosel .prev { left: -33.33%; }
</style>
<section id="featured" class="bg">
    <!-- start slider -->
    <div class="container">
        <?php $msg->display(); ?>
        <div class="row">
            <div class="col-lg-8">
                <!-- Slider -->
                <div id="main-slider" class="main-slider flexslider">
                    <ul class="slides">
                        <li>
                            <img src="images/back1.jpg" alt="" />
                        </li>
                        <li>
                            <img src="images/back2.jpg" alt="" />
                        </li>
                        <li>
                            <img src="images/back3.jpg" alt="" />
                        </li>
                        <li>
                            <img src="images/back4.jpg" alt="" />
                        </li>
                    </ul>
                </div>
                <!-- end slider -->
            </div>
            <div class="col-lg-4">
                <form class="form-horizontal" action="search.php" method="post" name="topsearch" id="topsearch" style="margin-top: 40px">
                    <fieldset class="well">
                        <h4>Quick Search</h4>
                        <div class="form-group row">
                            <label class="col-sm-4">Looking for</label>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio"> Bride
                                        <input class="form-check-input" type="radio"> Groom
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Age</label>
                            <div class="col-sm-8">
                                <select name="fromage" id="fromage" class="custom-select">
                                    <?php
                                    for ($i = 18; $i < 61; $i++) {
                                        $selected = $_SESSION['search']['fromage'] == $i ? 'selected="selected"' : '';
                                        echo '<option ' . $selected . ' value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                                to
                                <select name="toage" id="toage" class="custom-select">
                                    <?php
                                    for ($i = 18; $i < 61; $i++) {
                                        $selected = $_SESSION['search']['fromage'] == $i ? 'selected="selected"' : '';
                                        echo '<option ' . $selected . ' value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4">Religion</label>
                            <div class="col-sm-8">
                                <select name="religion" id="religion" onchange="load_options(this.value, 'castecode');"><option value="">Select religion</option><option value="1">Hindu</option><option value="2">Muslim</option><option value="3">Christian</option><option value="4">Sikh</option><option value="5">Jain</option><option value="6">Buddhist</option><option value="7">Atheist</option><option value="8">Bahai</option><option value="9">Jew</option><option value="10">Others</option></select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input class="btn btn-mini btn-theme" value="Search Profiles" type="submit">
                            </div>
                        </div>
                        <a href="#" class="pull-right">Profile Search</a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="callaction">
    <div class="container">
        <h2 class="text-center">Welcome to Shubiksham Matrimony</h2>
        <div class="row">
            <div class="col-lg-8">
                <!-- Item slider-->
                <div class="well">
                    <div id="myCarousel" class="carousel fdi-Carousel slide">
                        <!-- Carousel items -->
                        <div class="carousel fdi-Carousel slide" id="eventCarousel" data-interval="0">
                            <div class="carousel-inner onebyone-carosel">
                                <div class="item active">
                                    <div class="col-md-4">
                                        <a href="#"><img src="http://placehold.it/250x250" class="img-responsive center-block"></a>
                                        <div class="text-center">1</div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-4">
                                        <a href="#"><img src="http://placehold.it/250x250" class="img-responsive center-block"></a>
                                        <div class="text-center">2</div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-4">
                                        <a href="#"><img src="http://placehold.it/250x250" class="img-responsive center-block"></a>
                                        <div class="text-center">3</div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-4">
                                        <a href="#"><img src="http://placehold.it/250x250" class="img-responsive center-block"></a>
                                        <div class="text-center">4</div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-4">
                                        <a href="#"><img src="http://placehold.it/250x250" class="img-responsive center-block"></a>
                                        <div class="text-center">5</div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-4">
                                        <a href="#"><img src="http://placehold.it/250x250" class="img-responsive center-block"></a>
                                        <div class="text-center">6</div>
                                    </div>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#eventCarousel" data-slide="prev"></a>
                            <a class="right carousel-control" href="#eventCarousel" data-slide="next"></a>
                        </div>
                        <!--/carousel-inner-->
                    </div><!--/myCarousel-->
                </div>
                <!-- Item slider end-->

            </div>
            <div class="col-lg-4">
                <fieldset class="well">
                    <h3>Register</h3>
                    <hr/>
                    <form role="form" method="POST" action="register.php" enctype="multipart/form-data" id="signupForm">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Profile for</label>
                                <select class="form-control input-sm" name="profile_for">
                                    <option value="">-Select-</option><option value="Myself">Myself</option><option value="Son">Son</option><option value="Daughter">Daughter</option><option value="Brother">Brother</option><option value="sister">Sister</option><option value="Relative">Relative</option><option value="Friend">Friend</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Name</label>
                                <input autocomplete="off" type="text" class="form-control input-sm" name="name">
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Email Address</label>
                                <input autocomplete="off" id="Email" type="email" class="form-control input-sm" name="email">
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Phone Number</label>
                                <input autocomplete="off" id="Phone" type="tel" class="form-control input-sm" name="phone">
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Password</label>
                                <input autocomplete="off" type="password" class="form-control input-sm" name="password">
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Date of Birth</label>
                                <input readonly="readonly" autocomplete="off" type="text" class="form-control input-sm" name="dob" id="DOB">
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Caste</label>
                                <select class="form-control input-sm" name="caste"><option value="">Select caste</option><option value="285"></option><option value="1">AdDharmi</option><option value="2">AdiDravida</option><option value="3">Agamudaiyar</option><option value="4">Agarwal</option><option value="5">AgnikulaKshatriya</option><option value="6">Agri</option><option value="7">Ahom</option><option value="8">Ambalavasi</option><option value="9">Arekatica</option><option value="10">Arora</option><option value="11">Arunthathiyar</option><option value="13">Aryasamaj</option><option value="12">AryaVysya</option><option value="14">Badaga</option><option value="15">Baidya</option><option value="16">Baishnab</option><option value="17">Baishya</option><option value="18">Balija</option><option value="19">Banik</option><option value="20">Baniya</option><option value="21">Banjara</option><option value="22">Barai</option><option value="23">Bari</option><option value="24">Barujibi</option><option value="25">Besta</option><option value="26">Bhandari</option><option value="27">Bhatia</option><option value="28">Bhatraju</option><option value="29">BhavasarKshatriya</option><option value="30">Bhavsar</option><option value="31">Bhovi</option><option value="32">Billava</option><option value="33">Bind</option><option value="34">Bishnoi</option><option value="35">Boyer</option><option value="36">Brahmbatt</option><option value="37">Brahmin</option><option value="46">Brahmin-Anavil</option><option value="47">Brahmin-Audichya</option><option value="48">Brahmin-Barendra</option><option value="49">Brahmin-Bhatt</option><option value="50">Brahmin-Bhumihar</option><option value="51">Brahmin-Daivadnya</option><option value="52">Brahmin-Danua</option><option value="53">Brahmin-Deshastha</option><option value="54">Brahmin-Dhiman</option><option value="55">Brahmin-Dravida</option><option value="56">Brahmin-Garhwali</option><option value="57">Brahmin-Gaur</option><option value="58">Brahmin-Goswami</option><option value="59">Brahmin-Gurukkal</option><option value="60">Brahmin-Halua</option><option value="61">Brahmin-Havyaka</option><option value="62">Brahmin-Hoysala</option><option value="63">Brahmin-Iyengar</option><option value="64">Brahmin-Iyer</option><option value="65">Brahmin-Jangid</option><option value="66">Brahmin-Jhadua</option><option value="67">Brahmin-Kanyakubj</option><option value="68">Brahmin-Karhade</option><option value="69">Brahmin-Kokanastha</option><option value="70">Brahmin-Kota</option><option value="71">Brahmin-Kulin</option><option value="72">Brahmin-Kumoani</option><option value="73">Brahmin-Madhwa</option><option value="74">Brahmin-Maithil</option><option value="75">Brahmin-Modh</option><option value="76">Brahmin-Mohyal</option><option value="77">Brahmin-Nagar</option><option value="78">Brahmin-Namboodiri</option><option value="79">Brahmin-Narmadiya</option><option value="80">Brahmin-Niyogi</option><option value="81">Brahmin-Panda</option><option value="82">Brahmin-Pandit</option><option value="83">Brahmin-Pushkarna</option><option value="84">Brahmin-Rarhi</option><option value="85">Brahmin-Rigvedi</option><option value="86">Brahmin-Rudraj</option><option value="87">Brahmin-Sakaldwipi</option><option value="88">Brahmin-Sanadya</option><option value="89">Brahmin-Sanketi</option><option value="90">Brahmin-Saraswat</option><option value="91">Brahmin-Saryuparin</option><option value="92">Brahmin-Shivhalli</option><option value="93">Brahmin-Shrimali</option><option value="94">Brahmin-Smartha</option><option value="95">Brahmin-SriVaishnava</option><option value="96">Brahmin-Stanika</option><option value="97">Brahmin-Tyagi</option><option value="98">Brahmin-Vaidiki</option><option value="99">Brahmin-Velanadu</option><option value="100">Brahmin-Vyas</option><option value="38">BrahminGaud</option><option value="39">BrahminGujarati</option><option value="40">BrahminGurukul</option><option value="41">BrahminKanyakubja</option><option value="42">BrahminKashmiriPandit</option><option value="43">BrahminKoknastha</option><option value="44">BrahminKumaoni</option><option value="45">BrahminViswa</option><option value="101">Bunt</option><option value="102">Bunt(Shetty)</option><option value="535">Caste No Bar</option><option value="103">Chambhar</option><option value="104">ChandravanshiKahar</option><option value="105">Chasa</option><option value="106">ChattadaSriVaishnava</option><option value="107">Chaudhary</option><option value="108">Chaurasia</option><option value="109">Chettiar</option><option value="110">Chettiyar</option><option value="111">Chhetri</option><option value="112">Chippolu(Mera)</option><option value="113">CKP</option><option value="114">Coorgi</option><option value="115">Devadiga</option><option value="116">DevandraKulaVellalar</option><option value="118">Devanga</option><option value="117">DevangKoshthi</option><option value="119">Devar/Thevar/Mukkulathor</option><option value="120">Dhangar</option><option value="121">Dheevara</option><option value="122">Dhiman</option><option value="123">Dhoba</option><option value="124">Dhobi</option><option value="125">Dumal</option><option value="126">Dusadh(Paswan)</option><option value="127">Ediga</option><option value="128">Ezhava</option><option value="129">Ezhuthachan</option><option value="130">Gabit</option><option value="131">Gandla</option><option value="132">Ganiga</option><option value="133">Garhwali</option><option value="134">Gavara</option><option value="135">Gawali</option><option value="136">Ghisadi</option><option value="137">Ghumar</option><option value="138">Goala</option><option value="139">Goan</option><option value="140">Gomantak</option><option value="141">Gondhali</option><option value="142">Goud</option><option value="143">Goundar</option><option value="144">Gounder</option><option value="145">Gowda</option><option value="146">Gramani</option><option value="147">Gudia</option><option value="148">Gujjar</option><option value="149">Gupta</option><option value="150">Guptan</option><option value="151">Gurav</option><option value="152">Gurjar</option><option value="153">Hugar(Jeer)</option><option value="544">Intercaste</option><option value="154">Iyengar</option><option value="155">Iyer</option><option value="156">Jaalari</option><option value="157">Jaiswal</option><option value="158">Jandra</option><option value="159">Jangam</option><option value="160">Jangra-Brahmin</option><option value="161">Jat</option><option value="162">Jatav</option><option value="163">Jogi(Nath)</option><option value="164">Kachara</option><option value="165">KadavaPatel</option><option value="166">Kaibarta</option><option value="167">Kalar</option><option value="168">Kalinga</option><option value="169">KalingaVysya</option><option value="170">Kalita</option><option value="171">Kalwar</option><option value="172">Kamboj</option><option value="173">Kamma</option><option value="174">Kansari</option><option value="175">Kapu</option><option value="176">Karan</option><option value="177">Karana</option><option value="178">Karmakar</option><option value="179">Karuneegar</option><option value="180">Kasar</option><option value="181">Kashyap</option><option value="182">Katiya</option><option value="183">Kayastha</option><option value="184">Khandayat</option><option value="185">Khandelwal</option><option value="186">Kharwar</option><option value="187">Khatri</option><option value="188">KokanasthaMaratha</option><option value="189">Koli</option><option value="190">KonguVellalaGounder</option><option value="191">Konkani</option><option value="192">Kori</option><option value="193">Kshatriya</option><option value="194">Kudumbi</option><option value="195">Kulal</option><option value="196">Kulalar</option><option value="197">Kulita</option><option value="198">Kumawat</option><option value="199">Kumbhakar</option><option value="200">Kumbhar</option><option value="201">Kumhar</option><option value="202">Kummari</option><option value="203">Kunbi</option><option value="204">Kuravan</option><option value="205">Kurmi</option><option value="206">KurmiKshatriya</option><option value="207">Kuruba</option><option value="208">KuruhinaShetty</option><option value="209">Kuruma</option><option value="210">Kurumbar</option><option value="211">Kushwaha</option><option value="212">Kushwaha(Koiri)</option><option value="213">Kutchi</option><option value="214">Lambadi</option><option value="215">Levapatel</option><option value="216">Levapatil</option><option value="217">Lingayat</option><option value="218">Lingayath</option><option value="219">LodhiRajput</option><option value="220">Lohana</option><option value="221">Lohar</option><option value="222">Lubana</option><option value="223">Madiga</option><option value="224">Mahajan</option><option value="225">Mahar</option><option value="226">Mahendra</option><option value="227">Maheshwari</option><option value="228">Mahishya</option><option value="229">Majabi</option><option value="230">Mala</option><option value="231">Mali</option><option value="232">Malla</option><option value="233">Mallah</option><option value="234">Mangalorean</option><option value="235">Manipuri</option><option value="236">Mapila</option><option value="237">Maratha</option><option value="238">MarathaKKuli</option><option value="239">Maruthuvar</option><option value="240">Marwari</option><option value="241">Matang</option><option value="242">Mathur</option><option value="243">Maurya</option><option value="244">Meena</option><option value="245">Meenavar</option><option value="246">Mehra</option><option value="247">Menon</option><option value="248">Meru</option><option value="249">MeruDarji</option><option value="250">Mochi</option><option value="251">Modak</option><option value="252">Mogaveera</option><option value="253">Mudaliar</option><option value="254">Mudaliyar</option><option value="255">Mudiraj</option><option value="256">Munchi</option><option value="257">MunnuruKapu</option><option value="258">Muthuraja</option><option value="259">Naagavamsam</option><option value="260">Nadar</option><option value="261">Nagaralu</option><option value="262">Nai</option><option value="263">Naicker</option><option value="264">Naidu</option><option value="265">Naik</option><option value="266">Naiker</option><option value="267">Nair</option><option value="268">Nambiar</option><option value="269">Namboodiri</option><option value="270">Namosudra</option><option value="271">Napit</option><option value="272">Nayak</option><option value="273">Nayaka</option><option value="274">Nayee</option><option value="275">Neeli</option><option value="276">Nepali</option><option value="277">Nhavi</option><option value="278">Oswal</option><option value="279">Otari</option><option value="280">Other-Hindu</option><option value="281">Padmasali</option><option value="282">Padmashali</option><option value="283">Pal</option><option value="284">Panchal</option><option value="286">Panicker</option><option value="287">ParkavaKulam</option><option value="288">Partraj</option><option value="289">Pasi</option><option value="290">Patel</option><option value="291">Patidar</option><option value="292">Patil</option><option value="293">Patnaick</option><option value="294">Patra</option><option value="295">Perika</option><option value="296">Pillai</option><option value="297">Porwal</option><option value="298">Prajapati</option><option value="299">Raigar</option><option value="300">Rajaka</option><option value="301">Rajasthani</option><option value="302">Rajbonshi</option><option value="303">Rajput</option><option value="304">Ramdasia</option><option value="305">Ramgariah</option><option value="306">Ravidasia</option><option value="307">Rawat</option><option value="308">Reddy</option><option value="309">Relli</option><option value="310">Sadgope</option><option value="311">Saha</option><option value="312">Sahu</option><option value="313">Saini</option><option value="314">Saliya</option><option value="315">Saliyar</option><option value="316">Savji</option><option value="317">SC</option><option value="318">SC/ST</option><option value="319">SenaiThalaivar</option><option value="320">SengunthaMudaliyar</option><option value="321">Sengunthar</option><option value="322">Settibalija</option><option value="323">Shah</option><option value="324">Shimpi</option><option value="325">Sindhi</option><option value="326">Sindhi-Amil</option><option value="327">Sindhi-Baibhand</option><option value="328">Sindhi-Bhanusali</option><option value="329">Sindhi-Bhatia</option><option value="330">Sindhi-Chhapru</option><option value="331">Sindhi-Dadu</option><option value="332">Sindhi-Hyderabadi</option><option value="333">Sindhi-Larai</option><option value="334">Sindhi-Larkana</option><option value="335">Sindhi-Lohana</option><option value="336">Sindhi-Rohiri</option><option value="337">Sindhi-Sahiti</option><option value="338">Sindhi-Sakkhar</option><option value="339">Sindhi-Sehwani</option><option value="340">Sindhi-Shikarpuri</option><option value="341">Sindhi-Thatai</option><option value="342">SKP</option><option value="343">Somvanshi</option><option value="344">Sonar</option><option value="345">Soni</option><option value="346">Sourashtra</option><option value="347">Sourashtrian</option><option value="348">SozhiyaVellalar</option><option value="349">ST</option><option value="350">Sugali(Naika)</option><option value="351">Sunari</option><option value="352">Sundhi</option><option value="353">Sutar</option><option value="354">Suthar</option><option value="355">SwakulaSali</option><option value="356">Swarnkar</option><option value="357">Tamboli</option><option value="358">Tanti</option><option value="359">Tantubai</option><option value="360">Telaga</option><option value="361">Teli</option><option value="362">Thakkar</option><option value="363">Thakur</option><option value="364">Thevar</option><option value="365">Thigala</option><option value="366">Thiya</option><option value="367">Thiyya</option><option value="368">Tili</option><option value="369">Togata</option><option value="370">TonkKshatriya</option><option value="371">TurupuKapu</option><option value="372">Udayar</option><option value="373">Uppara</option><option value="374">Urs</option><option value="375">VadaBalija</option><option value="376">Vaddera</option><option value="377">Vaish</option><option value="378">Vaishnav</option><option value="379">Vaishnava</option><option value="380">Vaishya</option><option value="381">VaishyaVani</option><option value="382">Valluvan</option><option value="383">Valmiki</option><option value="384">Vania</option><option value="385">Vaniya</option><option value="386">Vanjara</option><option value="387">Vanjari</option><option value="388">Vankar</option><option value="389">Vannan</option><option value="390">Vannar</option><option value="391">VanniaKulaKshatriyar</option><option value="392">Vanniyar</option><option value="393">Variar</option><option value="394">Varshney</option><option value="395">VeeraSaiva</option><option value="396">VeeraSaivam</option><option value="397">Veerashaiva</option><option value="398">Velaan</option><option value="399">Velama</option><option value="400">Vellalar</option><option value="401">Vellama</option><option value="402">VeluthedathuNair</option><option value="403">VettuvaGounder</option><option value="404">VilakkithalaNair</option><option value="405">Vishwakarma</option><option value="406">Viswabrahmin</option><option value="407">Viswakarma</option><option value="408">Vokkaliga</option><option value="409">Vysya</option><option value="410">Yadav</option><option value="411">Yadava</option><option value="412">Yellapu</option><option value="413">Yogi</option></select>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Gender</label>
                                <select class="form-control input-sm" name="gender">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Address</label>
                                <textarea class="form-control input-sm" name="address"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="custom-file">Photo</label>
                                <input name="photo" type="file" id="file" class="custom-file-input">
                                <span class="custom-file-control"></span>
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="submit" name="register" value="Register" class="btn btn-mini btn-theme btn-block" />
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
</section>
<?php require 'footer.php'; ?>