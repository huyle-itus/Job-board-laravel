<x-layout>
    <x-breadcrumbs class="mb-4"
    :links="['My Job Applications' => '#']" />

    @forelse ($applications as $application)
        <x-job-card :job="$application->job">
            <x-link-button :href="route('jobs.show', $application->job)" class="mb-4">
                Show
            </x-link-button>

            <div class="mt-4 flex justify-between items-center text-xs text-slate-500">
                <div>
                    <div>
                        Applied {{ $application->created_at->diffForHumans() }}
                    </div>
                    <div>
                        Other {{ Str::plural('applicant', $application->job->job_applications_count - 1) }} 
                        {{ $application->job->job_applications_count - 1 }}
                    </div>
                    <div>
                        Your asking salary ${{ number_format($application->expected_salary) }}
                    </div>
                    <div>
                        Average asking salary ${{ number_format($application->job->job_applications_avg_expected_salary) }}
                    </div>
                </div>
                <div>
                    <form action="{{ route('my-job-applications.destroy', $application) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button>Cancel</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-400 p-8">
            <div class="text-center font-medium">
                No Job Application yet!
            </div>
            <div class="text-center font-medium">
                Go find some jobs <a href="{{ route('jobs.index') }}" class="text-indigo-500 hover:underline">here!</a>
            </div>
        </div>
    @endforelse
</x-layout>