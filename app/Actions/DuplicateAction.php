<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class DuplicateAction extends AbstractAction
{
    public function getTitle()
    {
        // Action title which display in button based on current status
        return 'Дублировать';
    }

    public function getIcon()
    {
        // Action icon which display in left of button based on current status
        return 'voyager-documentation';
    }

    public function getAttributes()
    {
        // Action button class
        return [
            'class' => 'btn btn-sm btn-success pull-right',
            'style' => 'margin-right:5px;хрх'
        ];
    }

    public function shouldActionDisplayOnDataType()
    {
        // show or hide the action button, in this case will show for posts model
        return $this->dataType->slug == 'products';
    }

    public function getDefaultRoute()
    {
        // URL for action button when click
        return route('product.copy', array("id" => $this->data->{$this->data->getKeyName()}));
    }
}
