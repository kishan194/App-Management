<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AppManage;

class ApkUpload extends Model
{
    use HasFactory;
    protected $fillable =[
        'app_id',
        'apk_path',
        'version_name',
        'release_notes'
];

    public function appManage()
    {
        return $this->belongsTo(AppManage::class, 'app_id');
    }

   
}
