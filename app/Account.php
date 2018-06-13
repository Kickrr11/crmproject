<?php

namespace App;

use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\LogsActivityInterface;

class Account extends Model implements LogsActivityInterface
{
    use LogsActivity;
    use ElasticquentTrait;

    protected $table = 'account';
    protected $fillable = [
        'name', 'description', 'street', 'city', 'country', 'zip', 'phone',
    ];

    protected $indexSettings = [
        'analysis' => [
            'char_filter' => [
                'replace' => [
                    'type'     => 'mapping',
                    'mappings' => [
                        '&=> and ',
                    ],
                ],
            ],
            'filter' => [
                'word_delimiter' => [
                    'type'                  => 'word_delimiter',
                    'split_on_numerics'     => false,
                    'split_on_case_change'  => true,
                    'generate_word_parts'   => true,
                    'generate_number_parts' => true,
                    'catenate_all'          => true,
                    'preserve_original'     => true,
                    'catenate_numbers'      => true,
                ],
            ],
            'analyzer' => [
                'autocomplete' => [
                    'type'        => 'standard',
                    'char_filter' => [
                        'html_strip',
                        'replace',
                    ],
                    'tokenizer' => 'whitespace',
                    'filter'    => [
                        'standard', 'lowercase', 'stop', 'kstem', 'ngram',
                    ],
                ],
            ],
        ],
    ];

    public function countries()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }

    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }

    public function notes()
    {
        return $this->hasMany('App\Note', 'account_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getActivityDescriptionForEvent($eventName)
    {
        if ($eventName == 'created') {
            return 'Account "'.$this->name.'" was created';
        }

        if ($eventName == 'updated') {
            return 'Account "'.$this->name.'" was updated';
        }

        if ($eventName == 'deleted') {
            return 'Account "'.$this->name.'" was deleted';
        }

        return '';
    }
}
