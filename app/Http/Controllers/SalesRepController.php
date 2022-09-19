<?php

namespace App\Http\Controllers;

use App\Facades\RouteFacade;
use App\Facades\SalesRepFacade;
use App\Http\Requests\SalesRepRequest;
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


        $data = [
            'salesRep' => SalesRepFacade::getAllSalesRep()
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


        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'route_id' => $request->input('route_id'),
            'joined_date' => $request->input('joined_date'),
            'comments' => $request->input('comments')
        ];


        if (!SalesRepFacade::addSalesRep($data)) {
            return back()->with('error', 'Something Goes wrong. Record cannot add to the system');
        }
        return back()->with('success', 'Record created successfully!');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $routes = RouteFacade::getAllRoutes();

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
        $salesRep = SalesRepFacade::getSalesRep($id);

        if (!$salesRep) {
            return back()->with('error', 'Record not found');
        }

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
        $salesRep = SalesRepFacade::getSalesRep($id);
        if (!$salesRep) {
            return redirect()->back()->with('error', 'Sorry Sales Rep ID is not exsist');
        }


        $routes = RouteFacade::getAllRoutes();
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
        $salesRep = SalesRepFacade::getSalesRep($id);

        if (!$salesRep) {
            return redirect()->back()->with('error', 'Sorry Sales Rep ID is not exsist');
        }

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'route_id' => $request->input('route_id'),
            'joined_date' => $request->input('joined_date'),
            'comments' => $request->input('comments')
        ];
        if (!SalesRepFacade::updateSalesRep($data, $id)) {
            return redirect()->back()->with('error', 'Sorry. Record is unable to save');
        }


        return redirect()->route('salesrep.edit', $id)->with('success', 'Record Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $salesRep = SalesRepFacade::getSalesRep($id);
        if (!$salesRep) {
            return redirect()->back()->with('error', 'Sorry Sales Rep ID is not exsist');
        }

        $salesRep->delete();

        return redirect()->back()->with('success', 'Record has been deleted');

    }
}
