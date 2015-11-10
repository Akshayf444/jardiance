<!DOCTYPE html>
<?php
require_once("../includes/initialize.php");
$sql = "SELECT rx_save.zone,rx_save.`doc_id`,MAX(`rx_save`.`rx`)AS rxcount,asm.`asm_name` FROM rx_save
        LEFT JOIN `doctor` ON doctor.`doc_id` = `rx_save`.`doc_id`
        LEFT JOIN bdm ON bdm.`bdm_id` = `doctor`.`bdm_id` 
        LEFT JOIN asm ON asm.`asm_id` = bdm.`asm_id` 
        LEFT JOIN `task_force` tf ON tf.tfid = `rx_save`.`bdm_id` GROUP BY `rx_save`.`doc_id` ";


$rx = Query::executeQuery($sql);
$south = 0;
$central = 0;
$north = 0;
$east = 0;
$west = 0;


$southname = 'South';
$centralname = 'Central';
$northname = 'North';
$eastname = 'East';
$westname = 'West';
$allindia='All India';


$southDoctorCount = 0;
$northDoctorCount = 0;
$centralDoctorCount = 0;
$eastDoctorCount = 0;
$westDoctorCount = 0;

foreach ($rx as $value) {
    if ($value->zone == 'East') {
        $eastname = 'East';
        $east = $east + $value->rxcount;
        $eastDoctorCount ++;
    } elseif ($value->zone == 'South') {
        $southname = 'South';
        $south = $south + $value->rxcount;
        $southDoctorCount++;
    } elseif ($value->zone == 'West') {
        $westname = 'West';
        $west = $west + $value->rxcount;
        $westDoctorCount++;
    } elseif ($value->zone == 'North') {
        $northname = 'North';
        $north = $north + $value->rxcount;
        $northDoctorCount++;
    } elseif ($value->zone == 'Central') {
        $centralname = 'Central';
        $central = $central + $value->rxcount;
        $centralDoctorCount++;
    }
}
$allrx=$east+$south+$west+$north+$central;
$allindiacount= $eastDoctorCount + $southDoctorCount+$westDoctorCount+$northDoctorCount+$centralDoctorCount;

$pob = pob::live_pob();
$top_bdm = bdm::top_bdm();
$top_asm = bdm::top_asm();
$top_zsm = bdm::top_zsm();
// $total=array($pob,$rx);
?>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Tv</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Fullscreen Slit Slider with CSS3 and jQuery" />
        <meta name="keywords" content="slit slider, plugin, css3, transitions, jquery, fullscreen, autoplay" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" />
        <script type="text/javascript" src="js/modernizr.custom.79639.js"></script>
        <noscript>
        <link rel="stylesheet" type="text/css" href="css/styleNoJS.css" />
        </noscript>
    </head>
    <body>

        <div class="container demo-1">

            <!-- Codrops top bar -->
            <div class="codrops-top clearfix">


                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <div id="slider" class="sl-slider-wrapper">

                <div class="sl-slider">

                    <div class="sl-slide bg-1" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                        <div class="sl-slide-inner">
                            <div class="deco"><img src="images/Jardiance-Logo-ctc.png" width="500" height="205"></div>

                            <!--<blockquote><p>You have just dined, and however scrupulously the slaughterhouse is concealed in the graceful distance of miles, there is complicity.</p><cite>Ralph Waldo Emerson</cite></blockquote>-->
                        </div>
                    </div>

                    <div class="sl-slide bg-2" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                        <div class="sl-slide-inner">
                            <h2>Total Rx and POB Generated in Each Zone</h2>
                            <blockquote>


                                <table width="29%" cellspacing="0" cellpadding="0" class="pob">
                                    <tr>
                                        <td colspan="2" bgcolor="#fdd84c"><h3><?php echo $eastname; ?></h3></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle"><h4>Rx Generated</h4></td>
                                        <td align="left" valign="middle"><?php echo $east ?></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle"><h4>No. of  Prescriber</h4></td>
                                        <td align="left" valign="middle"><?php echo $eastDoctorCount ?></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle"><h4>POB Generated</h4></td>
                                        <td align="left" valign="middle"><?php
