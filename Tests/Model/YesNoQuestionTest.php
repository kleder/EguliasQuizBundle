<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Egulias\QuizBundle\Tests\Model;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase,
    Egulias\QuizBundle\Model\Quizes\Poll,
    Egulias\QuizBundle\Model\Questions\YesNoQuestion,
    Egulias\QuizBundle\Model\Questions\Question
;

class YesNoQuestionTest extends WebTestCase
{

    public function testYesNoQuestionText()
    {
        $q = new YesNoQuestion();
        $q->setText('The Question');
        $this->assertEquals('The Question', $q->getText());
    }

}