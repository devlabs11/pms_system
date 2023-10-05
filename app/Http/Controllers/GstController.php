<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GstModel;
use App\Http\Controllers\Auth;


class GstController extends Controller
{
    
   
    public function storeGst(Request $request)
    {



        $validated = $request->validate([
            'sgst' => 'required',
            'cgst' => 'required',
            'igst' => 'required',
    
        ]);
     
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
        return view('admin.tax-master.tax-master-show',['showGst'=>$showGst]);
    }

  
    public function editGst($id)
    {
        $editGst = GstModel::find(decrypt($id));
        return view('admin.tax-master.tax-master-edit' , ['editGst'=>$editGst]);

    }

  
    public function updateGst(Request $request,$id)
    {

        $updateGst = GstModel::find(decrypt($id));
        $updateGst->sgst = $request->get('sgst');
        $updateGst->cgst = $request->get('cgst');
        $updateGst->igst = $request->get('igst');
        $updateGst->created_by=auth()->id();
        $updateGst->created_date = now();
        $updateGst->modify_by = auth()->id();
        $updateGst->modify_at = now();
        $updateGst->created_at = now();
        $updateGst->updated_at = now();
        $updateGst->save();
        return redirect('tax-master-show');

        
    }

 
    public function destroyGst($id)
    {
        
        $deleteGst = GstModel::find(decrypt($id));
        
        if(!is_null($deleteGst)){

            $deleteGst->delete();
        }
        return redirect('tax-master-show');
    }



    public function TrashGst(){
        $TrashGst = GstModel::onlyTrashed()->get();
        return view('admin.tax-master.tax-master-trash' , ['TrashGst'=>$TrashGst]);

    }



    public function restoreGst(){

        
    }
}