?>
                                        </td>
                                    </tr>
                                </table>

                                <table width="29%" cellspacing="0" cellpadding="0" class="pob">
                                    <tr>
                                        <td colspan="2" bgcolor="#fdd84c"><h3><?php echo $westname; ?></h3></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle"><h4>Rx Generated</h4></td>
                                        <td align="left" valign="middle"><?php echo $west ?></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle"><h4>No. of  Prescriber</h4></td>
                                        <td align="left" valign="middle"><?php echo $westDoctorCount ?></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle"><h4>POB Generated</h4></td>
                                        <td align="left" valign="middle"><?php
?>
                                        </td>
                                    </tr>
                                </table>
                                <table width="29%" cellspacing="0" cellpadding="0" class="pob">
                                    <tr>
                                        <td colspan="2" bgcolor="#fdd84c"><h3><?php echo $southname; ?></h3></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle"><h4>Rx Generated</h4></td>
                                        <td align="left" valign="middle"><?php echo $south ?></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle"><h4>No. of  Prescriber</h4></td>
                                        <td align="left" valign="middle"><?php echo $southDoctorCount ?></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle"><h4>POB Generated</h4></td>
                                        <td align="left" valign="middle"><?php ?>
                                        </td>
                                    </tr>
                                </table>
                                <table width="29%" cellspacing="0" cellpadding="0" class="pob">
                                    <tr>
                                        <td colspan="2" bgcolor="#fdd84c"><h3><?php echo $northname; ?></h3></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle"><h4>Rx Generated</h4></td>
                                        <td align="left" valign="middle"><?php echo $north ?></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle"><h4>No. of  Prescriber</h4></td>
                                        <td align="left" valign="middle"><?php echo $northDoctorCount ?></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle"><h4>POB Generated</h4></td>
                                        <td align="left" valign="middle"><?php ?>
                                        </td>
                                    </tr>
                                </table>

                            </blockquote>
                        </div>
                    </div>

                    <div class="sl-slide bg-3" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                        <div class="sl-slide-inner">
                            <div class="deco" data-icon="O"></div>
                            <h2>Top 5 BDM of the day</h2>
                            <blockquote>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td  align="left" valign="middle"><h3>Name</h3></td>
                                        <td  align="left"><h3>Territory</h3></td>

                                    </tr>
<?php
if (!empty($top_bdm)) {
    foreach ($top_bdm as $tops) {
        ?>

                                            <tr>

                                                <td align="left" valign="middle"><?php echo $tops->NAMES; ?></td>
                                                <td align="left" valign="middle"><?php echo $tops->HQ; ?></td>
                                            </tr>


        <?php
    }
}
?>		
                                </table>
                            </blockquote>
                        </div>
                    </div>

                    <div class="sl-slide bg-4" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
                        <div class="sl-slide-inner">
                            <div class="deco" data-icon="I"></div>
                            <h2>Top 5 ASM of the day</h2>
                            <blockquote>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td  align="left" valign="middle"><h3>Name</h3></td>
                                        <td  align="left"><h3>Territory</h3></td>
                                        <td  align="left"><h3> Till Date Count</h3></td>
                                    </tr>
<?php
if (!empty($top_asm)) {
    foreach ($top_asm as $tops_asm) {
        ?>
                                            <tr>

                                                <td align="left" valign="middle"><?php echo $tops_asm->asm_name; ?></td>
                                                <td align="left" valign="middle"><?php echo $tops_asm->HQ; ?></td>
                                                <td align="left" valign="middle"><?php echo $tops_asm->totalsum; ?></td>
                                            </tr>
        <?php
    }
}
?>

                                </table>

                            </blockquote>
                        </div>
                    </div>

                    <div class="sl-slide bg-5" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                        <div class="sl-slide-inner">
                            <div class="deco" data-icon="t"></div>
                            <h2>Top  ZSM of the day</h2>
                            <blockquote>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" valign="middle"><h3>Name</h3></td>
                                        <td align="left"><h3>Territory</h3></td>

                                    </tr>
