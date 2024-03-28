<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AppManage;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApkUpload extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'app_id',
        'apk_path',
        'version_name',
        'release_notes'
];
protected $dateFormat = 'Y-m-d H:i:s';

    public function appManage()
    {
        return $this->belongsTo(AppManage::class, 'app_id');
    }

   
}
