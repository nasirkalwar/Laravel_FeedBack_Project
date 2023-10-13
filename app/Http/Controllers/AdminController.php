<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\feedback;
use App\Models\Comment;


class AdminController extends Controller
{
    public function users()
    {
        $user=user::all();
        return view('admin.users',compact('user'));
    }
    public function feedbacks()
    {
        $feed=feedback::orderby('created_at','desc')->get();
        return view('admin.feedbacks',compact('feed'));
    }
    public function search(Request $request)
    {
        $search=$request->search;
        $user=user::where('name','Like','%'.$search.'%')->where('email','Like','%'.$search.'%')->get();
        return view('admin.users',compact('user'));
    }
    public function delete_user($id)
    {
        $user=user::find($id);
        $user->delete();
        return redirect()->back()->with('message','User Deleted Successfully');
    }
    public function delete_feedback($id)
    {
        $feed=feedback::find($id);
        $feed->delete();
        return redirect()->back()->with('message','Feedback Deleted Successfully');

    }
    public function edit_feedback($id)
    {
        $feed=feedback::find($id);
        return view('admin.edit',compact('feed'));
    }
    public function update_feedback(Request $request,$id)
    {
        $feed=feedback::find($id);
        $feed->title=$request->title;
        $feed->description=$request->description;
        $feed->category=$request->category;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('feedbackimage',$imagename);
            $feed->image=$imagename;
        }
        $feed->save();
        return redirect()->back()->with('message','Feedback Updated Succcessfully');
    }


    public function feed_search(Request $request)
    {
        $feed=feedback::all();
        $search=$request->search;
        $feed=feedback::where('category','Like','%'.$search.'%')->orwhere('title','Like','%'.$search.'%')->orwhere('user_name','Like','%'.$search.'%')->get();
        return view('admin.feedbacks',compact('feed'));
    }
    public function comments()
    {
        $comment=comment::all();
        return view('admin.comments',compact('comment'));
    }
    public function delete_comment($id)
    {
        $comment=comment::find($id);
        $comment->delete();
        return redirect()->back()->with('message','Comment Deleted Successfully');
    }
}
