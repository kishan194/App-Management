<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApkUpload extends Model
{
    use HasFactory;

    public function appManage()
    {
        return $this->belongsTo(AppManage::class);
    }

    protected $fillable =[
            'app_id',
            'apk_path',
            'version_name',
            'release_notes'
    ];
}
