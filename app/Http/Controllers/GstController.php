<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\GstModel;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Session;


class GstController extends Controller
{
    public function storeGst(Request $request)
    {
        $validated = $request->validate([
            'sgst' => 'required',
            'cgst' => 'required',
            'igst' => 'required',
        ]);
        try {
            $storeGst = new GstModel();
            $storeGst->sgst = $request->get('sgst');
            $storeGst->cgst = $request->get('cgst');
            $storeGst->igst = $request->get('igst');
            $storeGst->created_by = auth()->id();
            $storeGst->created_date = now();
            $storeGst->modify_by = auth()->id();
            $storeGst->modify_at = now();
            $storeGst->created_at = now();
            $storeGst->updated_at = now();
            $storeGst->save();

        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        Session::flash('message', ' Gst Added Successfully'); 
        return redirect('tax-master-show');
    }

    public function showGst()
    {
        try {
            $showGst = GstModel::all();
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('admin.tax-master.tax-master-show', ['showGst' => $showGst]);
    }

    public function editGst($id)
    {
        try {
            $editGst = GstModel::find(decrypt($id));
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('admin.tax-master.tax-master-edit', ['editGst' => $editGst]);

    }

    public function updateGst(Request $request, $id)
    {
        $validated = $request->validate([
            'sgst' => 'required',
            'cgst' => 'required',
            'igst' => 'required',
        ]);
        try {
            $updateGst = GstModel::find(decrypt($id));
            $updateGst->sgst = $request->get('sgst');
            $updateGst->cgst = $request->get('cgst');
            $updateGst->igst = $request->get('igst');
            $updateGst->created_by = auth()->id();
            $updateGst->created_date = now();
            $updateGst->modify_by = auth()->id();
            $updateGst->modify_at = now();
            $updateGst->created_at = now();
            $updateGst->updated_at = now();
            $updateGst->save();
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        Session::flash('message', ' Gst Updated Successfully'); 
        return redirect('tax-master-show');
    }

    public function destroyGst($id)
    {
        try {

            $userId = auth()->id();
            $deleteGst = GstModel::find(decrypt($id));

            if (!is_null($deleteGst)) {
                $deleteGst::where('id', $deleteGst->id)->update(['deleted_by' => $userId]);
                $deleteGst->delete();
            }
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        Session::flash('message', ' Gst Deleted Successfully'); 

        return redirect('tax-master-show');
    }

    public function TrashGst()
    {
        try {
            $TrashGst = GstModel::onlyTrashed()->get();
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('admin.tax-master.tax-master-trash', ['TrashGst' => $TrashGst]);

    }

    public function restoreGst($id)
    {
        try {
            $restoreTrash = GstModel::withTrashed()->find($id);

            if (!is_null($restoreTrash)) {
                $restoreTrash->restore();
            }
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        Session::flash('message', ' Gst Restored Successfully'); 

        return redirect('tax-master-show');
    }


    public function permanentDeleteGst($id)
    {
        try {
            $forcedeleteGst = GstModel::withTrashed()->find($id);

            if (!is_null($forcedeleteGst)) {

                $forcedeleteGst->forceDelete();
            }
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        Session::flash('message', ' Gst Deleted Successfully'); 
        return redirect('tax-master-show');
    }
}