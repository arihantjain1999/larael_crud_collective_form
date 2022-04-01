<?php

namespace App\Http\Controllers\API;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\App;

class SetDataController extends Controller
{
    private $modelPath;
    private $modelRepo;
    public function __construct(Request $request){
        if(isset($request->module_name)){
            $this->modelPath = 'App\\Interface\\'.$request->module_name.'RepositoryInterface';
            $this->modelRepo = App::make($this->modelPath);
        }
    }
    public function create(Request $request){
        $input = $request->input_request;
        $data = $this->modelRepo->create($input);
        // dd($data);
        $fulldata = ['model' => $request->module_name ,  'id' => $data['id'],  'created' => $data  ];
        return json_encode($fulldata);
    }
    public function destroy(Request $request)
    {
        $input = $request->input_request;
        $data = $this->modelRepo->delete($input['id']);
        $fulldata = ['model' => $request->module_name ,'id' => $input['id']  ,'destroyed' => $data];
        return json_encode($fulldata);
    }
    public function update(Request $request  )
    {
        $input = $request->input_request;
        $recordId = $request->id;
        $account = $this->modelRepo->update($recordId,$input);
        $fulldata = ['model' => $request->module_name ,  'updated_data' => $account];

        return json_encode($fulldata);
    }
    public function show(Request $request)
    {
        $input = $request->input_request;
        $data = $this->modelRepo->find($input['id']);
        $fulldata = [['module_name' => $request->module_name] , ['name' => 'id' , 'value' => $data['id']] ,['name' => 'full_name' , 'value' => $data['f_name']] , ['name' => 'last_name' , 'value' => $data['l_name']] , ['name' => 'module' , 'value' => $data['phone']], ['name' => 'module' , 'value' => $data['email']]];
        // $fields = ['id','f_name','l_name','dob','phone','email','address','hobby','gender','country'];
        // $fulldata = ['module_name' => $request->module_name];
        // foreach ($fields as $field) { 
        //     $array = [['name' =>  $field ,'value' => $data[$field]]];
        //     $fulldata =  array_push($array,$fulldata);
        // }
        return json_encode($fulldata);
    }
    public function index(Request $request)
    {
        // dd($request->input_request);
        $data = $this->modelRepo->all($request->input_request);
        $fulldata = ['model' => $request->module_name , 'show_all_data' => $data];
        return json_encode($fulldata);
    }
}
