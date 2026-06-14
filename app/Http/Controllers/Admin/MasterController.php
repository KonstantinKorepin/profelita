<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\MasterService;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function __construct(private MasterService $service)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masters = $this->service->getAllMastersPaginate();
        return view('admin.masters.list', ['masters' => $masters]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $master = $this->service->getOne($id);
        return view('admin.masters.edit', ['master' => $master]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->service->updateData($request->all(), $id);
        return redirect()->route('masters.edit', ['master' => $id])->with('success', 'Данные обновлены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
