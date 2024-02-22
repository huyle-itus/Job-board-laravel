<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MyJobApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my_job_application.index', [
            'applications' => auth()->user()->jobApplications()
                ->with([
                    'job' => fn($query) => $query->withCount('jobApplications')
                                                ->withAvg('jobApplications', 'expected_salary')
                                                ->withTrashed(),
                    'job.employer'])
                ->latest()->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();

        return redirect()->back()->with(
            'success',
            'Job Application removed!'
        );
    }
}
