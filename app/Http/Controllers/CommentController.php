<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'content' => 'required|min:2|max:1000',
            'post_id' => 'required|exists:posts,id',
        ]);

        $comment = Comment::create([
            'content' => $validated['content'],
            'user_id' => Auth::id(),
            'post_id' => $validated['post_id'],
        ]);

        return back()->with('success', 'Comment posted successfully!');
    }




 // Method to display all comments for admin
 public function index()
 {
     // Fetch all comments with their approval status
     $comments = Comment::all();

     // Pass comments to the view
     return view('admin.comments.index', compact('comments'));
 }

 // Method to approve a comment
 public function approveComment($id)
 {
     // Find the comment by ID
     $comment = Comment::find($id);

     // Check if the comment exists
     if (!$comment) {
         return redirect()->route('admin.comments.index')->with('error', 'Comment not found!');
     }

     // Update the 'is_approved' status
     $comment->is_approved = true;
     $comment->save();

     // Redirect back to the comments list with a success message
     return redirect()->route('admin.comments.index')->with('success', 'Comment approved!');
 }

}
