<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ApkUpload;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppManage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected  $fillable = [
                 'name',
                 'description',
                 'logo',
                 'image',
                 'PackageName',
                 'meta_keywords',
                 'meta_description',
                 'publish_status'
    ];
    protected $dateFormat = 'Y-m-d H:i:s';
    public function apkUpload()
    {
        return $this->hasMany(ApkUpload::class,'apk_path');
    }
}
