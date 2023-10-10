<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\GstModel;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\gstExport;
class GstController extends Controller
{
    public function storeGst(Request $request)
    {
        $validated = $request->validate([
            'sgst' => 'required',
            'cgst' => 'required',
            'igst' => 'required',
        ]);
        DB::beginTransaction();
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

            DB::commit();
        } catch (Exception $exception) {
            
            DB::rollback();
            return back()->withError($exception->getMessage())->withInput();
            
        }
        Session::flash('message', ' Gst Added Successfully.!'); 
        return redirect('tax-master-show');
    }

    public function showGst(Request $request)
    {
        try {
            if ($request->ajax()) {
                $showGst = GstModel::select('*');
                
                return DataTables::of($showGst)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
                        $encryptedId = encrypt($row->id);
                        $editUrl = route('edit-tax-master', ['id' => $encryptedId]);
                        $deleteUrl = route('delete-tax-master', ['id' => $row->id]);
                       
                     $actionBtn = '<a href="' . $editUrl . '" title="Edit" class="menu-link flex-stack px-3" style="font-weight:normal !important;"><i class="fa fa-edit" id="ths" style="font-weight:normal !important;"></i></a>
                     <a  href="' . $deleteUrl . '" title="Delete"   style="cursor: pointer;font-weight:normal !important;" class="menu-link flex-stack px-3"><i class="fa fa-trash" style="color:red"></i></a>';
                     return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    
                    ->make(true);
            }
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    
        return view('admin.tax-master.tax-master-show');
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
            'sgst' => 'required|numeric',
            'cgst' => 'required|numeric',
            'igst' => 'required|numeric',
        ]);
        DB::beginTransaction();
        try {
            $updateGst = GstModel::find($id);
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
            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            return back()->withError($exception->getMessage())->withInput();
        }
        Session::flash('message', ' Gst Updated Successfully.!'); 
        return redirect('tax-master-show');
    }

    public function destroyGst($id)
    {
        DB::beginTransaction();
        try {
            $userId = auth()->id();
            $deleteGst = GstModel::find($id);

            if (!is_null($deleteGst)) {
                $deleteGst::where('id', $deleteGst->id)->update(['deleted_by' => $userId]);
                $deleteGst->delete();
             DB::commit();
            }
        } catch (Exception $exception) {
            DB::rollback();
            return back()->withError($exception->getMessage())->withInput();
        }
        Session::flash('message', ' Gst Deleted Successfully.!'); 
        return redirect('tax-master-show');
    }
    
    public function TrashGst()
    {
        DB::beginTransaction();
        try {
            $TrashGst = GstModel::onlyTrashed()->get();
            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('admin.tax-master.tax-master-trash', ['TrashGst' => $TrashGst]);
    }

    public function restoreGst($id)
    {
        DB::beginTransaction();

        try {
            $restoreTrash = GstModel::withTrashed()->find($id);

            if (!is_null($restoreTrash)) {
                $restoreTrash->restore();
               DB::commit();
            }
        } catch (Exception $exception) {
            DB::rollback();

            return back()->withError($exception->getMessage())->withInput();
        }
        Session::flash('message', ' Gst Restored Successfully.!'); 
        return redirect('tax-master-show');
    }

    public function permanentDeleteGst($id)
    {
        DB::beginTransaction();

        try {
            $forcedeleteGst = GstModel::withTrashed()->find($id);

            if (!is_null($forcedeleteGst)) {

                $forcedeleteGst->forceDelete();
                DB::commit();
            }
        } catch (Exception $exception) {
            DB::rollback();

            return back()->withError($exception->getMessage())->withInput();
        }
        Session::flash('message', ' Gst Deleted Successfully.!'); 
        return redirect('tax-master-show');
    }



    public function export() 
    {
        return Excel::download(new gstExport, 'gst.xlsx');
    }
}