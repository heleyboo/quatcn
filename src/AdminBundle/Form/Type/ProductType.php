<?php

namespace AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'text', array('label' => 'Tên sản phẩm:'))
                ->add('model', 'text', array('label' => 'Model:'))
                ->add('description', 'textarea', array('label' => 'Mô tả:'))
                ->add('price', 'text', array('label' => 'Giá:'))
                ->add('slug', 'text', array('label' => 'Slug:'))
                ->add('image', 'text', array('label' => 'Hình ảnh:'))
                ->add('category', 'entity', array(
                    'class' => 'AdminBundle:Category',
                    'property' => 'name',
                    'label' => 'Danh mục:'
                ))
                ->add('save', 'submit', array('label' => 'Thêm sản phẩm'));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'adminbundle_product';
    }

}
