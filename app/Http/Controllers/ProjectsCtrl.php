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
		$projects = Projects::latest('created_at')->paginate(50);
		$i = $projects->perPage() * $projects->currentPage() - $projects->perPage()+1;
		return View('admin.projects.index',compact('projects','i'));
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
		
		if($projects->url != $request->url)
		{
			return Response()->json(['scode'=>401,'valid'=>'Domain Not Exist'],200);
		}

		if(Carbon::parse($projects->end_at) < Carbon::now())
		{
			return Response()->json(['scode'=>405,'valid'=>'Expired Domain'],200);
		}
		return Response()->json(['scode'=>200,'valid'=>'License valid'],200);
	}

}
