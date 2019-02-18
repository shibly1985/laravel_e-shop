<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable=['subCategoryName','categoryId','subCategoryDescription','publicationStatus'];
}
