<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasNesting;
use A17\Twill\Models\Behaviors\HasRelated;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use A17\Twill\Models\Model;

class Product extends Model implements Sortable
{
    use HasSlug, HasMedias, HasPosition, HasFactory;
    use HasRelated, HasRevisions, HasNesting;

    protected $fillable = [
        'published',
        'title',
        'description',
        'position',
        'price'
    ];

    public $slugAttributes = [
        'title',
    ];

    public $casts = [
        'price' => 'integer'
    ];

    protected $relatedBrowsers = ['products'];

    public array $mediasParams = [
        'image' => [
            'default' => [
                [
                    'name' => 'default',
                ],
            ],
        ],
    ];

    public function getImageUrl()
    {
        return $this->image('image', 'default', ['fm' => 'png']);
    }
}
