<?php

class Application_Form_Post extends Zend_Form
{

    public function init()
    {
        $this->setName('Post');

        $id = new Zend_Form_Element_Hidden('id');

        $titulo = new Zend_Form_Element_Text('title');
        $titulo->setLabel('Título')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addValidator('NotEmpty');

        $texto = new Zend_Form_Element_Textarea('description');
        $texto->setAttrib('rows', '20');
        $texto->setAttrib('cols', '100');
        $texto->setLabel('Texto')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addValidator('NotEmpty');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Adicionar')
            ->setIgnore(true);

        $this->addElements(array($id, $titulo, $texto, $submit));

        //action e method
        $this->setAction('/post/create')->setMethod('post');
    }



}

