<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Ticket;
use App\Mailers\AppMailer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TicketCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        $categories = TicketCategory::all();

        return view('site.pages.tickets.create', compact('categories'));
    }
    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        $categories = TicketCategory::all();

        return view('site.pages.tickets.user_tickets', compact('tickets', 'categories'));
    }
    public function show($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $category = $ticket->category;
        $comments = $ticket->comments;

        return view('site.pages.tickets.show', compact('ticket', 'category', 'comments'));
    }
    public function store(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
                'title'     => 'required',
                'category'  => 'required',
                'priority'  => 'required',
                'message'   => 'required'
            ]);

            $ticket = new Ticket([
                'title'     => $request->input('title'),
                'user_id'   => Auth::user()->id,
                'ticket_id' => strtoupper(Str::random(10)),
                'category_id'  => $request->input('category'),
                'priority'  => $request->input('priority'),
                'message'   => $request->input('message'),
                'status'    => "Open",
            ]);

            $ticket->save();

            $mailer->sendTicketInformation(Auth::user(), $ticket);

            return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been opened.");
    }
}
