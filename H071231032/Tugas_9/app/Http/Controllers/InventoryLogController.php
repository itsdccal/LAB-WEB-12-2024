<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\InventoryLog;

class InventoryLogController extends Controller
{
    public function index()
    {
        $inventoryLogs = InventoryLog::with('product')->paginate(10);

        foreach ($inventoryLogs as $log) {
            $log->date = Carbon::parse($log->date);
        }
        
        return view('inventoryLogs.index', compact('inventoryLogs'));
    }

    public function destroy($id)
    {   
        $inventoryLog = InventoryLog::findOrFail($id);
        $inventoryLog->delete();
        return redirect()->route('inventorylogs.index')->with('success', 'Log deleted successfully.');
    }
}