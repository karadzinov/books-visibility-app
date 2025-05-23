<?php

namespace App\Services;

class StackVisibilityService
{
    /**
     * Count the number of visible stacks in the given matrix.
     *
     * @param array $matrix NxN matrix of stack heights
     * @return int Number of visible stacks
     */
    public function countVisibleStacks(array $matrix): int
    {
        $n = count($matrix);
        $visiblePositions = [];

        // From Left to Right
        for ($row = 0; $row < $n; $row++) {
            $maxHeight = -1;
            for ($col = 0; $col < $n; $col++) {
                if ($matrix[$row][$col] > $maxHeight) {
                    $maxHeight = $matrix[$row][$col];
                    if ($maxHeight > 0) {
                        $visiblePositions["$row-$col"] = true;
                    }
                }
            }
        }

        // From Right to Left
        for ($row = 0; $row < $n; $row++) {
            $maxHeight = -1;
            for ($col = $n - 1; $col >= 0; $col--) {
                if ($matrix[$row][$col] > $maxHeight) {
                    $maxHeight = $matrix[$row][$col];
                    if ($maxHeight > 0) {
                        $visiblePositions["$row-$col"] = true;
                    }
                }
            }
        }

        // From Top to Bottom
        for ($col = 0; $col < $n; $col++) {
            $maxHeight = -1;
            for ($row = 0; $row < $n; $row++) {
                if ($matrix[$row][$col] > $maxHeight) {
                    $maxHeight = $matrix[$row][$col];
                    if ($maxHeight > 0) {
                        $visiblePositions["$row-$col"] = true;
                    }
                }
            }
        }

        // From Bottom to Top
        for ($col = 0; $col < $n; $col++) {
            $maxHeight = -1;
            for ($row = $n - 1; $row >= 0; $row--) {
                if ($matrix[$row][$col] > $maxHeight) {
                    $maxHeight = $matrix[$row][$col];
                    if ($maxHeight > 0) {
                        $visiblePositions["$row-$col"] = true;
                    }
                }
            }
        }

        return count($visiblePositions);
    }
}
