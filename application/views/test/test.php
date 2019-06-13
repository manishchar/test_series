<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
    <?php include('layouts/meta.php'); ?>
	<style type="text/css">
		.leftSection,.rightSection{
			display: inline-table;
			/*border: 1px solid red;*/
			width: 49%;
			padding: 10px;
		}
		.rightSection{
			text-align: right;
			padding-right: 10px;
		}
        .qsList{
            border-bottom-style: ridge;
            margin-top: 10px;
        }
	</style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 text-right" style="">
            <!-- <a href="<?= base_url().'test/logout' ?>" class="btn btn-danger">Logout</a> -->
        </div>

         <div class="col-sm-12" style="">
         <div class="col-sm-8">
         <span> Time</span>
         <span id="time">01:00:00</span>
         </div>
         <div class="col-sm-4">&nbsp;</div>
        
        </div>


        <div class="col-sm-8">
            <div id="header">
            	<div class="leftSection"></div>
            	<div class="rightSection"><span id="stepValue">1</span> of <span><?= count($questions); ?></span></div>
            </div>
            <form id="myform" onsubmit="return false;">
                <input type="hidden" name="test_id" value="<?= $test_id ?>">
                <input type="hidden" name="student_id" value="<?= $student_id ?>">
                <input type="hidden" name="mapping_id" value="<?= $mapping_id ?>">
                <input type="hidden" name="test_attempt_id" value="<?= $test_attempt_id ?>">
            	<div id="example-basic">

            		<?php 
                    $htm = '';
            		foreach($questions as $key=>$question){ 
                        if($key == 0){
$htm .= "<div class='col-sm-1 form-group questionNumber active' id = '".($key)."'>".($key+1)."</div>";
                        }else{
$htm .= "<div class='col-sm-1 form-group questionNumber' id = '".($key)."'>".($key+1)."</div>";                            
                        }
                        
                    ?>
            		<h3 class="title" style="display: none;">Keyboard</h3>
            		<section style="overflow-x: scroll !important;">
                        
            		<p><?= ($key+1).' ) '.$question->question ?></p>
                    <input type="hidden" name="type[]" value="<?= $question->type ?>">
                    <?php
                        if($question->type == '1'){
                           $response = json_decode($question->response);
                           foreach ($response as $k => $res) { ?>
                                <div class="row qsList">
                                    <div class="col-sm-1">
                                    <input type="radio" id="<?= $question->id.'_'.$k ?>" name="answare[<?= $question->id; ?>]" value="<?= ($k+1); ?>">
                                    </div>
                                    <div class="col-sm-11">
                                        <label for="<?= $question->id.'_'.$k ?>"><?= $res; ?></label>
                                    </div>
                                </div> 
                           <?php }
                        }

                        if($question->type == '2'){
                           $response = json_decode($question->response);
                           foreach ($response as $k => $res) { ?>
                                <div>
                                    <input type="checkbox" id="<?= $question->id.'_'.$k ?>" name="answare[<?= $question->id; ?>][]" value="<?= ($k+1); ?>">
                                    <label for="<?= $question->id.'_'.$k ?>"><?= $res; ?></label>
                                </div> 
                           <?php }
                        }
                    ?>
            		<!-- 
            		<div>
            			<input type="radio" name="asn">
            			<label>Response</label>
            		</div> -->
                    
            		</section>
            		<?php }
            		?>

            		<!-- <h3>Effects</h3>
            		<section>
            		<p>Wonderful transition effects.</p>
            		</section>
            		<h3>Pager</h3>
            		<section>
            		<p>The next and previous buttons help you to navigate through your content.</p>
            		</section> -->
            	</div>
            </form>
        </div>
		<div class="col-sm-4">
            <!-- <div class="container-fluid">
                <div class="row">
                <?= $htm; ?>      
                </div>
            </div> -->
        </div>
	</div>
</div>


<div id="loader" ><img src="<?= base_url() ?>assets/loader.gif" /></div>
<?php include('layouts/footer.php'); ?>
</body>
</html>
<style type="text/css">
    .questionNumber{
        border: 1px solid gray;
        /*padding: 10px;*/
        background: gray;
        color: #ffffff;
    }
    .active{
        background: #005aff;
        color: #ffffff;
    }
