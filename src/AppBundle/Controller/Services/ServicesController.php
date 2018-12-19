<?php
/**
 * Created by PhpStorm.
 * User: Yaron Lambers
 * Date: 17-Dec-18
 * Time: 14:16
 */

namespace AppBundle\Controller\Services;


use AppBundle\Entity\Answer;
use AppBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ServicesController
 * @package AppBundle\Controller\Services
 */
class ServicesController extends Controller
{

    /**
     * @param Question $question
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
     * @param Question $question
     * @return int
     *
     * Counts gives votes for answers
     */
    public function getQuestionVotes(Question $question)
    {
        $em = $this->getDoctrine()->getManager();

        $rating = $em->getRepository('AppBundle:Rating')->findBy(['question' => $question]);

        $total = 0;

        foreach ($rating as $votes){
            $total += $votes->getVote();
        }

        return $total;
    }
}