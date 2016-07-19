<?php

namespace App\Test;

use Jaxon\Response\Response;
use Jaxon\Request\Factory as xr;

class Test
{
    use \Jaxon\Request\FactoryTrait;
    use \Jaxon\Response\FactoryTrait;

    public function sayHello($isCaps, $bNotify = true)
    {
        if ($isCaps)
            $text = 'HELLO WORLD!';
        else
            $text = 'Hello World!';
    
        $this->response->assign('div1', 'innerHTML', $text);
        if(($bNotify))
            $this->response->toastr->success("div1 text is now $text");
    
        return $this->response;
    }
    
    public function setColor($sColor, $bNotify = true)
    {
        $this->response->assign('div1', 'style.color', $sColor);
        if(($bNotify))
            $this->response->toastr->success("div1 color is now $sColor");
    
        return $this->response;
    }
    
    public function showDialog()
    {
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $options = array('maxWidth' => 400);
        $this->response->pgw->modal("Modal Dialog", "This modal dialog is powered by PgwModal!!", $buttons, $options);
    
        return $this->response;
    }
}