</style>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css" />
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url('front/js/jquery.steps.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('front/js/jquery.steps.min.js'); ?>"></script>
<?php include('layouts/script.php'); ?>
<style type="text/css">
    #loader{
        display:  none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: #ECF0F1;
    z-index: 9999;
    height: 100%;
    width: 100%;
}
#loader img {
        position: absolute;
    left: 50%;
    top: 50%;
    width: 35px;
}
wizard > .content > .body {
    overflow-x: scroll !important;
}
</style>
<script type="text/javascript">

    function startTimer(duration, display) {
    var timer = duration, hours,minutes, seconds;
    console.log('seconds',seconds);
    console.log('minutes',minutes);
    console.log('duration',duration);
    console.log('timer',timer);
    var timeerValue =setInterval(function () {
        hours = parseInt(timer / 3600, 10);
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = hours+' : '+minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }

    console.log('-');
    if(timer ==1){
        clearInterval(timeerValue);
       //console.log('stop ');   
       testFormSubmit();
    }

    }, 1000);
    
}


window.onload = function () {
    var fiveMinutes = 60 * 60,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
function testFormSubmit(){
    formSubmit('myform');
    // var base_url = "<?= base_url(); ?>";
    // window.location.href = base_url+'test/result';
}
	//http://www.jquery-steps.com/Examples

$("#example-basic").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    autoFocus: true,
    labels: {
        next: 'Save & Next  <i class="fa fa-chevron-right"></i>',
        },
    onStepChanged: function (event, currentIndex, newIndex)
    {
    	//event.next();
        console.log(currentIndex);
        if(currentIndex >newIndex){
            //formSubmit('myform');
            //testFormSubmit();
        }else{
            console.log('pre');
        }
    	$('#stepValue').html( parseInt(currentIndex)+1);
    	//console.log(event);
        var index = parseInt(newIndex)+1;
        //
        //console.log( $('#form').serialize() );
        // form.validate().settings.ignore = ":disabled,:hidden";
        // return form.valid();
    },
    onFinishing: function (event, currentIndex)
    {
        // form.validate().settings.ignore = ":disabled";
        // return form.valid();
        // formSubmit('myform');
        //  var base_url = "<?= base_url(); ?>";
        //  window.location.href = base_url+'test/result';
var r = confirm("Are You Sure To Submit?");
if (r == true) {
    testFormSubmit();
    var base_url = "<?= base_url(); ?>";
    window.location.href = base_url+'test/result';
} else {
  txt = "You pressed Cancel!";
}
        

        //alert();
    },
    onFinished: function (event, currentIndex)
    {
        alert("Submitted!");
    }
});


function formSubmit(obj){
    //alert(obj);
    $.ajax({
    type: "POST",
    url: "<?php echo base_url().'test/save'; ?>",
    data: $('#'+obj).serialize(),
    beforeSend: function(jqXHR, settings){
            $('#loader').show();
    },
    success: function(result){
        //alert(result.d);
        console.log(result);
    },
    complete: function(jqXHR, textStatus){
            $('#loader').hide();
    }
});
}
</script>

<style type="text/css">
	/*
    Common 
*/

.wizard,
.tabcontrol
{
    display: block;
    width: 100%;
    overflow: hidden;
}

.wizard a,
.tabcontrol a
{
    outline: 0;
}

.wizard ul,
.tabcontrol ul
{
    list-style: none !important;
    padding: 0;
    margin: 0;
}

.wizard ul > li,
.tabcontrol ul > li
{
    display: block;
    padding: 0;
}

/* Accessibility */
.wizard > .steps .current-info,
.tabcontrol > .steps .current-info
{
    position: absolute;
    left: -999em;
}

.wizard > .content > .title,
.tabcontrol > .content > .title
{
    position: absolute;
    left: -999em;
}



/*
    Wizard
*/

.wizard > .steps
{
    position: relative;
    display: none;
    width: 100%;
}

.wizard.vertical > .steps
{
    display: inline;
    float: left;
    width: 30%;
}

.wizard > .steps .number
{
    font-size: 1.429em;
}

.wizard > .steps > ul > li
{
    width: 25%;
}

.wizard > .steps > ul > li,
.wizard > .actions > ul > li
{
    float: left;
}

.wizard.vertical > .steps > ul > li
{
    float: none;
    width: 100%;
}

.wizard > .steps a,
.wizard > .steps a:hover,
.wizard > .steps a:active
{
    display: block;
    width: auto;
    margin: 0 0.5em 0.5em;
    padding: 1em 1em;
    text-decoration: none;

    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}

.wizard > .steps .disabled a,
.wizard > .steps .disabled a:hover,
.wizard > .steps .disabled a:active
{
    background: #eee;
    color: #aaa;
    cursor: default;
}

.wizard > .steps .current a,
.wizard > .steps .current a:hover,
.wizard > .steps .current a:active
{
    background: #2184be;
    color: #fff;
    cursor: default;
}

.wizard > .steps .done a,
.wizard > .steps .done a:hover,
.wizard > .steps .done a:active
{
    background: #9dc8e2;
    color: #fff;
}

