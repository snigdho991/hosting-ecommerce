<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Ticket;
use App\Models\TicketComment;
use App\Mailers\AppMailer;
use Illuminate\Support\Facades\Auth;
class CommentsController extends Controller
{
    public function postComment(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'comment'   => 'required'
        ]);
            $comment = new TicketComment;
            $comment->ticket_id = $request->input('ticket_id');
            $comment->user_id = Auth::user()->id;
            $comment->comment = $request->input('comment');
            $comment->is_admin = $request->input('c_admin');
            
            $comment->save();
            
            // send mail if the user commenting is not the ticket owner
            if ($comment->is_admin) {
                $mailer->sendTicketComments($comment->ticket->user, Auth::user(), $comment->ticket, $comment);
            }

            return redirect()->back()->with("status", "Your comment has be submitted.");
    }
}
