<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DemoController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // Register the Jaxon classes
        $jaxon = $this->get('jaxon.ajax');
        $jaxon->register();
        // Print the page
        return $this->render('demo/index.html.twig', [
            'jaxon_css' => $jaxon->css(),
            'jaxon_js' => $jaxon->js(),
            'jaxon_script' => $jaxon->script()
        ]);
    }
}
