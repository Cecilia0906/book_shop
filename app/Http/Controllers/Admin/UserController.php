<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Request as Req;


use App\Http\Controllers\Controller;

use App\Repositories\UserRepository;


use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    private $userRepository;
    
    public function __construct(UserRepository $userRepository)
   {

        $this->middleware('auth');
        $this->beforeFilter('@findUser',['only'=>['show','edit','update','destroy']]);
        
         $this->userRepository = $userRepository;
    }
    
  
   
     public function findUser(Route $route)
    {
        $this->user = User::findOrFail($route->getParameter('users'));
    }
   
    

    
    
    public function index(Request $request)
    {

      
            $users = User::filterAndPaginate($request->get('name'),$request->get('role'));

            return view('backend/users/index',compact('users'));


    }
        
    
    public function lista()
   {

       $users = $this->userRepository->paginateLista();
              
                
       return view('backend/users/index',compact('users'));
      
   }
   
   	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('backend.users.create');
	}
        
         public function store(CreateUserRequest $request)
	{

         
           $user = new User($request->all());
           
           $user->save();
           return \Redirect::route('user.list');
           
           
	}
        
        public function edit($id)
	{
	   $user = User::findOrFail($id);
           return view('backend.users.edit',compact('user'));
	}
        
         public function update(EditUserRequest $request,$id)
	{
		
                $this->user->fill(Req::all());
                $this->user->save();
  
                 return \Redirect::route('user.list');
              
	}
        

        
        /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{

                $this->user->delete();
                
                $message = $this->user->name .' fue eliminado';
                
                if($request->ajax()){
                    
                    return response()->json(['message'=>$message]);
                    
                   
                }
                

                \Session::flash('message',$message);
              
                 return \Redirect::route('user.list');
	}
    
}
