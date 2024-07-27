<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Students extends Model
{
  use HasFactory;

  protected $table = "Students";

  protected $fillable = [
    "code",
    "name",
    "gender",
    "school_origin",
    "address",
    "user_id"
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, "user_id");
  }
}
