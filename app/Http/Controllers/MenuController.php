<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;



class MenuController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->module_name="Menu";
    }        
    
    public function index(Request $request)
    {
		$input = $request->all();
		$parent_id=$input['parent_id'];        
        
            $data = Menu::select([            
            'id', 'title', 'url', 'icon', 'parent_id'
            ])
            ->where('parent_id', $parent_id);	        
            $datatable = DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0);" class="edit-record btn btn-sm btn-success" id="'.$row->id.'" role="dialog" aria-labelledby="myModalLabel" 
                    data-id="'.$row->id.'" data-title="'.$row->title.'"  data-url="'.$row->url.'" data-icon="'.$row->icon.'">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>';
                    return $btn;
                })
                ->addColumn('action_del', function($row){
                    $btn = '
                    <form action="'. route("Menus.destroy", $row->id) .'" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm(\'Are you sure?\')">Delete</button>
                    </form> 
                    ';
                    return $btn;
                })
                ->addIndexColumn()
                ->editColumn('title', function($data) {
                    $id = $data->id;
                    $title = $data->title;
                    $parent = $data->parent_id;
                    return '<a href="'.url('menu-list/'.$id).'">'.$title.'</a>';
                }) 
                ->rawColumns(['title','action','action_del']);                
                return $datatable->make(true);              
      
    }

    public function menuData()
    {
        $id = \Request::segment(2);
		$results = DB::select('select treecode from menus where id = :id', ['id' => $id]);
		$records=count($results);
		$breadcrumb=' <li class="breadcrumb-item"><a href="0">Root</a></li>';
		if($records==0){
			$id =0;
		}else{
			$splitCodes = explode(':', $results[0]->treecode);
			$splitCount=count($splitCodes);
			$k=1;
			for($i=0;$i<$splitCount;$i++){
				$cat_name = DB::select('select title from menus where id = :id', ['id' => $splitCodes[$i]]);
				$breadcrumb .='<li class="breadcrumb-item"><a href="'.$splitCodes[$i].'">'.$cat_name[0]->title.'</a></li>';
				$k++;
			}			
		}
		
        $module_name=$this->module_name;
		return view('admin.menu.index',compact(['id','module_name','breadcrumb']));
    }    

	public function orderData()
    {
		$parent_id = \Request::segment(2); 
		$results = DB::select('select treecode from menus where id = :pid', ['pid' => $parent_id]);
		$records=count($results);
		$breadcrumb='<li class="breadcrumb-item"><a href="../menu-list/0">Root</a></li>';
		if($records==0){
			$id =0;
		}else{
			$splitCodes = explode(':', $results[0]->treecode);
			$splitCount=count($splitCodes);
			$k=1;
			for($i=0;$i<$splitCount;$i++){
				$cat_name = DB::select('select title from menus where id = :id', ['id' => $splitCodes[$i]]);
				$breadcrumb .='<li class="breadcrumb-item"><a href="../menu-list/'.$splitCodes[$i].'">'.$cat_name[0]->title.'</a></li>';
				$k++;
			}			
		}	
        $module_name=$this->module_name;
		$cols = DB::select('select id,title,position from menus where parent_id = :id order by position', ['id' => $parent_id]);
		return view('admin.menu.order',compact(['cols','module_name','parent_id','breadcrumb']));
	}
    
	public function sortData(Request $request)
    {
		$input = $request->all();		
		$pid=json_decode($input['pid']);		
		$data=json_decode($input['orders']);
		$counter=1;
		foreach($data as $key=>$val)
		{
			DB::update('update menus set position = ? where id = ? and parent_id = ?',[$counter,$val,$pid]);
			$counter++;
		}		
	}
 
    public function store(Request $request)
    {
        $this->validate($request, [
        		'title' => 'required',
        	]);
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
		$statement = DB::select("SHOW TABLE STATUS LIKE 'menus'");
		$nextId = $statement[0]->Auto_increment; 
		if($input['parent_id']==0){
			$input['treecode']=$nextId;
		}else{			
			$results = DB::select('select * from menus where id = :pid', ['pid' => $input['parent_id']]);
			$input['treecode']=$results[0]->treecode.":".$input['treecode']=$nextId;			
		}		
		$orders = Menu::where('parent_id', $input['parent_id'])->max('position');
		$input['position']=$orders+1;
		Menu::create($input);
        return response()->json(['done']);
		
    }

	public function upload(Request $request)
    {
        $input = $request->all();	
        $updated_at=now();
		DB::update('update menus set title = ?, url= ?, icon=?, updated_at=? where id = ?',[$input['title'],$input['url'],$input['icon'],$updated_at,$input['id']]);
		return response()->json(['done']);
    }    
}