.wizard > .steps .error a,
.wizard > .steps .error a:hover,
.wizard > .steps .error a:active
{
    background: #ff3111;
    color: #fff;
}

.wizard > .content
{
    background: #eee;
    display: block;
    margin: 0.5em;
    min-height: 40em;
    overflow-x: scroll;
    position: relative;
    width: auto;

    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}

.wizard.vertical > .content
{
    display: inline;
    float: left;
    margin: 0 2.5% 0.5em 2.5%;
    width: 65%;
}

.wizard > .content > .body
{
    float: left;
    position: absolute;
    width: 95%;
    height: 95%;
    padding: 2.5%;
}

.wizard > .content > .body ul
{
    list-style: disc !important;
}

.wizard > .content > .body ul > li
{
    display: list-item;
}

.wizard > .content > .body > iframe
{
    border: 0 none;
    width: 100%;
    height: 100%;
}

.wizard > .content > .body input
{
    /*display: block;*/
    border: 1px solid #ccc;
}

.wizard > .content > .body input[type="checkbox"]
{
    display: inline-block;
}

.wizard > .content > .body input.error
{
    background: rgb(251, 227, 228);
    border: 1px solid #fbc2c4;
    color: #8a1f11;
}

.wizard > .content > .body label
{
    display: inline-block;
    margin-bottom: 0.5em;
}

.wizard > .content > .body label.error
{
    color: #8a1f11;
    display: inline-block;
    margin-left: 1.5em;
}

.wizard > .actions
{
    position: relative;
    display: block;
    text-align: right;
    width: 100%;
}

.wizard.vertical > .actions
{
    display: inline;
    float: right;
    margin: 0 2.5%;
    width: 95%;
}

.wizard > .actions > ul
{
    display: inline-block;
    text-align: right;
}

.wizard > .actions > ul > li
{
    margin: 0 0.5em;
}

.wizard.vertical > .actions > ul > li
{
    margin: 0 0 0 1em;
}

.wizard > .actions a,
.wizard > .actions a:hover,
.wizard > .actions a:active
{
    background: #2184be;
    color: #fff;
    display: block;
    padding: 0.5em 1em;
    text-decoration: none;

    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}

.wizard > .actions .disabled a,
.wizard > .actions .disabled a:hover,
.wizard > .actions .disabled a:active
{
    background: #eee;
    color: #aaa;
}

.wizard > .loading
{
}

.wizard > .loading .spinner
{
}



/*
    Tabcontrol
*/

.tabcontrol > .steps
{
    position: relative;
    display: block;
    width: 100%;
}

.tabcontrol > .steps > ul
{
    position: relative;
    margin: 6px 0 0 0;
    top: 1px;
    z-index: 1;
}

.tabcontrol > .steps > ul > li
{
    float: left;
    margin: 5px 2px 0 0;
    padding: 1px;

    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}

.tabcontrol > .steps > ul > li:hover
{
    background: #edecec;
    border: 1px solid #bbb;
    padding: 0;
}

.tabcontrol > .steps > ul > li.current
{
    background: #fff;
    border: 1px solid #bbb;
    border-bottom: 0 none;
    padding: 0 0 1px 0;
    margin-top: 0;
}

.tabcontrol > .steps > ul > li > a
{
    color: #5f5f5f;
    display: inline-block;
    border: 0 none;
    margin: 0;
    padding: 10px 30px;
    text-decoration: none;
}

.tabcontrol > .steps > ul > li > a:hover
{
    text-decoration: none;
}

.tabcontrol > .steps > ul > li.current > a
{
    padding: 15px 30px 10px 30px;
}

.tabcontrol > .content
{
    position: relative;
    display: inline-block;
    width: 100%;
    height: 35em;
    overflow: hidden;
    border-top: 1px solid #bbb;
    padding-top: 20px;
}

.tabcontrol > .content > .body
{
    float: left;
    position: absolute;
    width: 95%;
    height: 95%;
    padding: 2.5%;
}

.tabcontrol > .content > .body ul
{
    list-style: disc !important;
}

.tabcontrol > .content > .body ul > li
{
    display: list-item;
}
</style>

<style type="text/css">
	
	/*
 * HTML5 Boilerplate
 *
 * What follows is the result of much research on cross-browser styling.
 * Credit left inline and big thanks to Nicolas Gallagher, Jonathan Neal,
 * Kroc Camen, and the H5BP dev community and team.
 */

/* ==========================================================================
   Base styles: opinionated defaults
   ========================================================================== */

html,
button,
input,
select,
textarea {
    color: #222;
}

