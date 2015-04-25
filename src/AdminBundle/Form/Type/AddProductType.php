<?php

namespace AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddProductType
 *
 * @author hoanvaidai
 */
class AddProductType extends AbstractType {

    public function getName() {
        return 'add_product';
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', 'text', array('label' => 'Tên sản phẩm:'));
        $builder->add('model', 'text', array('label' => 'Model:'));
        $builder->add('description', 'textarea', array('label' => 'Mô tả sản phẩm:'));
        $builder->add('price', 'text', array('label' => 'Giá sản phẩm:'));
        $builder->getForm();
    }

//put your code here
}
