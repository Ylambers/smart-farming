<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Assortment controller.
 *
 * @Route("/")
 */
class DefaultController extends Controller
{

    /**
     *
     * @Route("/", name="assortment_admin_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig');
    }

    public function homeAction()
    {
        return $this->redirect($this->generateUrl('home'));
    }
}
