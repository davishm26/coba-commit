<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    /**
     * Display a listing of the user's reports.
     */
    public function index(Request $request): View
    {
        $reports = $request->user()
            ->reports()
            ->latest()
            ->get();

        return view('reports.index', [
            'reports' => $reports,
        ]);
    }

    /**
     * Show the form for creating a new report.
     */
    public function create(): View
    {
        return view('reports.create');
    }

    /**
     * Store a newly created report in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'in:bug,layanan,saran,lainnya'],
            'description' => ['required', 'string', 'min:10', 'max:3000'],
        ]);

        $request->user()->reports()->create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'status' => 'menunggu',
        ]);

        return redirect()->route('reports.index')->with('status', 'Laporan Anda berhasil dikirim dan akan segera kami tinjau.');
    }

    /**
     * Display the specified report.
     */
    public function show(Request $request, Report $report): View
    {
        abort_if($report->user_id !== $request->user()->id, 403, 'Anda tidak memiliki akses ke laporan ini.');

        return view('reports.show', [
            'report' => $report,
        ]);
    }
}
