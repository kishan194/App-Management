<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ApkUpload;

class AppManage extends Model
{
    use HasFactory;

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
    public function apkUpload()
    {
        return $this->hasMany(ApkUpload::class,'apk_path');
    }
}
