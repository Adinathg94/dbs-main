<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class SocialLink extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'social_links';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'url',
        'date',
        'title',
        'platform',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const PLATFORM_SELECT = [
        '1' => 'Facebook',
        '0' => 'Youtube',
        '2' => 'Instagram',
        '4' => 'Twitter',
    ];

    public function getimageAttribute()
    {
        $file = $this->getMedia('image')->last();

        if ($file) {
            $file->url = $file->getUrl();
        }

        return $file;
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
