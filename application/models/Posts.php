<?php

/**
 * Modelo da tabela posts
 */
class Application_Model_Posts extends Zend_Db_Table_Abstract
{
    protected $_name = 'posts';
    protected $_dependentTables = array('Comments');
}