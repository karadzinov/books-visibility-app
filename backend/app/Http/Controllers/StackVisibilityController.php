<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StackVisibilityService;
use App\Models\Calculation;

class StackVisibilityController extends Controller
{
    protected StackVisibilityService $visibilityService;

    public function __construct(StackVisibilityService $visibilityService)
    {
        $this->visibilityService = $visibilityService;
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'matrix' => 'required|array',
            'matrix.*' => 'required|array',
            'matrix.*.*' => 'required|integer|min:0|max:1000',
        ]);

        $matrix = $validated['matrix'];
        $n = count($matrix);

        foreach ($matrix as $row) {
            if (count($row) !== $n) {
                return response()->json(['error' => 'Matrix must be square NxN'], 422);
            }
        }

        $visibleCount = $this->visibilityService->countVisibleStacks($matrix);

        $calculation = Calculation::create([
            'input_matrix' => $matrix,    // Pass array directly
            'visible_count' => $visibleCount,
        ]);

        return response()->json([
            'id' => $calculation->id,
            'visible_count' => $visibleCount,
            'created_at' => $calculation->created_at,
        ]);
    }

    public function history()
    {
        $calculations = Calculation::orderBy('created_at', 'asc')->get();

        return response()->json($calculations);
    }
}
