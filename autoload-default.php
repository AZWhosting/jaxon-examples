<?php

require (__DIR__ . '/vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;

$jaxon = Jaxon::getInstance();

// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', '');

$jaxon->setOption('toastr.options.closeButton', true);
$jaxon->setOption('toastr.options.positionClass', 'toast-bottom-right');

// Add class dirs with namespaces
$jaxon->addClassDir(__DIR__ . '/classes/namespace/app', 'App');
$jaxon->addClassDir(__DIR__ . '/classes/namespace/ext', 'Ext');

// Check if there is a request.
if($jaxon->canProcessRequest())
{
    // When processing a request, the required class will be autoloaded
    $jaxon->processRequest();
}
else
{
    // The Jaxon objects are registered only when the page is loaded
    $jaxon->registerClasses();
}

?>
<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        // call the helloWorld function to populate the div on load
        App.Test.Test.sayHello(0);
        // call the setColor function on load
        App.Test.Test.setColor(jaxon.$('colorselect1').value);
        // Call the HelloWorld class to populate the 2nd div
        Ext.Test.Test.sayHello(0);
        // call the HelloWorld->setColor() method on load
        Ext.Test.Test.setColor(jaxon.$('colorselect2').value);
    }
    /* ]]> */
</script>
                        <div style="margin:10px;" id="div1">
                            &nbsp;
                        </div>
                        <div class="medium-4 columns">
                            <select class="form-control" id="colorselect1" name="colorselect1"
                                    onchange="App.Test.Test.setColor(jaxon.$('colorselect1').value); return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="medium-8 columns">
                            <button class="button radius" onclick='App.Test.Test.sayHello(0); return false;' >Click Me</button>
                            <button class="button radius" onclick='App.Test.Test.sayHello(1); return false;' >CLICK ME</button>
                            <button class="button radius" onclick="App.Test.Test.showDialog(); return false;" >PgwModal Dialog</button>
                        </div>

                        <div style="margin:10px;" id="div2">
                            &nbsp;
                        </div>
                        <div class="medium-4 columns">
                            <select class="form-control" id="colorselect2" name="colorselect2"
                                    onchange="Ext.Test.Test.setColor(jaxon.$('colorselect2').value); return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="medium-8 columns">
                            <button class="button radius" onclick="Ext.Test.Test.sayHello(0); return false;" >Click Me</button>
                            <button class="button radius" onclick="Ext.Test.Test.sayHello(1); return false;" >CLICK ME</button>
                            <button class="button radius" onclick="Ext.Test.Test.showDialog(); return false;" >Bootstrap Dialog</button>
                        </div>
