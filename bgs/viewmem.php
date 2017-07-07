<!DOCTYPE HTML>
<?php
include ("../connection.php");
session_start();
if (!isset($_SESSION['email'])) {
    $_SESSION["message"] = "Please signin to continue";
    header("Location:index.php");
}
$userid = $_GET['userid'];
$select_path = "SELECT * FROM members,astro,family where members.userid=astro.userid and members.userid=family.userid and members.userid='" . $userid . "'";
$var = mysql_query($select_path);
$row = mysql_fetch_assoc($var);
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>சுபிக்ஷம் திருமண தகவல் மற்றும் சேவை மையம்</title>

        <!-- Normalize or reset CSS with your favorite library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">

        <!-- Load paper.css for happy printing -->
        <link rel="stylesheet" href="paper.css">

        <!-- Set page size here: A5, A4 or A3 -->
        <!-- Set also "landscape" if you need -->
        <style>@page { size: A4 }
            .tophead{
                text-align: center;

            }
            .heading{
                font-size: 25pt;
                font-weight: 900;
                text-align: center;
            }
            .subhead, .address{
                margin-left: 100px;
            }
            .regno{
                float: right;
                margin-right: 10px;
                
            }
            .contents{
                display: block;
                margin-left:52px; 
                margin-top: 5px;
            }
            .left{
                width: 50%;
                float: left;
            }

            .right{
                width: 50%;
                float: right;
            }


         
           .kattam1, table{
                table-layout: fixed;
                font-size: 13px;
                empty-cells: show;
                
            }
        
            .l1 td,.r1 td{

            	 padding-top: .2em;
    			padding-bottom: .2em;
            }

            .kattam1  td,.kattam2 td{
                width:20px;
                height:20px;
                text-align:center; 
                word-wrap:break-word;
            }

        </style>
    </head>

    <!-- Set "A5", "A4" or "A3" for class name -->
    <!-- Set also "landscape" if you need -->
    <body class="A4">
        <button onclick="myFunction()" class="no-print">Print this page</button>
        <button onclick="window.location = 'add_members.php'" class="no-print">New Member</button>
        <button onclick="window.location = 'editmem.php?userid=<?php echo $_GET['userid']?>'" class="no-print">Edit member</button>
        <!-- Each sheet element should have the class "sheet" -->
        <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
        <section class="sheet padding-10mm">

            <!-- Write HTML just like a web page -->
            <div class="tophead">
                <div class="heading"><u>சுபிக்ஷம்</u> </div>
                <div class="regno" >பதிவு எண்:<?php echo $row['sid']; ?></div>
                    <div class="subhead">திருமண தகவல் மற்றும் சேவை மையம்</div>
                    
                   
            </div>

            <hr>
            
            
            
            <div class="contents">
                <div class="left">
                    <table class="l1" style="height:520px; width:300px;"; >
                        <tr>
                            <td>ஜாதி</td>
                            <td>:<?php echo $row['caste']; ?></td>
                        </tr>
                          <tr>
                            <td>பெயர்</td>
                            <td>:<?php echo $row['name']; ?></td>
                        </tr>
                          <tr>
                            <td>பிறந்த தேதி</td>
                            <td>:<?php echo date('d-m-Y',strtotime($row['dob'])); ?></td>
                        </tr>
                          <tr>
                            <td>படிப்பு</td>
                            <td>:<?php echo $row['qualification']; ?></td>
                        </tr>
                          <tr>
                            <td>வேலை</td>
                            <td>:<?php echo $row['job']; ?></td>
                        </tr>
                          <tr>
                            <td>உயரம்</td>
                            <td>:<?php echo $row['height']; ?></td>
                        </tr>
                          <tr>
                            <td>குல தெய்வம்</td>
                            <td>:<?php echo $row['kuladeivam']; ?></td>
                        </tr>
                         <tr>
                            <td>உடன் பிறப்பு:</td>
                            <td><span>ஆண் :</span><span><?php echo $row['malecount']; ?></span>
                            <span>பெண் :</span><span><?php echo $row['femalecount']; ?></span></td>
                        </tr> <tr>
                            <td>தந்தை பெயர் </td>
                            <td>:<?php echo $row['fathername']; ?></td>
                        </tr> <tr>
                            <td>பூர்விகம்:</td>
                            <td>:<?php echo $row['poorvigam']; ?></td>
                        </tr> <tr>
                            <td>ராசி:</td>
                            <td>:<?php echo $row['raasi']; ?></td>
                        </tr>
                         <tr>
                            <td>லக்னம்</td>
                            <td>:<?php echo $row['laknam']; ?></td>
                        </tr>
                        <tr>
                            <td>முகவரி</td>
                            <td >:<?php echo $row['address']; ?></td>
                        </tr>
                       
                      	 
                    </table>
                    <h3> பொருத்தம்: <span><?php echo $row['porutham']; ?></span></h3> 
                    <div class="kattam1">
                       <table border="1" width="310px" height="330px">
                                <tr><td><?php echo $row['r1']; ?></td><td><?php echo $row['r2']; ?></td><td><?php echo $row['r3']; ?></td><td><?php echo $row['r4']; ?></td></tr>
                                <tr><td><?php echo $row['r12']; ?></td><td rowspan="2" colspan="2">ராசி</td><td><?php echo $row['r5']; ?></td></tr>
                                <tr><td><?php echo $row['r11']; ?></td><td><?php echo $row['r6']; ?></td></tr>
                                <tr><td><?php echo $row['r10']; ?></td><td><?php echo $row['r9']; ?></td><td><?php echo $row['r8']; ?></td><td><?php echo $row['r7']; ?></td></tr> 
                            </table>
                    </div></div>
                <div class="right">
                            <table class="r1" style="height:530px; width:300px;">
                        <tr>
                            <td>உட்பிரிவு</td>
                            <td>:<?php echo $row['subcaste']; ?></td>
                        </tr>
                          <tr>
                            <td>பாலினம்</td>
                            <td>:<?php if ($row['sex'] == "M")
    echo "ஆண்";
