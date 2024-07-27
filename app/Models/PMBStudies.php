<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PMBStudies extends Model
{
  use HasFactory;

  protected $table = "pmb_studies";

  protected $fillable = [
    "pmb_id",
    "studies_id"
  ];

  public function pmb(): BelongsTo
  {
    return $this->belongsTo(PMB::class);
  }

  public function study(): BelongsTo
  {
    return $this->belongsTo(Studies::class, "studies_id");
  }
}
