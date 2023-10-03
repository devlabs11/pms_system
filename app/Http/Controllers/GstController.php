<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GstModel;
use App\Http\Controllers\Auth;


class GstController extends Controller
{
    
   
    public function storeGst(Request $request)
    {
        $storeGst = new GstModel();
        $storeGst->sgst = $request->get('sgst');
        $storeGst->cgst = $request->get('cgst');
        $storeGst->igst = $request->get('igst');
        $storeGst->created_by=auth()->id();
        $storeGst->created_date = now();
        $storeGst->modify_by = auth()->id();
        $storeGst->modify_at = now();
        $storeGst->created_at = now();
        $storeGst->updated_at = now();
        $storeGst->save();
        return redirect('tax-master-show');
    }

    
    public function showGst()
    {
        $showGst =GstModel::all();
        return view('admin.tax-master.tax-master-show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editGst(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateGst(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
