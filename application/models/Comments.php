<?php

/**
 * Modelo da tabela comments
 */
class Application_Model_Comments extends Zend_Db_Table_Abstract
{
    protected $_name = 'comments';
    protected $_referenceMap = array(
        'Post' => array (
            'columns' => array('post_id'),
            'refTableClass' => 'Posts',
            'refColumns' => array('id')
        )
    );
}