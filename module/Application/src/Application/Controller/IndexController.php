<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\Demonstrate as Form;
use Application\Entity\Demonstrate as Entity;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Http\PhpEnvironment\Response;

class IndexController extends AbstractActionController
{
    public function prgAction()
    {
        $form = new Form();
        $entity = new Entity();
        $hydrator = new ClassMethods();
        $form->setHydrator($hydrator)->bind($entity);

        $prg = $this->prg();

        if ($prg instanceof Response) {
            return $prg;
        } elseif ($prg === false) {
            return ['form' => $form];
        }

        $form->setData($prg);

        if (!$form->isValid()) {
            //form validation fails, form has to be returned with data prefilled from previous request + validation errors
            return ['form' => $form];
        }

        echo "Form passed validation, thank you"; die();
    }

    public function postAction()
    {
        $form = new Form();
        $entity = new Entity();
        $hydrator = new ClassMethods();
        $form->setHydrator($hydrator)->bind($entity);

        if (!$this->getRequest()->isPost()) {
            return ['form' => $form];
        }

        $form->setData($this->getRequest()->getPost());
        if (!$form->isValid()) {
            //form validation fails, form has to be returned with data prefilled from previous request + validation errors
            return ['form' => $form];
        }

        echo "Form passed validation, thank you"; die();
    }
}
