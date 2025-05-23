<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    protected $fillable = ['input_matrix', 'result', 'visible_count'];

    protected $casts = [
        'input_matrix' => 'array',
        'result' => 'integer',
    ];

    /**
     * Calculate the visible count based on the input matrix.
     *
     * @param array $matrix
     * @return int
     */
    public static function calculateVisibleCount(array $matrix): int
    {
        $visibleCount = 0;
        foreach ($matrix as $row) {
            $maxSoFar = -INF;
            foreach ($row as $height) {
                if ($height > $maxSoFar) {
                    $visibleCount++;
                    $maxSoFar = $height;
                }
            }
        }
        return $visibleCount;
    }
}
