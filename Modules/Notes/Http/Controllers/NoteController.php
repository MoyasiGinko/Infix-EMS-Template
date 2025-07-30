<?php

namespace Modules\Notes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Notes\Entities\Note;
use Modules\Notes\Http\Requests\NoteRequest;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::latest()->paginate(20);
        return view('notes::index', compact('notes'));
    }

    public function create()
    {
        return view('notes::create');
    }

    public function store(NoteRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = auth()->id();
        Note::create($data);
        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    public function show(Note $note)
    {
        return view('notes::show', compact('note'));
    }

    public function edit(Note $note)
    {
        return view('notes::edit', compact('note'));
    }

    public function update(NoteRequest $request, Note $note)
    {
        $note->update($request->validated());
        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }

    // Placeholder for export methods (Excel/PDF)
    public function exportExcel(Request $request)
    {
        $notes = Note::all();
        $exportData = $notes->map(function ($note) {
            return [
                'Title' => $note->title,
                'Type' => $note->type,
                'Content' => $note->content,
                'Reference ID' => $note->reference_id,
                'Tags' => $note->tags,
                'Quantity' => $note->quantity,
                'Amount' => $note->amount,
                'Created By' => $note->created_by,
                'Created At' => $note->created_at,
            ];
        });
        return Excel::download(new \ArrayObject([$exportData->toArray()]), 'notes.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $notes = Note::all();
        $pdf = Pdf::loadView('notes::export_pdf', compact('notes'));
        return $pdf->download('notes.pdf');
    }
}
