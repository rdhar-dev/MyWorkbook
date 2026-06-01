<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyWorkbook;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


class MyWorkbookController extends Controller
{
    // Show form
    public function create()
    {
        return view('myworkbook.create');
    }

    // Save data
    public function store(Request $request)
    {
		try {

        $request->validate([
			
            'reference' => 'required',
            'task_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'remark' => 'nullable',
            'signature' => 'nullable',
        ]);

        MyWorkbook::create([
            'Reference' => $request->reference,
            'Task Name' => $request->task_name,
            'Start Date' => $request->start_date,
            'End Date' => $request->end_date,
            'Status' => $request->status,
            'Remark' => $request->remark,
            'Signature' => $request->signature,
        ]);
		return redirect()->route('myworkbook.list')
            ->with('success', 'Data inserted successfully!');
		}
		catch (\Exception $e) {
        dd($e->getMessage());
		}
	}
    public function index(Request $request)
	{
		$query = DB::table('myworkbook');

		if ($request->filled('start_date')) {
			$query->whereDate('Start Date', '>=', $request->start_date);
		}

		if ($request->filled('end_date')) {
			$query->whereDate('End Date', '<=', $request->end_date);
		}

		$data = $query->get();

		return view('myworkbook.list', compact('data'));
	
		
		#$data = MyWorkbook::latest()->get();
		#return view('myworkbook.list', compact('data'));
			
	}
		
	public function exportPdf(Request $request)
	{
		$query = DB::table('myworkbook');

		if ($request->filled('start_date')) {
        $query->whereDate('Start Date', '>=', $request->start_date);
		}

		if ($request->filled('end_date')) {
        $query->whereDate('End Date', '<=', $request->end_date);
		}

		$data = $query->get();

		$pdf = PDF::loadView('myworkbook.pdf', compact('data'));

		return $pdf->download('myworkbook.pdf');
		#$data = MyWorkbook::all();
		#$pdf = Pdf::loadView('myworkbook.pdf', compact('data'));
		#return $pdf->download('myworkbook.pdf');
	}
	
	public function edit($id)
	{
		$data = MyWorkbook::findOrFail($id);
		return view('myworkbook.edit', compact('data'));
	}

	public function update(Request $request, $id)
	{
	
	
    DB::table('myworkbook')
        ->where('id', $id)
        ->update([
           'Reference' => $request->reference,
            'Task Name' => $request->task_name,
            'Start Date' => $request->start_date,
            'End Date' => $request->end_date,
            'Status' => $request->status,
            'Remark' => $request->remark,
            'Signature' => $request->signature,
        ]);

    return redirect()->route('myworkbook.list')
        ->with('success', 'Updated successfully');
	}
	
}

