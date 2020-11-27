<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AutocompleteController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         if (Auth::check()) {
    //             return Redirect::to('/welcome');
    //         }
    //         return $next($request);
    //     });
    // }
    function index()
    {
     return view('welcome');
    }
    function loginCheck(Request $request)
    {
       // return $request->all();
        $email = $request['email'];
        $password = $request['password'] ;
        // $credentials[] =[$email,$password];
       // $credentials = $request->only('email', Hash::make('password') );
       $user_data = array(
        'email'  => $request->get('email'),
        'password' => $request->get('password')
       );
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
           // return 111;

            return redirect()->to('/welcome');
        }
     return view('auth');
    }
    function register(Request $request)
    {
        //return $request->all();

        // $this->validate(request(), [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);
        if($request['password']==$request['confirm_password']){
           // return 11;
            $data[]=[
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password) ,
            ];
            $user = User::insert($data);
            //Auth::login($user);
            return redirect()->to('/welcome');
        }
        else{
            return redirect()->to('/')->with('Password Doesnot Mactched');
        }

    }

    function fetch(Request $request)
    {
    if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('apps_countries')
        ->where('country_name', 'LIKE', "%{$query}%")
        ->get();
     // $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
    //    $output .= '
    //    <li><a href="#">'.$row->country_name.'</a></li>
    //    ';
       $result[] = $row->country_name;
      }
     // $output .= '</ul>';
      echo json_encode($result) ;


    // if(isset($_GET["query"]))
    // {
    //       $data = $_GET["query"];
    //      $query = DB::table('apps_countries')
    //          ->where('country_name', 'LIKE', "%{$data}%")
    //           ->get();



    //         foreach($query as $row){
    //             $result[] = $row->country_name;
    //         }

    //         echo json_encode($result);
    //  }
    }
    }
}