else
    echo "பெண்";
?></td>
                        </tr>
                        
                         <tr>
                            <td>பிறந்த நேரம்</td>
                            <td>:<?php echo date('h:i:s A', strtotime($row['btime']));  ?></td>
                        </tr>
                          <tr>
                            <td>வருமானம்</td>
                            <td>:<?php echo $row['salary']; ?></td>
                        </tr>
                          <tr>
                            <td>பணிபுரியும்இடம் </td>
                            <td>:<?php echo $row['joblocation']; ?></td>
                        </tr>
                          <tr>
                            <td>நிறம்</td>
                            <td>:<?php echo $row['color']; ?></td>
                        </tr>
                          <tr>
                            <td>எதிர்பார்ப்பு</td>
                            <td>:<?php echo $row['expectation']; ?></td>
                        </tr>
                         
                         <tr>
                            <td>திருமணமானவர்:</td>
                            <td><span>ஆண் :</span><span><?php echo $row['malemarried']; ?></span> 
                            <span>பெண் :</span><span><?php echo $row['femalemarried']; ?></span></td>
                        </tr> 
                         <tr>
                            <td>தாய் பெயர்</td>
                            <td>:<?php echo $row['mothername']; ?></td>
                        </tr><tr>
                            <td>சொத்துகள்</td>
                            <td>:<?php echo $row['properties']; ?></td>
                        </tr> <tr>
                            <td>நட்சத்திரம்:</td>
                            <td>:<?php echo $row['star']; ?></td>
                        </tr> <tr>
                            <td>திசை இருப்பு:</td>
                            <td>:<?php echo $row['thisai']; ?></td>
                        </tr>
                         <tr>
                            <td>ஈமெயில்</td>
                            <td>:<?php echo $row['email']; ?></td>
                        </tr>
                         <tr>
                            <td>போன்</td>
                            <td>:<?php echo $row['phone']; ?></td>
                        </tr>
                      
                         <tr>
                            <td>மாவட்டம்</td>
                            <td>:<?php echo $row['city']; ?></td>
                        </tr>  
                    </table>
                    <h4> &nbsp;</h4> 
                    <div class="kattam2">
                           <table border="1" width="310px" height="330px">
                                <tr><td><?php echo $row['l1']; ?></td><td><?php echo $row['l2']; ?></td><td><?php echo $row['l3']; ?></td><td><?php echo $row['l4']; ?></td></tr>
                                <tr><td><?php echo $row['l12']; ?></td><td rowspan="2" colspan="2">நவாம்சம்</td><td><?php echo $row['l5']; ?></td></tr>
                                <tr><td><?php echo $row['l11']; ?></td><td><?php echo $row['l6']; ?></td></tr>
                                <tr><td><?php echo $row['l10']; ?></td><td><?php echo $row['l9']; ?></td><td><?php echo $row['l8']; ?></td><td><?php echo $row['l7']; ?></td></tr> 
                            </table>
                    </div>
                </div>
                
            </div>        
            
            
            

        </section>



    </body>
    <script>
        function myFunction() {
            window.print();
        }
    </script>
</html>
