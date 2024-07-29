<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashedNoteController extends Controller
{
    public function index(){
        $notes = Note::whereBelongsTo(Auth::user())->onlyTrashed('updated_at')->paginate(2);
        return view('notes.index')->with('notes', $notes);
    }

    public function show(Note $note){
        if(!$note->user->is(Auth::user())){
            return abort(403);
        }
        return view('notes.show')->with('note', $note);
    }

    public function update(Note $note){
        if(!$note->user->is(Auth::user())){
            return abort(403);
        }
        $note->restore();
        return to_route('notes.show', $note)->with('success', 'Note Restored');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        if(!$note->user->is(Auth::user())){
            return abort(403);
        }

        $note->forceDelete();
        return to_route('trashed.index')->with('success', 'Note Deleted Forever');;
    }

}
