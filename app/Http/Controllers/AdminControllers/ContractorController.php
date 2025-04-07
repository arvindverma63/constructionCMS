<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Logic\Contractor;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    public function addContractor(Request $request, Contractor $contractor)
    {
        if ($contractor->addContractor($request)) {
            return redirect()->back()->with('success', 'Contractor added successfully');
        }

        return redirect()->back()->with('error', 'Failed to add contractor');
    }

    public function delete($id, Contractor $contractorLogic)
    {
        $contractorLogic->deleteContractor($id);
        return redirect()->back()->with('success', 'Contractor deleted successfully!');
    }
}
