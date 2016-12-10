<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Projects;

use Carbon\Carbon;
class ProjectsCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{	

		$query = Projects::latest('created_at');
		if($request->has('q'))
		{	
			$request->merge(['q'=>trim($request->q)]);
			$query->where('name','like','%'.$request->q.'%')->orwhere('url','like','%'.$request->q.'%')->orwhere('status','like','%'.$request->q.'%');
		}
		$projects = $query->paginate(50);
		$i = $projects->perPage() * $projects->currentPage() - $projects->perPage()+1;
		$numOflicensesActive    = Projects::where('status',1)->where('end_at','>',Carbon::now())->count();
		$numOflicensesDisActive = Projects::where('status',0)->orWhere('end_at','<',Carbon::now())->count();
		

		//dd($projects);
		return View('admin.projects.index',compact('projects','i','request','$request','numOflicensesActive','numOflicensesDisActive'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View('admin.projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$request->merge(['license_key'=>bcrypt(time())]);
		$request->merge(['status'=> 1]);
		Projects::create($request->all());
		return Redirect()->to('projects');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$projects = Projects::findOrFail($id);
		return View('admin.projects.edit',compact('projects'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		$projects = Projects::findOrFail($id);
		$projects->update($request->all());
		return Redirect()->to('projects');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$projects = Projects::findOrFail($id);
		$projects->delete();
		return Redirect()->to('projects');
	}

	public function api(Request $request)
	{
		$projects = Projects::where('license_key',$request->key)->first();
		if(!$projects)
		{
			return response()->json(['scode'=>404,'valid'=>'License Not Found'],200);
		}

		if($projects->status == "0")
		{
			return response()->json(['scode'=>403,'valid'=>'License Is Invalid'],200);
		}
		
		if($projects->url != $request->url)
		{
			InvalidRequests::create(['domain'=>$request->url]);
			return Response()->json(['scode'=>401,'valid'=>'Domain Not Exist'],200);
		}

		if(Carbon::parse($projects->end_at) < Carbon::now())
		{
			return Response()->json(['scode'=>405,'valid'=>'Expired License'],200);
		}
		return Response()->json(['scode'=>200,'valid'=>'License valid'],200);
	}

	public function switchCase($id)
	{
		$status = Projects::findOrFail($id) ;

		($status->status == 0) ? $status->update(['status' => 1]) : $status->update(['status' => 0]);
		return redirect()->back()->with(['msg'=>'Operation Has been Successfully ']) ;
	}

}
