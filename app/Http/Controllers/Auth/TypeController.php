<?php


namespace App\Http\Controllers\Auth;

use App\Type;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param $data
     * @return mixed
     */
   public function validator($data)
   {
       return Validator::make($data,['name'=>'required|max:25' ]);
   }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
   public function index()
   {
       return Type::all();
   }

    /**
     * @param Request $request
     * @return Type
     */
   public function store(Request $request)
   {
       $validator=$this->validator($request->all());
       if ($validator->fails())
       {
           return $validator->errors();
       }else{

           $type = new Type($request->all());
           if ($type->save())
           {
               return redirect('addTask');
           }
       }
   }

   public function update(Request $request,$id)
   {
       $validator= $this->validator($request->all());
       if ($validator->fails())
       {
           return $validator->errors();
       }else
       {
           $type = Type::find($id);
           if ($type->update($request->all()))
           {
               return $type;
           }

       }
   }

    public function destroy($id)
    {
        if(Type::destroy($id))
            return redirect()->back();
        else
            return Response::json(array('error'=>'Records not found'),400);
    }
    public function addType()
    {
        return view('task_type');
    }
}
