<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\feedback;
use App\Models\Comment;
use App\Models\reply;
use App\Models\votes;


class HomeController extends Controller
{
    public function redirect()
    {

        if(Auth::id())
       {  
        if(Auth::user()->usertype=='0')            
            {       
                $feed=feedback::paginate(4);
                $comment=comment::all();
                $reply=reply::all();
                return view('home.userpage',compact('feed','comment','reply'));
            }
            else
            {
                $total_feed=feedback::all()->count();
                $total_users=user::where('usertype','=','0')->get()->count();
                return view('admin.adminpage',compact('total_users','total_feed'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function index()
    {
        $feed=feedback::paginate(4);
        $comment=comment::all();
        $reply=reply::all();
        return view('home.userpage',compact('feed','comment','reply'));
    }
    public function feedback_form()
    {
        return view('home.feedback_form');
    }
    public function send_feedback(Request $request)
    {
        if(Auth::id())
        {
            $feed=new feedback;
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
        $feed->user_id=Auth::user()->id;
        $feed->user_name=Auth::user()->name;
        $feed->save();
        return redirect()->back()->with('message','Feedback Send Successfully');
        }
        else
        {
            return redirect('/login');
        }
    }
    public function my_feedbacks()
    {
        if(Auth::id())
        {
        $userid= Auth::user()->id;
        $feed = feedback::where('user_id',$userid)->get();
        return view('home.my_feedbacks',compact('feed'));
        }
        else
        {
            return redirect()->back();
        }
    }
    public function delete_my_feedback($id)
    {
        $feed=feedback::find($id);
        $feed->delete();
        return redirect()->back()->with('message','Feedback Deleted Successfully');

    }    
    public function view_feedback($id){
        $feed=feedback::find($id);
        $comment=comment::all();
        $reply=reply::all();
        $vote=votes::all();
        return view('home.view_feedback',compact('feed','comment','vote','reply'));
    }
    public function add_comment(Request $request,$id)
    {
        if(Auth::id())
        {
            $comment=new comment;
            $comment->feedback_id=feedback::find($id)->id;
            $comment->feedback_title=feedback::find($id)->title;
            $comment->name=Auth::user()->name;
            $comment->user_id=Auth::user()->id;
            $comment->comment=$request->comment;
            $comment->save();
            return redirect()->back()->with('message','Comment Send Successfully');
        }
        else
        {
            return redirect('/login');
        }
    }
    public function reply(Request $request,$id)
    {
        if(Auth::id())
        {
            $reply=new reply;
            $reply->feedback_id=feedback::find($id)->id;
            $reply->feedback_title=feedback::find($id)->title;
            $reply->name=Auth::user()->name;
            $reply->user_id=Auth::user()->id;
            $reply->reply=$request->reply;
            $reply->save();
            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }
    public function all_feedbacks(){
        $feed=feedback::paginate(1);
        $comment=comment::all();
        $reply=reply::all();
        $user=user::all();
        $vote=votes::all();
        return view('home.all_feedbacks',compact('feed','comment','vote','user','reply'));
    }
    public function feed_user_search(Request $request)
    {
        $feed=feedback::all();
        $user=user::all();
        $search=$request->search;
        $feed=feedback::where('category','Like','%'.$search.'%')->orwhere('title','Like','%'.$search.'%')->orwhere('user_name','Like','%'.$search.'%')->get();
        return view('home.userpage',compact('feed','user'));
    }
    public function upvote(Request $request,$id)
    {
        if(Auth::id())
        {
            $vote=new votes;
            $vote->feedback_id=feedback::find($id)->id;
            $vote->feedback_title=feedback::find($id)->title;
            $vote->voter_name=Auth::user()->name;
            $vote->voter_id=Auth::user()->id;
            $vote->vote_status="upvote";
            $vote->save();
            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }
    public function downvote(Request $request,$id)
    {
        if(Auth::id())
        {
            $vote=new votes;
            $vote->feedback_id=feedback::find($id)->id;
            $vote->feedback_title=feedback::find($id)->title;
            $vote->voter_name=Auth::user()->name;
            $vote->voter_id=Auth::user()->id;
            $vote->vote_status="downvote";
            $vote->save();
            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }

}
