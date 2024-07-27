<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Faculties extends Model
{
  use HasFactory;

  protected $fillable = [
    "name"
  ];

  public function study(): HasMany
  {
    return $this->hasMany(Studies::class, "faculty_id");
  }
}
