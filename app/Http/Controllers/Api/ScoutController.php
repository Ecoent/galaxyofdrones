<?php

namespace Koodilab\Http\Controllers\Api;

use Koodilab\Http\Controllers\Controller;
use Koodilab\Models\Building;
use Koodilab\Models\Grid;
use Koodilab\Transformers\ScoutTransformer;

class ScoutController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('verified');
        $this->middleware('player');
    }

    /**
     * Show the scout in json format.
     *
     * @param ScoutTransformer $transformer
     * @param Grid             $grid
     *
     * @throws \Exception|\Throwable
     *
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function index(Grid $grid, ScoutTransformer $transformer)
    {
        $this->authorize('friendly', $grid->planet);
        $this->authorize('building', [$grid->building, Building::TYPE_SCOUT]);

        return $transformer->transform($grid);
    }
}
