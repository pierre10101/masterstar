<?php

namespace App\Http\Controllers;

use App\Contracts\RepositoryFactoryInterface;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

use Exception;
use TypeError;

class RepositoryController extends Controller
{
    protected $repository;

    function __construct(RepositoryFactoryInterface $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * Index method to indicate root of Controller. To receive and handle request based on business logic
     *
     * @return View | JsonResponse
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface If an error happens while processing the request.
     */
    public function index(Request $request, string|null $type = null): View|JsonResponse
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
            ], 400); //general error, issue client side
        }
    }
}
