<?php

require (__DIR__ . '/vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;

class HelloWorld
{
    public function sayHello($isCaps, $bNotify = true)
    {
        $text = ($isCaps) ? 'HELLO WORLD!' : 'Hello World!';

        $xResponse = new Response();
        $xResponse->assign('div2', 'innerHTML', $text);
        if(($bNotify))
            $xResponse->dialog->success("div2 text is now $text");

        return $xResponse;
    }

    public function setColor($sColor, $bNotify = true)
    {
        $xResponse = new Response();
        $xResponse->assign('div2', 'style.color', $sColor);
        if(($bNotify))
            $xResponse->dialog->success("div2 color is now $sColor");
        
        return $xResponse;
    }

    public function showDialog()
    {
        $xResponse = new Response();
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $options = array('width' => 500);
        $xResponse->dialog->modal("Modal Dialog", "This modal dialog is powered by PgwJs!!", $buttons, $options);
        
        return $xResponse;
    }
}

// Register object
$jaxon = jaxon();

$jaxon->readConfigFile(__DIR__ . '/config/config.yaml', 'jaxon');

$jaxon->register(Jaxon::CALLABLE_OBJECT, new HelloWorld());

// Process the request, if any.
$jaxon->processRequest();

require(__DIR__ . '/includes/header.php')
?>

    <div class="container-fluid">
        <div class="row">
<?php require(__DIR__ . '/includes/nav.php') ?>
            <div class="col-sm-9 content">
                <h3 class="page-header">Hello World Function</h3>

                <div class="row" id="jaxon-html">
                        <div class="col-md-12" id="div2">
                            &nbsp;
                        </div>
                        <div class="col-md-4 margin-vert-10">
                            <select class="form-control" id="colorselect" name="colorselect"
                                    onchange="<?php echo rq()->call('HelloWorld.setColor', rq()->select('colorselect')) ?>; return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick="<?php echo rq()->call('HelloWorld.sayHello', 1) ?>; return false;" >CLICK ME</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo rq()->call('HelloWorld.sayHello', 0) ?>; return false;" >Click Me</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo rq()->call('HelloWorld.showDialog') ?>; return false;" >Show Dialog</button>
                        </div>

                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<div id="jaxon-init">
<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        // Call the HelloWorld class to populate the 2nd div
        <?php echo rq()->call('HelloWorld.sayHello', 0, false) ?>;
        // call the HelloWorld->setColor() method on load
        <?php echo rq()->call('HelloWorld.setColor', rq()->select('colorselect'), false) ?>;
    }
    /* ]]> */
</script>
</div>

<?php require(__DIR__ . '/includes/footer.php') ?>
