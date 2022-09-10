<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\RepositoryFactoryInterface;
use Exception;
use TypeError;

class RepositoryController extends Controller
{
    protected $repository;

    function __construct(RepositoryFactoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request, $type = null)
    {
        try {
            return view('pages.home', [
                'provider' => $this->repository->make($type ?? $request->input('type'))?->getPopularRepositories(),
                'source' => $type ?? $request->input('type')
            ]);
        } catch (Exception | TypeError $exception) {
            // simulate logging to sentry or other platforms.
            return response()->json([
                'message' => $exception->getMessage()
            ],400);//general error, issue client side
        }
    }
}