body {
    font-size: 1em;
    line-height: 1.4;
}

/*
 * Remove text-shadow in selection highlight: h5bp.com/i
 * These selection rule sets have to be separate.
 * Customize the background color to match your design.
 */

::-moz-selection {
    background: #b3d4fc;
    text-shadow: none;
}

::selection {
    background: #b3d4fc;
    text-shadow: none;
}

/*
 * A better looking default horizontal rule
 */

hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0;
}

/*
 * Remove the gap between images and the bottom of their containers: h5bp.com/i/440
 */

img {
    vertical-align: middle;
}

/*
 * Remove default fieldset styles.
 */

fieldset {
    border: 0;
    margin: 0;
    padding: 0;
}

/*
 * Allow only vertical resizing of textareas.
 */

textarea {
    resize: vertical;
}

/* ==========================================================================
   Chrome Frame prompt
   ========================================================================== */

.chromeframe {
    margin: 0.2em 0;
    background: #ccc;
    color: #000;
    padding: 0.2em 0;
}

/* ==========================================================================
   Author's custom styles
   ========================================================================== */

















/* ==========================================================================
   Helper classes
   ========================================================================== */

/*
 * Image replacement
 */

.ir {
    background-color: transparent;
    border: 0;
    overflow: hidden;
    /* IE 6/7 fallback */
    *text-indent: -9999px;
}

.ir:before {
    content: "";
    display: block;
    width: 0;
    height: 150%;
}

/*
 * Hide from both screenreaders and browsers: h5bp.com/u
 */

.hidden {
    display: none !important;
    visibility: hidden;
}

/*
 * Hide only visually, but have it available for screenreaders: h5bp.com/v
 */

.visuallyhidden {
    border: 0;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
}

/*
 * Extends the .visuallyhidden class to allow the element to be focusable
 * when navigated to via the keyboard: h5bp.com/p
 */

.visuallyhidden.focusable:active,
.visuallyhidden.focusable:focus {
    clip: auto;
    height: auto;
    margin: 0;
    overflow: visible;
    position: static;
    width: auto;
}

/*
 * Hide visually and from screenreaders, but maintain layout
 */

.invisible {
    visibility: hidden;
}

/*
 * Clearfix: contain floats
 *
 * For modern browsers
 * 1. The space content is one way to avoid an Opera bug when the
 *    `contenteditable` attribute is included anywhere else in the document.
 *    Otherwise it causes space to appear at the top and bottom of elements
 *    that receive the `clearfix` class.
 * 2. The use of `table` rather than `block` is only necessary if using
 *    `:before` to contain the top-margins of child elements.
 */

.clearfix:before,
.clearfix:after {
    content: " "; /* 1 */
    display: table; /* 2 */
}

.clearfix:after {
    clear: both;
}

/*
 * For IE 6/7 only
 * Include this rule to trigger hasLayout and contain floats.
 */

.clearfix {
    *zoom: 1;
}

/* ==========================================================================
   EXAMPLE Media Queries for Responsive Design.
   These examples override the primary ('mobile first') styles.
   Modify as content requires.
   ========================================================================== */

@media only screen and (min-width: 35em) {
    /* Style adjustments for viewports that meet the condition */
}

@media print,
       (-o-min-device-pixel-ratio: 5/4),
       (-webkit-min-device-pixel-ratio: 1.25),
       (min-resolution: 120dpi) {
    /* Style adjustments for high resolution devices */
}

/* ==========================================================================
   Print styles.
   Inlined to avoid required HTTP connection: h5bp.com/r
   ========================================================================== */

@media print {
    * {
        background: transparent !important;
        color: #000 !important; /* Black prints faster: h5bp.com/s */
        box-shadow: none !important;
        text-shadow: none !important;
    }

    a,
    a:visited {
        text-decoration: underline;
    }

    a[href]:after {
        content: " (" attr(href) ")";
    }

    abbr[title]:after {
        content: " (" attr(title) ")";
    }

    /*
     * Don't show links for images, or javascript/internal links
     */

    .ir a:after,
    a[href^="javascript:"]:after,
    a[href^="#"]:after {
        content: "";
    }

    pre,
    blockquote {
        border: 1px solid #999;
        page-break-inside: avoid;
    }

    thead {
        display: table-header-group; /* h5bp.com/t */
    }

    tr,
    img {
        page-break-inside: avoid;
    }

    img {
        max-width: 100% !important;
    }

    @page {
        margin: 0.5cm;
    }

    p,
    h2,
    h3 {
        orphans: 3;
        widows: 3;
    }

    h2,
    h3 {
        page-break-after: avoid;
    }
}
</style>