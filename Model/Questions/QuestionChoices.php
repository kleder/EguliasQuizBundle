<?php

namespace Egulias\QuizBundle\Model\Questions;

use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionChoices
 *
 * @uses ChoiceListInterface
 * @abstract
 * @package QuizBundle
 * @subpackage Model
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
abstract class QuestionChoices implements ChoiceListInterface
{

    /**
     * @ORM\Column(type="array")
     */
    protected $choices = array();

    /**
     * @ORM\Column(type="array")
     */
    protected $config = array('type' => 'radio');

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getChoices()
    {
        $choices = $this->choices;
        $ch = array();
        foreach ($choices as $key => $choice) {
            $ch[$choice['value']] = $choice['label'];
        }
        return $ch;

    }

    public function setChoices(array $choices)
    {
        if (!is_array($choices)) {
            throw new \InvalidArgumentException;
        }

        $this->choices = $choices;
        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig($config)
    {
        $this->config = array('type' => $config);
        return $this;
    }

    public function getType()
    {
        $config = $this->getConfig();
        return $config['type'];
    }
    
    public function getChoicesForValues(array $values) {
        $ch = array();
        foreach ($this->choices as $choice){
            if (in_array($choice['value'], $values)) {
                $ch[] = $choice;
            }
        }
        return $ch;
    }

    /**
     * @deprecated Deprecated since symfony 2.4, to be removed in 3.0.
     */
    public function getIndicesForChoices(array $choices) {
        return $choices;
    }

     /**
     * @deprecated Deprecated since symfony 2.4, to be removed in 3.0.
     */
    public function getIndicesForValues(array $values) {
        return $values;
    }

    public function getPreferredViews() {
        return array();
    }

    public function getRemainingViews() {
        return array();
    }

    public function getValues() {
        $values = array();
        foreach ($this->choices as $choice){
            $values[]=$choice['value'];
        }
        return $values;
    }

    public function getValuesForChoices(array $choices) {
        $values = array();
        foreach ($choices as $choice){
            $values[]=$choice['value'];
        }
        return $values;
    }

}
