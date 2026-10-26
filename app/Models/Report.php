<?php

namespace App\Models;

use Database\Factories\ReportFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'title', 'category', 'description', 'status'])]
class Report extends Model
{
    /** @use HasFactory<ReportFactory> */
    use HasFactory;

    /**
     * Get the user that submitted the report.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get human readable category label.
     */
    public function getCategoryLabelAttribute(): string
    {
        return match ($this->category) {
            'bug' => 'Kendala / Bug Teknis',
            'layanan' => 'Keluhan Layanan',
            'saran' => 'Saran & Masukan',
            default => 'Lainnya',
        };
    }

    /**
     * Get status badge styling config.
     */
    public function getStatusBadgeAttribute(): array
    {
        return match ($this->status) {
            'diproses' => [
                'label' => 'Sedang Diproses',
                'bg' => 'bg-indigo-500/10 text-indigo-400 border-indigo-500/20',
            ],
            'selesai' => [
                'label' => 'Selesai Ditangani',
                'bg' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20',
            ],
            default => [
                'label' => 'Menunggu Tindak Lanjut',
                'bg' => 'bg-amber-500/10 text-amber-400 border-amber-500/20',
            ],
        };
    }
}
