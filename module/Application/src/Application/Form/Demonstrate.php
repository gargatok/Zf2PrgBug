<?php
/**
 * Created by PhpStorm.
 * User: Gergely Muranyi
 * Date: 29/04/2015
 * Time: 12:09
 */

namespace Application\Form;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

class Demonstrate extends Form implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('Demonstrate');


        $this   ->setAttribute('method','post')
                ->setAttribute('class' ,'form-horizontal' )
                ->setAttribute('enctype','multipart/form-data');

        $this->add([
            'name' => 'demonstrate',
            'type' => 'text',
            'options' => [
                'label' => 'Demonstration field, min 6 chars validation',
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'button',
            'attributes' => [
                'type' => 'submit',
                'required' => 'false'
            ],
            'options' => [
                'label' => 'submit'
            ]
        ]);
    }

    public function getInputFilterSpecification()
    {
        return
        [
            [
                'name' => 'demonstrate',
                'filters' => [
                    [
                        'name' => 'StripTags'
                    ],
                    [
                        'name' => 'StringTrim'
                    ]
                ],
                'validators' => [
                    [
                        'name' => 'StringLength',
                        'options' => [
                            'min' => 6,
                        ]
                    ]
                ]
            ]
        ];
    }
}