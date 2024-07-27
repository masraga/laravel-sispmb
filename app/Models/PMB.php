<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PMB extends Model
{
  use HasFactory, SoftDeletes;

  protected $table = "pmb";

  protected $fillable = [
    "name",
    "date_start",
    "date_end",
    "fee"
  ];

  public function pmbStudies(): HasMany
  {
    return $this->hasMany(PMBStudies::class, "pmb_id");
  }
}
