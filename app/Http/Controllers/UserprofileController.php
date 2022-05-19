<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Job;

class UserprofileController extends Controller
{
    public function __construct(){
        $this->middleware(['seeker','verified']);
    }

    public function users(Request $request)
    {
        $query = $request->get('query');
        $users = Job::where('title','like','%'.$query.'%')
                ->orWhere('position','like','%'.$query.'%')
                ->get();
        return response()->json($users);
    }
  
    public function index(){
        return view('profile.index');
    }
    public function store(Request $request){
        $this->validate($request,[
            'address'=>'required',
            'bio'=>'required|min:20',
            'experience'=>'required|min:20',
            'phone_number'=>'required|min:10|numeric'
        ]);

        $user_id = auth()->user()->id;

        Profile::where('user_id',$user_id)->update([

            'address'=>request('address'),
            'experience'=>request('experience'),
            'bio'=>request('bio'),
            'phone_number'=>request('phone_number')
        ]);
        return redirect()->back()->with('message','Profile Successfully Updated!');
    }
    public function coverletter(Request $request){
        $this->validate($request,[
            'cover_letter'=>'required|mimes:pdf,doc,docx|max:20000'
        ]);
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id',$user_id)->update([

            'cover_letter'=>$cover
        ]);
        return redirect()->back()->with('message','Cover letter Successfully Updated!');
    }

    public function resume(Request $request){
        $this->validate($request,[
            'resume'=>'required|mimes:pdf,doc,docx|max:20000'
        ]);
        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id',$user_id)->update([

            'resume'=>$resume
        ]);
        return redirect()->back()->with('message','Resume Successfully Updated!');
    }
    public function avatar(Request $request){
        $this->validate($request,[
            'avatar'=>'required|mimes:png,jpeg,jpg|max:20000'
        ]);
        $user_id = auth()->user()->id;
            if($request->hasfile('avatar')){
                $file = $request->file('avatar');
                $ext = $file->getClientOriginalExtension();
                $avatar = time().'.'.$ext;
                $file -> move('uploads/avatar',$avatar);
                Profile::where('user_id',$user_id)->update([

                    'avatar'=>$avatar
                ]);
           
        return redirect()->back()->with('message','Profile Picture Successfully Updated!');
     }
    }
}
