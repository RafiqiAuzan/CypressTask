<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index()
    {
            $journals = Journal::all();
            return view('JournalList', compact('journals'));
        // return response()->json($journals, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'journal_title' => 'required',
            'journal_name' => 'required',
            'journal_desc' => 'required',
            'journal_file' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('journal_file');

        $fileName = time() . '_' . $file->getClientOriginalName();

        $journal = Journal::create([
            'journal_title' => $request->input('journal_title'),
            'journal_name' => $request->input('journal_name'),
            'journal_desc' => $request->input('journal_desc'),
            'journal_file' => $fileName, 
        ]);

        $file->storeAs('journal_files', $fileName, 'public');

        return redirect()->route('journals.index')->with('success', 'Journal created successfully!');
    }

    public function show(Journal $journal)
    {
        return response()->json([
            'data' => $journal
        ]);
    }

    public function destroy(string $id)
    {
        $journal = Journal::findOrFail($id);

        if ($journal->delete()) {
            return redirect(route('journals.index'))->with('success', 'Deleted!');
        }

        return redirect(route('journal.index'))->with('error', 'Sorry, unable to delete this!');
    }
}
