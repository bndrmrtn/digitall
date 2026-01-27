<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

class ContactController extends BaseModuleController
{
    protected $moduleName = 'contacts';

    protected function setUpController(): void
    {
        $this->disablePermalink();
        $this->disableCreate();
        $this->disablePublish();
        $this->titleColumnKey = 'subject';
    }

    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(
            Input::make()->name('name')->label('Name')->readOnly()
        );

        $form->add(
            Input::make()->name('email')->label('Email')->readOnly()
        );

        $form->add(
            Input::make()->name('subject')->label('Subject')->readOnly()
        );

        $form->add(
            Input::make()->name('subject')->label('Subject')->readOnly(),
        );

        return $form;
    }
}
