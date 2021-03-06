<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         3.1.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\ORM\Locator;

use Cake\ORM\TableRegistry;

/**
 * Contains method for setting and accessing LocatorInterface instance
 */
trait LocatorAwareTrait
{
    /**
     * Table locator instance
     *
     * @var \Cake\ORM\Locator\LocatorInterface
     */
    protected $_tableLocator;

    /**
     * Sets the table locator.
     * If no parameters are passed, it will return the currently used locator.
     *
     * @param \Cake\ORM\Locator\LocatorInterface|null $tableLocator LocatorInterface instance.
     * @return \Cake\ORM\Locator\LocatorInterface
     * @deprecated 3.5.0 Use getTableLocator()/setTableLocator() instead.
     */
    public function tableLocator(LocatorInterface $tableLocator = null)
    {
        deprecationWarning(
            get_called_class() . '::tableLocator() is deprecated. ' .
            'Use getTableLocator()/setTableLocator() instead.'
        );
        if ($tableLocator !== null) {
            $this->setTableLocator($tableLocator);
        }

        return $this->getTableLocator();
    }

    /**
     * Sets the table locator.
     *
     * @param \Cake\ORM\Locator\LocatorInterface $tableLocator LocatorInterface instance.
     * @return $this
     */
    public function setTableLocator(LocatorInterface $tableLocator)
    {
        $this->_tableLocator = $tableLocator;

        return $this;
    }

    /**
     * Gets the table locator.
     *
     * @return \Cake\ORM\Locator\LocatorInterface
     */
    public function getTableLocator()
    {
        if ($this->_tableLocator === null) {
            $this->_tableLocator = TableRegistry::getTableLocator();
        }

        return $this->_tableLocator;
    }
}
