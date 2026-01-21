<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleRelatedBrowsers;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Product;

class ProductRepository extends ModuleRepository
{
    use HandleSlugs, HandleMedias, HandleRevisions;

    protected $relatedBrowsers = ['products'];

    public function __construct(Product $model)
    {
        $this->model = $model;
    }
}
