<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMasterRequest;
use App\Services\MasterService;

class MasterController extends Controller
{
    public function __construct(private readonly MasterService $service)
    {}

    public function index()
    {
        $masters = $this->service->getAllMastersPaginate();
        return view('admin.masters.list', ['masters' => $masters]);
    }

    public function edit(int $id)
    {
        $master = $this->service->getOne($id);
        return view('admin.masters.edit', ['master' => $master]);
    }

    public function update(UpdateMasterRequest $request, int $id)
    {
        $this->service->updateData($request->validated(), $id);
        return redirect()->route('masters.edit', ['master' => $id])->with('success', 'Данные обновлены');
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);
        return redirect()->route('masters.index')->with('success', 'Мастер удалён');
    }
}
