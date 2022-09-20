<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\TicketCategory;
use App\Mailers\AppMailer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class TicketsController extends BaseController
{
    public function index()
    {
        $tickets = Ticket::orderBy('id', 'desc')->paginate(10);
        $categories = TicketCategory::all();
        $this->setPageTitle('Tickets', 'List of all Tickets');
        return view('admin.tickets.index', compact('tickets', 'categories'));
    }
    public function show($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $category = $ticket->category;
        $comments = $ticket->comments;
        $this->setPageTitle('Ticket Details', $ticket->title);
        return view('admin.tickets.show', compact('ticket', 'category', 'comments'));
    }
    public function close($ticket_id, AppMailer $mailer)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $ticket->status = 'Closed';

        $ticket->save();

        $ticketOwner = $ticket->user;

        $mailer->sendTicketStatusNotification($ticketOwner, $ticket);
        
        return redirect()->back()->with("status", "The ticket has been closed.");
    }
}
