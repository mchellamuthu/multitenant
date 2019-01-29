<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $connection = "tenant";
    protected $fillable = ['title','body'];


}
