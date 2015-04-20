<?php

namespace AdminBundle\Helpers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PaginatorHelper
 *
 * @author hoanvaidai
 */
class PaginatorHelper {

    //put your code here
    private $config = array();

    public function __construct() {
        $this->config['total_pages'] = 0;
        $this->config['display_pages'] = 5;
        $this->config['current_page'] = 1;
        $this->config['list_class'] = 'pagination';
        $this->config['list_item_class'] = 'paginate_button';
        $this->config['prev_class'] = 'previous';
        $this->config['next_class'] = 'next';
        $this->config['active_class'] = 'active';
        $this->config['disabled_class'] = 'disabled';
        $this->config['url'] = '';
    }

    public function config($config) {
        $this->config = $config;
    }

    public function render() {
        $paginatorComponent = '';
    }

    private function prevComponent() {
        $previewItem = '<li class="' . $this->config['list_item_class'] . $this->config['prev_class'] . '">';
    }

}
