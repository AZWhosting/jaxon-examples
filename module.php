<?php

require (__DIR__ . '/vendor/autoload.php');

$jaxon = jaxon()->module();
$jaxon->config(__DIR__ . '/module/config/jaxon.php');
$jaxon->addTemplateNamespace('module', __DIR__ . '/module/views', true, '.tpl');

session_start();
if($jaxon->canProcessRequest())
{
    // Process the request
    $jaxon->processRequest();
}
else
{
    $_SESSION['DialogTitle'] = 'Yeah Man!!';
    // Register the classes
    $jaxon->register();
}

// Jaxon request to the Jaxon\App\Test\Bts controller
$bts = $jaxon->controller('Jaxon.App.Test.Bts')->rq();
// Jaxon request to the Jaxon\App\Test\Pgw controller
$pgw = $jaxon->controller('Jaxon.App.Test.Pgw')->rq();
// Jaxon Request Factory
$jxn = new \Jaxon\Request\Factory;

require(__DIR__ . '/includes/header.php')
?>

    <div class="container-fluid">
        <div class="row">
<?php require(__DIR__ . '/includes/nav.php') ?>
            <div class="col-sm-9 content">
                <h3 class="page-header">Hello World Function</h3>

                <div class="row" id="jaxon-html">
                        <div class="col-md-12" id="div1">
                            &nbsp;
                        </div>
                        <div class="col-md-4 margin-vert-10">
                            <select class="form-control" id="colorselect1" name="colorselect1"
                                    onchange="<?php echo $pgw->setColor($jxn->select('colorselect1')) ?>; return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick='<?php echo $pgw->sayHello(1) ?>; return false;' >CLICK ME</button>
                            <button type="button" class="btn btn-primary" onclick='<?php echo $pgw->sayHello(0) ?>; return false;' >Click Me</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo $pgw->showDialog() ?>; return false;" >PgwModal Dialog</button>
                        </div>

                        <div class="col-md-12" id="div2">
                            &nbsp;
                        </div>
                        <div class="col-md-4 margin-vert-10">
                            <select class="form-control" id="colorselect2" name="colorselect2"
                                    onchange="<?php echo $bts->setColor($jxn->select('colorselect2')) ?>; return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick='<?php echo $bts->sayHello(1) ?>; return false;' >CLICK ME</button>
                            <button type="button" class="btn btn-primary" onclick='<?php echo $bts->sayHello(0) ?>; return false;' >Click Me</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo $bts->showDialog() ?>; return false;" >Bootstrap Dialog</button>
                        </div>

                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<div id="jaxon-init">
<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        // call the helloWorld function to populate the div on load
    	<?php echo $pgw->sayHello(0, false) ?>;
        // call the setColor function on load
        <?php echo $pgw->setColor($jxn->select('colorselect1'), false) ?>;
        // Call the HelloWorld class to populate the 2nd div
        <?php echo $bts->sayHello(0, false) ?>;
        // call the HelloWorld->setColor() method on load
        <?php echo $bts->setColor($jxn->select('colorselect2'), false) ?>;
    }
    /* ]]> */
</script>
</div>

<?php require(__DIR__ . '/includes/footer.php') ?>
