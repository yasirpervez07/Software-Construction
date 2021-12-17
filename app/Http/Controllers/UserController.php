<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        // dd($request->all());

        if ($request->keyword == null || $request->keyword == ' ') {
            $users = User::orderBy('created_at', 'desc');
            if (isset($request->role_id)) {
                $users = $users->where('users.role_id', $request->role_id);
            }
            $users = $users->paginate(25);
        } else {

            $users = User::where('name', 'like', '%' . $request->keyword . '%')
                ->orWhere('email', 'like', '%' . $request->keyword . '%')
                ->orWhere('id', 'like', '%' . $request->keyword . '%')
                ->orWhere('phone', 'like', '%' . $request->keyword . '%')
                ->orWhere('mobile', 'like', '%' . $request->keyword . '%')
                ->paginate(25)->setPath('');
            $pagination = $users->appends(array(
                'keyword' => $request->keyword
            ));
        }


        $data = view('admin.user.usertable', compact('users'))->render();

        return response()->json([
            'data' => $data,
            'total' => (string) $users->total(),
            'pagination' => (string) $users->links()
        ]);
    }

    public function locked(Request $request){
        // dd($request->locked_val);
        if (isset($request->locked_id)) {
            $lead = User::find($request->locked_id);
            $lead->update([
                'locked' => $request->locked_val
            ]);
        }

        return 1;

    }
    public function index(Request $request)
    {
        if(auth()->user()->role->name == 'Agency'){
            $agents =Agent::where('agency_id' ,auth()->user()->agency->id)->get();
            $users = User::whereIn('id',$agents)->paginate(25);

        }

        if(auth()->user()->role->name != 'Agency'){
            if (!$request->keyword) {
                $users = User::orderBy('created_at', 'desc')->paginate(25);
            } else {
                $users = User::where('name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%')
                    ->orWhere('id', 'like', '%' . $request->keyword . '%')
                    ->orWhere('phone', 'like', '%' . $request->keyword . '%')
                    ->orWhere('mobile', 'like', '%' . $request->keyword . '%')
                    ->paginate(25)->setPath('');
                $pagination = $users->appends(array(
                    'keyword' => $request->keyword
                ));
            }
        }

        $roles = Role::all();

        return view('admin.user.index', compact(['users', 'roles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function profile()
    {
        return view('admin.user.profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        User::create($request->except('password') + ['password' => Hash::make($request->password)]);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        $roles = Role::all();
        return view("adminpanel.admin.user.edit", compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {

        $user->update($request->all());
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        // $user->delete();
        return redirect()->back();
    }

    public function save_image(Request $request)
    {
        // $id = $request->userid;
        $user = User::find(auth()->user()->id);
        if ($request->hasFile('dp')) {
            if (auth()->user()->dp != null) {
                // $image_path = 'D:/xampp/htdocs/constructionchatt/public/images/userdp/'.auth()->user()->dp;
                $image_path = public_path('images/userdp/') . auth()->user()->dp;
                // dd($image_path);
                unlink($image_path);
            }
            $nnn = date('YmdHis');
            $completeFileName = $request->file('dp')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $image = $request->file('dp');
            $name = str_replace(' ', '_', $fileNameOnly) . '-' . time() . $nnn . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/userdp');
            $image->move($destinationPath, $name);
            $user->dp = $name;
            $user->save();
            return 1;
        }
    }


    public function rotate_image(Request $request)
    {
        // $data = $request->all();
        // dd($data);
        $filename = $request->image;
        $arrayimage = explode('/', $filename);
        $imagename = $arrayimage[sizeof($arrayimage) - 1];
        $filename = public_path("images/userdp/" . $imagename);
        $degrees = $request->angle;
        if ($request->angle == 90) {
            $degrees = 270;
        }
        if ($request->angle == 270) {
            $degrees = 90;
        }
        // $img=Intervention\Image\Facades\Image::make($filename);
        // $img->rotate($degrees);
        // $img->save(public_path('images/userdp/rotated.jpg'));
        // // Load the image(
        // $source = imagecreatefromjpeg($filename);
        // // Rotate
        // $rotate = imagerotate($source, $degrees, 0);
        // // and save it on your server...
        // imagejpeg($rotate, public_path('images/userdp/ahkgsdhas.jpg') );
        $img_new = imagecreatefromjpeg($filename);
        $img_new = imagerotate($img_new, $degrees, 0);
        // Save rotated image
        imagejpeg($img_new, $filename, 80);
    }


    public function filter(Request $request)
    {

        $users = User::orderBy('created_at', 'desc');

        $roles = Role::orderBy('created_at', 'desc');

        if (isset($request->role_id)) {
            $users = $users->where('users.role_id', $request->role_id);
        }
        $users = $users->paginate(25);
        $roles = $roles->paginate(25);

        $pagination = $users->appends(array(
            'role_id' => $request->role_id,

        ));

        return view('admin.user.index', compact(['users', 'roles']));
    }
}
