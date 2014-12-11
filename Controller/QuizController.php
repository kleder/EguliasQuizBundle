<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class QuizController extends Controller
{
    /**
     * Quizes to be done!
     * @Route("/take/quiz/{id}",requirements={"id" = "\d+"} ,name="egulias_quiz_take")
     */
    public function takeQuizAction($id)
    {
        $form = $this->get('egulias.take.quiz')->takeQuiz($id);
        return $this->render('EguliasQuizBundle:Quiz:take_quiz.html.twig', array('quizForm' => $form->createView(),
            'quiz' => $form->getData()));
    }

    /**
     * Quizes responses
     * @Route("/quiz/{id}/response",requirements={"id" = "\d+"} , name="egulias_quiz_save_response")
     */
    public function saveResponseAction($id)
    {

        if(!$form = $this->get('egulias.take.quiz')->responseQuiz($id)) {
            return $this->render('EguliasQuizBundle:Quiz:take_quiz.html.twig', array('quizForm' => $form->createView(),
                'quiz' => $form->getData()));
        }
        return $this->redirect($this->generateUrl('egulias_quiz_panel'));
    }
}

