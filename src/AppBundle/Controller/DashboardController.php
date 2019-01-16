<?php
/**
 * Created by PhpStorm.
 * User: Yaron Lambers
 * Date: 06-Dec-18
 * Time: 12:12
 */

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 *
 * @Route("/dashboard")
 */
class DashboardController extends Controller
{
    /**
     * @Route("/home", name="dashboard_home")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $topics = $em->getRepository('AppBundle:Topic')->findBy([],['id' => 'DESC'], 10);

        return $this->render(':dashboard/admin:index.html.twig', [
            'topics' => $topics
        ]);
    }
}