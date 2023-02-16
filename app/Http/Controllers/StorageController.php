<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class StorageController extends Controller
{
    public function index()
    {
        $manuals = Storage::files('manuals');
        // $firstFile = $files[0];
        // return view('manuals/list', ['manual' => $firstFile]);
        return view('manuals/list', ['manuals' => $manuals]);
    }

    public function create()
    {
        return view('manuals/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fileName' => 'required|max:255',
            'filePDF' => 'required|mimes:pdf|max:1024'
        ]);

        if(!Storage::disk('public')->exists('manuals/' . $request->fileName))
        {
            $request->file('filePDF')->storeAs('manuals', $request->fileName);
            return redirect()->back();
        }

        return back()
                ->withInput()
                ->withErrors(['fileName' => 'Já existe um arquivo com este nome']);
    }

    public function destroy(string $manual)
    {
        Storage::delete('manuals/' . $manual);
        return redirect()->back();
    }

    public function downloadFile(string $manual)
    {
        return Storage::download('manuals/' . $manual);
    }
}
