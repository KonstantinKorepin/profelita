<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\MasterService;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function __construct(private MasterService $service)
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

    public function update(Request $request, string $id)
    {
        $this->service->updateData($request->all(), $id);
        return redirect()->route('masters.edit', ['master' => $id])->with('success', 'Данные обновлены');
    }
}
