<?php

namespace AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of AddCategoryType
 *
 * @author hoanvaidai
 */
class AddCategoryType extends AbstractType {

    public function getName() {
        return 'add_category';
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', 'text', array('label' => 'Tên danh mục:'));
        $builder->add('slug', 'text', array('label' => 'Slug:'));
        $builder->add('description', 'textarea', array('label' => 'Mô tả danh mục:'));
        $builder->add('save', 'submit', array('label' => 'Thêm danh mục'));
        $builder->getForm();
    }

}
