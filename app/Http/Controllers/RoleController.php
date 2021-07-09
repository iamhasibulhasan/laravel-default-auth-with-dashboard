<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('auth.user.role.index',[
            'roles' =>  $roles
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
        $this -> validate($request, [
            'name'      =>  'required | string',
            'per'       =>  'required'
        ],[
            'per.required'    =>  'Select at least one permission',
        ]);

        $per = json_encode($request->per);
        Role::create([
            'name'          =>  $request->name,
            'slug'          =>  Str::slug($request->name),
            'permission'    =>  $per
        ]);
        return redirect()->route('role.index')->with('success', 'Role added successful!');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     * All roles with ajax
     */
    public function allRoles(){
        $roles = Role::all();


        $content = '';
        $i = 1;

        foreach ($roles as $role){
            if ($role->status == 'Published'){
                $status = '<span class="badge badge-success">'.$role->status.'</span>';
                $statusEye = '<a herf="#" class="btn btn-sm btn-danger" id="role_status_btn" status_id = "'.$role->id.'"><i class="fa fa-eye-slash"></i></a>';
            }else{
                $status = '<span class="badge badge-danger">'.$role->status.'</span>';
                $statusEye = '<a herf="#" class="btn btn-sm btn-success" id="role_status_btn" status_id = "'.$role->id.'"><i class="fa fa-eye"></i></a>';
            }
            $permission = json_decode($role->permission);
            $content.='<tr>';
            $content .= '<td>'.$i.'</td>';
            $content .= '<td>'.$role->name.'</td>';
            $content .= '<td>'.$role->slug.'</td>';
            $content .= '<td>'.implode(', ', $permission).'</td>';
            $content .= '<td>'.$status.'</td>';
            $content .= '<td>'.date('F,d,Y').strtotime('$role->created_at').'</td>';
            $content .= '<td>'.
                $statusEye. ' '.
                '<a href="#" class="btn btn-sm btn-warning" id="role_modal_btn" edit_id="'.$role->id.'">Edit</a> '.
                '<a href="#" class="btn btn-sm btn-danger" id="role_delete_btn" delete_id="'.$role->id.'">Delete</a> '
                .'</td>';
            $content.='</tr>';
            $i++;
        }


        return $content;
    }

    /**
     * Role Status Update
     */

    public function roleStatusUpdate($id){
        $data = Role::find($id);

        if ($data -> status == 'Published'){
            $data -> status = 'Unpublished';
            $data -> update();
            return [
                'status' => 'Unpublished'
            ];
        }else{
            $data -> status = 'Published';
            $data -> update();
            return [
                'status' => 'Published'
            ];
        }
    }

    /**
     * Role Data Update
     */

    public function roleDataEdit($id){
        $data = Role::find($id);

        $per_arr = json_decode($data->permission);

        $box = '
                <input type="checkbox" name="per[]" value="Teacher" '. ( in_array('Teacher', $per_arr) ? 'checked' : '' ) .' class="" id="TeacherEdit"><label for="TeacherEdit">Teacher</label><br>
                <input type="checkbox" name="per[]" value="Student" '. ( in_array('Student', $per_arr) ? 'checked' : '' ) .' class="" id="StudentEdit"><label for="StudentEdit">Student</label><br>
                <input type="checkbox" name="per[]" value="Slider" '. ( in_array('Slider', $per_arr) ? 'checked' : '' ) .' class="" id="SliderEdit"><label for="SliderEdit">Slider</label><br>
                <input type="checkbox" name="per[]" value="Users" '. ( in_array('Users', $per_arr) ? 'checked' : '' ) .' class="" id="UsersEdit"><label for="UsersEdit">Users</label><br>
                <input type="checkbox" name="per[]" value="Accounts" '. ( in_array('Accounts', $per_arr) ? 'checked' : '' ) .' class="" id="AccountsEdit"><label for="AccountsEdit">Accounts</label><br>
                <input type="checkbox" name="per[]" value="Settings" '. ( in_array('Settings', $per_arr) ? 'checked' : '' ) .' class="" id="SettingsEdit"><label for="SettingsEdit">Settings</label><br>
        ';


        return [
            'name' => $data ->name,
            'id' => $data ->id,
            'permission' => $box
        ];
    }


    /**
     * Role Update Data
     */

    public function roleDataUpdate(Request $request){
        $id = $request ->update_id;


        $data = Role::find($id);
        $data ->name = $request->name;
        $data ->slug = Str::slug($request->name);
        $data ->permission = json_encode($request->per);
        $data->update();
    }

    /**
     * Role Delete
     */
    public function roleDelete($id){
        $delete = Role::find($id);
        $delete->delete();
        return true;
    }




    //
}
