<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesRepRequest;
use App\Models\Route;
use App\Models\SalesRep;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SalesRepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $salesRep = SalesRep::with('route')->get();

        $data = [
            'salesRep' => $salesRep
        ];

        return view('salesrep.index', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(SalesRepRequest $request)
    {


        SalesRep::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'route_id' => $request->input('route_id'),
            'joined_date' => $request->input('joined_date'),
            'comments' => $request->input('comments')

        ]);
        return back()->with('success', 'Record created successfully!');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $routes = Route::all();

        $data = [
            'routes' => $routes
        ];


        return view('salesrep.create', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $salesRep = SalesRep::with('route')->where('sales_reps.id', $id)->first();


        $data = [
            'salesRep' => $salesRep
        ];


        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $salesRep = SalesRep::find($id);
        if (!$salesRep) {
            return redirect()->back()->with('error', 'Sorry Sales Rep ID is not exsist');
        }

        $salesRep = SalesRep::with('route')->where('sales_reps.id', $id)->first();
        $routes = Route::all();
        $data = [
            'routes' => $routes,
            'salesRep' => $salesRep
        ];
        return view('salesrep.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(SalesRepRequest $request, $id)
    {
        $salesRep = SalesRep::find($id);

        if (!$salesRep) {
            return redirect()->back()->with('error', 'Sorry Sales Rep ID is not exsist');
        }

        $salesRep->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'route_id' => $request->input('route_id'),
            'joined_date' => $request->input('joined_date'),
            'comments' => $request->input('comments')

        ]);
        return redirect()->route('salesrep.edit', $id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $salesRep = SalesRep::find($id);
        if (!$salesRep) {
            return redirect()->back()->with('error', 'Sorry Sales Rep ID is not exsist');
        }

        $salesRep->delete();

        return redirect()->back()->with('success', 'Record has been deleted');

    }
}