<?php
if (!empty($top_zsm)) {
    ?>
                                        <tr>

                                            <td align="left" valign="middle"><?php echo $top_zsm->zsm_name; ?></td>
                                            <td align="left" valign="middle"><?php echo $top_zsm->HQ; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>



                            </blockquote>
                        </div>
                    </div>

                    <div class="sl-slide bg-6" data-orientation="horizontal" data-slice1-rotation="-6" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                        <div class="sl-slide-inner">
                            <div class="deco" data-icon="t"></div>
                            <h2>Winner of the Last Week</h2>
                            <blockquote><h6> Winner Name</h6>
                                <h5 class="win-rx">Rx Counts</h5>
                            </blockquote>
                        </div>
                    </div>

                    <div class="sl-slide bg-6" data-orientation="horizontal" data-slice1-rotation="-6" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                        <div class="sl-slide-inner">
                            <div class="deco" data-icon="t"></div>
                            <h2>Winner of the Last Week</h2>
                            <blockquote><h6> Winner Name</h6>
                                <h5 class="win-rx">Rx Counts</h5>
                            </blockquote>
                        </div>
                    </div>
                </div><!-- /sl-slider -->

                <nav id="nav-arrows" class="nav-arrows">
                    <span class="nav-arrow-prev">Previous</span>
                    <span class="nav-arrow-next">Next</span>
                </nav>

                <nav id="nav-dots" class="nav-dots">
                    <span class="nav-dot-current"></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </nav>

            </div><!-- /slider-wrapper -->            
        </div>
       	<div class="bottm" style="position:fixed; bottom:0; width:100%; z-index:10">
            <marquee direction="left" behavior="scroll" scrollamount="1" style=" width:100%; float:left; clear:both; padding:5px; color:#CCC; z-index:10; background-color:#333;"> iopajdfjdfajsdfoipjafoiaiadjfoipjfoiajfoiajfoijiofjoifjiaopdfjo</marquee>
            <div class="diclaimer" style="width:100%; loat:left; clear:both; padding:4px; text-align: center; color:#000; background-color:#999; z-index:50;">Disclaimer:*Toppers displaying are as per the count received by BDM/TF, Actual winner will be declared after verification</div>


        </div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.ba-cond.min.js"></script>
        <script type="text/javascript" src="js/jquery.slitslider.js"></script>
        <script type="text/javascript">
            $(function () {
                
                var Page = (function () {
                    
                    var $navArrows = $('#nav-arrows'),
                            $nav = $('#nav-dots > span'),
                            slitslider = $('#slider').slitslider({
                        onBeforeChange: function (slide, pos) {
                            
                            $nav.removeClass('nav-dot-current');
                            $nav.eq(pos).addClass('nav-dot-current');
                            
                        }
                    }),
                            init = function () {
                                
                                initEvents();
                                
                            },
                            initEvents = function () {
                                
                                // add navigation events
                                $navArrows.children(':last').on('click', function () {
                                    
                                    slitslider.next();
                                    return false;
                                    
                                });
                                
                                $navArrows.children(':first').on('click', function () {
                                    
                                    slitslider.previous();
                                    return false;
                                    
                                });
                                
                                $nav.each(function (i) {
                                    
                                    $(this).on('click', function (event) {
                                        
                                        var $dot = $(this);
                                        
                                        if (!slitslider.isActive()) {
                                            
                                            $nav.removeClass('nav-dot-current');
                                            $dot.addClass('nav-dot-current');
                                            
                                        }
                                        
                                        slitslider.jump(i + 1);
                                        return false;
                                        
                                    });
                                    
                                });
                                
                            };
                    
                    return {init: init};
                    
                })();
                
                Page.init();
                
                /**
                 * Notes: 
                 * 
                 * example how to add items:
                 */
                
                /*
                 
                 var $items  = $('<div class="sl-slide sl-slide-color-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1"><div class="sl-slide-inner bg-1"><div class="sl-deco" data-icon="t"></div><h2>some text</h2><blockquote><p>bla bla</p><cite>Margi Clarke</cite></blockquote></div></div>');
                 
                 // call the plugin's add method
                 ss.add($items);
                 
                 */
                
            });
        </script>
    </body>
</html>