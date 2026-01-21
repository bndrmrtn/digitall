<?php

namespace App\Http\Controllers\Twill;


use A17\Twill\Http\Controllers\Admin\NestedModuleController as BaseModuleController;
use App\Http\Controllers\Twill\Traits\HasProductForm;

class ProductController extends BaseModuleController
{
    use HasProductForm;

    protected $moduleName = 'products';
    protected $nestedItemsDepth = 0; // disable nesting

    protected function setUpController(): void
    {
        $this->enableReorder();
        $this->disablePermalink();
        $this->disableEditor();
    }
}
