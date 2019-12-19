<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {

        return view('profile.edit');
    }

    public function index()
    {

        return view('templates.index');
    }

    public function getuser(Request $request)
    {

       //print_r($request->all());
		$columns = array(
			0 => 'name',
			1 => 'email',
			2 => 'created_at',
			3 => 'action'
		);
		
		$totalData = User::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$posts = User::offset($start)
					->limit($limit)
					->orderBy($order,$dir)
					->get();
			$totalFiltered = User::count();
		}else{
			$search = $request->input('search.value');
			$posts = User::where('name', 'like', "%{$search}%")
							->orWhere('email','like',"%{$search}%")
							->orWhere('created_at','like',"%{$search}%")
							->offset($start)
							->limit($limit)
							->orderBy($order, $dir)
							->get();
			$totalFiltered = User::where('name', 'like', "%{$search}%")
							->orWhere('email','like',"%{$search}%")
							->count();
		}		
					
		
		$data = array();
		
		if($posts){
			foreach($posts as $r){
				$nestedData['name'] = $r->name;
				$nestedData['email'] = $r->email;
				$nestedData['created_at'] = date('d-m-Y H:i:s',strtotime($r->created_at));
				$nestedData['action'] = '
					<a href="#!" class="btn btn-warning btn-xs">Edit</a>
					<a href="#!" class="btn btn-danger btn-xs">Delete</a>
				';
				$data[] = $nestedData;
			}
		}
		
		$json_data = array(
			"draw"			=> intval($request->input('draw')),
			"recordsTotal"	=> intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"			=> $data
		);
		
		echo json_encode($json_data);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
