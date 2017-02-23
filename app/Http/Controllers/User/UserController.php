<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use Datatables;
use DB;
use Validator;
use Auth;
use Image;

class UserController extends Controller
{
    public $controller = 'user';
    public $view = 'users';

    public function __construct()
    {
        $this->model = new User;
        $this->middleware('auth');
    }

    public function index() {
        return view('users.index');
    }

    public function create() {
    	return view('users.create');
    }

    public function show($type = null) {
        if ($type == 'datatables') {
            $user = Auth::user();
            $tmp = $this->model->getUsers()->where('id', '!=', $user->id)->get();
            $data = get_ordinal_numbers($tmp);  

            return Datatables::of($data)
            ->addColumn('action', function ($data) {
                $action = null;    

                $action .= '<a class="btn btn-success btn-xs bs-tooltip btn-show-detail" title="Detail"'
                        . ' data-href="'.route('admin::'.$this->controller.'.show', 'detail').'"'
                        . ' data-id="'.$data->id.'">Detail</a>&nbsp;';

                $action .= '<a class="btn btn-warning btn-xs" title="edit"'
                        . ' href="'.route('admin::'.$this->controller.'.edit', $data->id).'"'
                        . ' data-id="'.$data->id.'">Edit</a>&nbsp;';

                $action .= '<a class="btn btn-danger btn-xs bs-tooltip btn-confirm-delete" title="delete"'
                        . ' data-action="'.route('admin::'.$this->controller.'.destroy',$data->id).'"'
                        . ' data-href="'.route('admin::'.$this->controller.'.show', 'delete').'"'
                        . ' data-id="'.$data->id.'">Delete</a>&nbsp;';

                 return $action;
            })->make(true);
        } elseif ($type == 'detail' || $type == 'delete') {
            $return = null;
            $id =request()->input('id');
            $user = $this->model->getUsers()->where('id', $id)->first();
            $return .= '<div class="form-group">';
                $return .= '<label class="col-sm-3 control-label"></label>';
                $return .= '<div class="col-sm-9">';
                    $return .= '<p class="form-control-static"><img src="'.asset($user->avatar).'" class="img-circle" alt="User Image" height="100" width="100"/></p>';
                $return .= '</div>';
                $return .= '<label class="col-sm-3 control-label">Name :</label>';
                $return .= '<div class="col-sm-9">';
                    $return .= '<p class="form-control-static">'.$user->name.'</p>';
                $return .= '</div>';
                $return .= '<label class="col-sm-3 control-label">Email :</label>';
                $return .= '<div class="col-sm-9">';
                    $return .= '<p class="form-control-static">'.$user->email.'</p>';
                $return .= '</div>';
            $return .= '</div>';
            return $return;
        } else {
            return redirect()->route('admin::'.$this->controller.'.index');
        }
    }

    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return Response::json([
                'status' => array('code' => 400, 'message' => $validate->errors())
            ], 400);
        } else {
            try {
                if($request->hasFile('upload')) {   
                    $image = $request->file('upload');
                    $filename  = time() . '.' . $image->getClientOriginalExtension();
                    $path = 'uploads/avatars/' . $filename;
                    $uploaded = $request->file('upload')->move($path, $filename);

                    $url = $uploaded->getPathName();
                }
                $user = $this->model;
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = bcrypt($request->input('password'));
                $user->avatar = $url;
                $user->save();   

            } catch (Exception $e) {
                flash($e->getMessage(), 'Warning');
                return redirect()->route('admin::'.$this->controller.'.index');         
            }

            flash('Success Creating User');
            return redirect()->route('admin::'.$this->controller.'.index');
        }        
    }

    public function edit($id) {

        $user = User::find($id);
        return view('users.edit')->with('user', $user);;
    }

    public function update(Request $request) {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return Response::json([
                'status' => array('code' => 400, 'message' => $validate->errors())
            ], 400);
        } else {
            try {
                if($request->hasFile('upload')) {   
                    $image = $request->file('upload');
                    $filename  = time() . '.' . $image->getClientOriginalExtension();
                    $path = 'uploads/avatars/' . $filename;
                    $uploaded = $request->file('upload')->move($path, $filename);

                    $url = $uploaded->getPathName();
                }
                $user = Auth::user();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = bcrypt($request->input('password'));
                $user->avatar = $url;
                $user->save();   

            } catch (Exception $e) {
                flash($e->getMessage(), 'Warning');
                return redirect()->route('admin::'.$this->controller.'.index');         
            }

            flash('Success Update');
            return redirect()->route('admin::'.$this->controller.'.index');
        }
    }

    public function destroy($id)
    {   
        try {
            $user = User::find($id);
            $user->delete();

        } catch (\Exception $e) {
            flash($e->getMessage(), 'warning');
            return redirect()->route('admin::'.$this->controller.'.index');
        }
        flash('Success Deleting Data');
        return redirect()->route('admin::'.$this->controller.'.index');
    }
}
