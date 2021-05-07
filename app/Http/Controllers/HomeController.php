<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use DB;
use Exception;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->data['id'] = Auth::user()->id;
        $this->data['usertype'] = Auth::user()->type;
        $this->data['userlist'] =   DB::table('users as u')
                                    ->join('workflowengines as wfe', function($join){
                                        $join->on('u.workflowengine', '=', 'wfe.id');
                                    })
                                    ->select('u.id','u.name','u.lastname','u.email','u.type','wfe.name as wname')
                                    ->where('u.type',0);
        if($this->data['usertype'] == 0){
            $this->data['userlist'] = $this->data['userlist']->where('u.id',$this->data['id']);
        }
        $this->data['userlist'] = $this->data['userlist']->orderBy('u.name')->get();
        return view('home',$this->data);
    }
    public function __destruct() {
        unset($this->data);
    }
}
