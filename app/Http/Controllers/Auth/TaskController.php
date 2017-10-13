<?php


namespace App\Http\Controllers\Auth;

use App\Type;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use \Validator;
use App\Task;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * validation
     * @param $data
     * @return mixed
     */
    public function validator($data)
    {
        return Validator::make($data,[

            'subject' =>'required',
            'time'=>'required',
            'due_date'=>'required|date',
            'message'=>'required',
            'user_id'=>'required',
            'type_id'=>'required',
            'status'=>'required'
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return Task::all();
    }

    /**
     * @param Request $request
     * @return Task
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request->all());


        if ($validator->fails())
        {
            return $validator->errors();
        }else
        {
            $task = new Task($request->all());
            //dd($request->all());
            if ($task->save())
            {
                return redirect('home');
            }
        }
    }
    public function update(Request $request,$id)
    {
        $validator=$this->validator($request->all());
        if ($validator->fails())
        {
            return $validator->errors();
        }
        else
        {
            $task =Task::find($id);
            if ($task->update($request->all()))
            {
                return $task;
            }
        }
    }

    public function destroy($id)
    {
        if(Task::destroy($id))
            return redirect()->back();
        else
            return Response::json(array('error'=>'Records not found'),400);
    }

    public function addTask()
    {
        $user = User::get(['id','name']);
        $task =Type::all();

        return view('task',compact('user','task'));
    }


}
