<?php



namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\ApiResponser;

//use DB

Class UserController extends Controller 
{
    use ApiResponser;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
//GET

    public function g()
    {
        //eloquent style
        $users = User::all();

        //SQL string as parameter
        //$user = DB::connection
        //select("Select * from tbluser");
        //return response()->json($users, 200); // <-- before
        return $this->successResponse($users);
    }

//GET (id)
public function show($id)
{
        
    return User::where('id','like','%'.$id.'%')->get();
}

//ADD
public function adding(Request $request)
{
    $rules = [
    'first_name' => 'required|max:20',
    'last_name' => 'required|max:20',
    ];
    $this->validate($request,$rules);
    $user = User::create($request->all());

    return $this->successResponse($user, Response::HTTP_CREATED);
       
}

//UPDATE
public function updating(Request $request,$id)   
{
    $rules = [
      'first_name' => 'required|max:20',
      'last_name' => 'required|max:20',   
    ];
    $this->validate($request, $rules);
    $user = User::findOrFail($id);
    $user->fill($request->all());
    
    $user->save();

    return $user;
}

// DELETE

public function deleting($id) 
{
    $user = User::findOrFail($id);
    $user->delete(); 
}

// Index

public function index()
    {
        $users = User::all();

        return $this->successResponse($users);
    }
}