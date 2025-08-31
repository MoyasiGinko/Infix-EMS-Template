<?php

namespace Modules\Notes\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // use base app controller that includes AuthorizesRequests
use Modules\Notes\Entities\Note;
use Modules\Notes\Http\Requests\NoteRequest;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use App\User;
use Modules\Notes\Exports\NotesExport;

class NoteController extends Controller
{
    public function index()
    {
    $query = Note::with(['user','noteable'])->latest();
        $isSuperAdmin = Auth::check() && Auth::user()->role_id == 1;
        if (! $isSuperAdmin) {
            $query->where('created_by', Auth::id());
        }
    $perPage = (int) request('per_page', 20);
    if($perPage < 1) { $perPage = 20; }
    $notes = $query->paginate($perPage)->appends(['per_page'=>$perPage]);
    $showingAll = false; // for super admin toggle button state
    return view('notes::index', compact('notes', 'isSuperAdmin', 'showingAll'));
    }

    // Super admin dedicated view to see all notes regardless of owner
    public function all()
    {
        abort_unless(Auth::check() && Auth::user()->role_id == 1, 403);
    $perPage = (int) request('per_page', 50);
    if($perPage < 1) { $perPage = 50; }
    $notes = Note::with(['user','noteable'])->latest()->paginate($perPage)->appends(['per_page'=>$perPage]);
    $isSuperAdmin = true;
    $showingAll = true;
    return view('notes::index', compact('notes', 'isSuperAdmin', 'showingAll'));
    }

    public function create()
    {
    $this->authorize('create', Note::class);
        return view('notes::create');
    }
    public function store(NoteRequest $request)
    {
    $this->authorize('create', Note::class);
        $data = $request->validated();
        $data['created_by'] = Auth::id();
        // Drop empty polymorphic inputs to avoid overwriting existing legacy data with nulls
        if (empty($data['noteable_id']) || empty($data['noteable_type'])) {
            unset($data['noteable_id'], $data['noteable_type']);
        }
        Note::create($data);
        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }


    public function show(Note $note)
    {
    $this->authorize('view', $note);
    $note->loadMissing(['user','noteable']);
        return view('notes::show', compact('note'));
    }

    public function edit(Note $note)
    {
    $this->authorize('update', $note);
        return view('notes::edit', compact('note'));
    }

    public function update(NoteRequest $request, Note $note)
    {
    $this->authorize('update', $note);
        $payload = $request->validated();
        if (empty($payload['noteable_id']) || empty($payload['noteable_type'])) {
            unset($payload['noteable_id'], $payload['noteable_type']);
        }
        $note->update($payload);
        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    public function destroy(Note $note)
    {
    $this->authorize('delete', $note);
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }

    // Category-specific methods
    public function expenses()
    {
    $notes = Note::with(['user','noteable'])->where('type', 'expense')
            ->when(!(Auth::user()->role_id == 1), function ($q) { $q->where('created_by', Auth::id()); })
            ->latest()->paginate(20);
        return view('notes::index', compact('notes'))->with('pageTitle', 'Expense Notes');
    }

    public function incomes()
    {
    $notes = Note::with(['user','noteable'])->where('type', 'income')
            ->when(!(Auth::user()->role_id == 1), function ($q) { $q->where('created_by', Auth::id()); })
            ->latest()->paginate(20);
        return view('notes::index', compact('notes'))->with('pageTitle', 'Income Notes');
    }

    public function events()
    {
    $notes = Note::with(['user','noteable'])->where('type', 'event')
            ->when(!(Auth::user()->role_id == 1), function ($q) { $q->where('created_by', Auth::id()); })
            ->latest()->paginate(20);
        return view('notes::index', compact('notes'))->with('pageTitle', 'Event Notes');
    }

    public function incidents()
    {
    $notes = Note::with(['user','noteable'])->where('type', 'incident')
            ->when(!(Auth::user()->role_id == 1), function ($q) { $q->where('created_by', Auth::id()); })
            ->latest()->paginate(20);
        return view('notes::index', compact('notes'))->with('pageTitle', 'Incident Notes');
    }

    // Placeholder for export methods (Excel/PDF)
    public function exportExcel(Request $request)
    {
        $this->authorize('export', Note::class);
    $notes = Note::with(['user','noteable'])->when(!(Auth::user()->role_id == 1), function ($q) { $q->where('created_by', Auth::id()); })->get();
    $rows = $notes->map(function ($note) {
            return [
                $note->title,
                $note->type,
                $note->content,
                $note->reference_id,
                $note->tags,
                $note->quantity,
                $note->amount,
        optional($note->user)->full_name ?? optional($note->user)->name,
        optional($note->noteable)->id,
        class_basename(optional($note->noteable)) ?: null,
                $note->created_at->format('Y-m-d H:i:s'),
            ];
        })->toArray();
        return new NotesExport($rows);
    }

    public function exportPdf(Request $request)
    {
        $this->authorize('export', Note::class);
    $notes = Note::with(['user','noteable'])->when(!(Auth::user()->role_id == 1), function ($q) { $q->where('created_by', Auth::id()); })->get();
        $pdf = Pdf::loadView('notes::export_pdf', compact('notes'));
        return $pdf->download('notes.pdf');
    }
}