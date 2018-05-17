<?php
	namespace App\Http\Controllers;
	use Illuminate\Http\Request;
	use App\User;
	use Hash;
	class PagesController extends Controller
	{
		public function index()
		{
			$data['users'] = User::all();
			return view('users', $data); // create users.blade.php
		}
		public function create()
		{
			return view('layouts.create');
		}
		public function store(Request $request)
		{		
			//dd($request->all());
		   $user=[
			   'name'=>$request->name,
			   'email'=>$request->email,
			   'password'=>Hash::make($request->password)
		   ];
		   $save= User::insert($user);
		   if($save)
		   return redirect('users');
		   else
		   return redirect()->back()->withInput();
		}
		public function show($id)
		{

		}
		public function edit($id)
        {
            $data['user']=User::find($id);
            return view('layouts.create',$data);
		}
		
		public function update(Request $request, $id)
        {
            if($request->has('password'))
            {
                $password=$request->password;
                $user=[
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>$password,
                ];
            }
                else
                {
                    $user=[
                        'name'=>$request->name,
                        'email'=>$request->email,
                    ];
                }
                $update=User::find($id)->update($user);
                if($update)
                       return redirect('users');
                else
                       return redirect()->back()->withInput();
    
            
		}
		public function destroy($id)
		{
		 $user = User::find($id);
		 if($user)
		 {
			 $user->delete();
			 $msg = "Successfully Deleted"; 
		 }
		 else
		 {
			 $msg="Check Please";
		 }
		 return redirect()->back()->withSuccess($msg);
	   }



	  }