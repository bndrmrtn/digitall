<?php

namespace App\Http\Controllers\Twill\Traits;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\Browser;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use App\Models\Product;

trait HasProductForm {
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(Input::make()->name('title')->label('Felirat')->required());
        $form->add(Wysiwyg::make()->name('description')->label('Leírás')->required());
        $form->add(Medias::make()->name('image')->label('Kép')->max(4)->required());
        $form->add(
            Browser::make()->name('products')->label('Kapcsolódó termékek')
                ->modules([Product::class])->max(5)
        );

        return $form;
    }
}
