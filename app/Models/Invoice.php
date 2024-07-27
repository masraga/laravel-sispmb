<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
  use HasFactory;

  protected $table = "invoices";

  protected $fillable = [
    "paymentStatus",
    "fee",
    "code",
    "payment_url",
    "expired_at",
    "p_m_b_studies_id",
    "students_id",
  ];

  public function student(): BelongsTo
  {
    return $this->belongsTo(Students::class, "students_id");
  }

  public function pmbStudy(): BelongsTo
  {
    return $this->belongsTo(PMBStudies::class, "p_m_b_studies_id");
  }
}
