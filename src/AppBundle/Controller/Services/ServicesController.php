<?php
/**
 * Created by PhpStorm.
 * User: Yaron Lambers
 * Date: 17-Dec-18
 * Time: 14:16
 */

namespace AppBundle\Controller\Services;


use AppBundle\Entity\Answer;
use AppBundle\Entity\Topic;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ServicesController
 * @package AppBundle\Controller\Services
 */
class ServicesController extends Controller
{

    /**
     * @param Topic $question
     * @return int
     *
     * Counts gives votes for answers
     */
    public function getAnswerVotes(Answer $answer)
    {
        $em = $this->getDoctrine()->getManager();
        $rating = $em->getRepository('AppBundle:Rating')->findBy(['answer' => $answer]);

        $total = 0;

        foreach ($rating as $votes){
            $total += $votes->getVote();
        }

        return $total;
    }


    /**
     * @param Topic $question
     * @return int
     *
     * Counts gives votes for answers
     */
    public function getTopicVotes(Topic $topic)
    {
        $em = $this->getDoctrine()->getManager();

        $rating = $em->getRepository('AppBundle:Rating')->findBy(['topic' => $topic]);

        $total = 0;

        foreach ($rating as $votes){
            $total += $votes->getVote();
        }

        return $total;
    }
}