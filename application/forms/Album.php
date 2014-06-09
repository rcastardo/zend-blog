<?php

class Application_Form_Album extends Zend_Form
{

    public function init()
    {
        $this->setName('Foto');

        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('Título')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addValidator('NotEmpty');

        $file = new Zend_Form_Element_File('arq');
        $file->setLabel('Escolha uma imagem:');
        // limite de tamanho
        $file->addValidator('Size', false, 2048000);
        // extensões: JPEG, PNG, GIFs
        $file->addValidator('Extension', false, 'jpg,png,gif');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Enviar');
        $submit->setName('submit');

        //exemplo de class css
        $this->addElements(array($title, $file, $submit));

        //action e method
        $this->setAction('/album')->setMethod('post');
        $this->setAttrib('enctype', 'multipart/form-data');
    }


}

