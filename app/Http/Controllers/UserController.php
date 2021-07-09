<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::where('status', 'Published')->get();
        return view('auth.user.index',[
            'roles'     =>  $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name'      =>  $request->fname,
            'role_id'      =>  $request->role_id,
            'email'      =>  $request->email,
            'cell'      =>  $request->cell,
            'uname'      =>  $request->uname,
            'gender'      =>  $request->gender,
            'edu'      =>  $request->edu,
            'password'      =>  password_hash('asdfg', PASSWORD_DEFAULT)
        ]);
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return array
     */
    public function edit($id)
    {
        $all_data = User::find($id);

        $edu = '
            <option '. ($all_data->edu == "" ? 'selected' : ' ' ) .' value="">-select-</option>
            <option '. ($all_data->edu == "JSC" ? 'selected' : ' ' ) .' value="JSC">JSC</option>
            <option '. ($all_data->edu == "SSC" ? 'selected' : ' ' ) .' value="SSC">SSC</option>
            <option '. ($all_data->edu == "HSC" ? 'selected' : ' ' ) .' value="HSC">HSC</option>
            <option '. ($all_data->edu == "BSC" ? 'selected' : ' ' ) .' value="BSC">BSC</option>
        ';

        $gender = '
                <label for="" class="d-block">Gender</label>
                <input type="radio" class="" '. ($all_data->gender == "Male" ? 'checked' : ' ' ) .' name="gender" id="MaleEdit" value="Male"> <label for="MaleEdit">Male</label>
                <input type="radio" class="" '. ($all_data->gender == "Female" ? 'checked' : ' ' ) .'  name="gender" id="FemaleEdit" value="Female"> <label for="FemaleEdit">Female</label>
        ';

        return [
            'name'      =>  $all_data->name,
            'id'        =>  $all_data->id,
            'email'     =>  $all_data->email,
            'cell'      =>  $all_data->cell,
            'uname'     =>  $all_data->uname,
            'gender'    =>  $gender,
            'edu'       =>  $edu,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show All user with ajax
     */
    public function allUsers(){
        $all_data = User::all();
        $i = 1;

        $content="";
        foreach ($all_data as $data){
            $content .='<tr>';
            $content .='<td>'. $i++ .'</td>';
            $content .='<td>'. $data->name .'</td>';
            $content .='<td>'. $data->role_id .'</td>';
            $content .='<td>'. $data->email .'</td>';
            $content .='<td>'. $data->cell .'</td>';
            $content .='<td>'. $data->uname .'</td>';
            $content .='<td>'. $data->gender .'</td>';
            $content .='<td>'. $data->edu .'</td>';
            $content .='<td> <img style="width: 60px;height: 60px" src="media/users/'.$data->photo.'"></td>';
            $content .= '<td>'.
                '<a href="#" class="btn btn-sm btn-warning" id="user_edit_btn" edit_id="'.$data->id.'">Edit</a> '.
                '<a href="#" class="btn btn-sm btn-danger" id="user_delete_btn" delete_id="'.$data->id.'">Delete</a> '
                .'</td>';
            $content .='</tr>';
        }
        return $content;

    }

    public function userUpdate(Request $request){
        $id = $request->id;
        $all_data = User::find($id);

        $all_data->name     = $request ->fname;
        $all_data->role_id     = $request ->role_id;
        $all_data->email     = $request ->email;
        $all_data->cell     = $request ->cell;
        $all_data->uname     = $request ->uname;
        $all_data->gender     = $request ->gender;
        $all_data->edu     = $request ->edu;
        $all_data->update();
        return true;
    }
}
