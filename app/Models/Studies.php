<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Studies extends Model
{
  use HasFactory;

  protected $fillable = [
    "faculty_id",
    "name"
  ];

  public function faculty(): BelongsTo
  {
    return $this->belongsTo(Faculties::class);
  }

  public function pmbStudy(): HasMany
  {
    return $this->hasMany(PMBStudies::class);
  }
}
