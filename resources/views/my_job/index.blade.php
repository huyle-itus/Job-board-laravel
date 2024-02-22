<x-layout>
    <x-breadcrumbs class="mb-4"
    :links="['My Jobs' => '#']" />

    <div class="mb-8 text-right">
        <x-link-button href="{{ route('my-jobs.create') }}">Add new</x-link-button>
    </div>

    @forelse ($jobs as $job)
        <x-job-card :$job>
            <div class="text-xs text-slate-500 font-medium">
                @forelse ($job->jobApplications as $jobApplication)
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <div>{{$jobApplication->user->name}}</div>
                            <div>
                                Applied {{ $jobApplication->created_at->diffForHumans() }}
                            </div>
                            <div>
                                Download CV
                            </div>
                        </div>
                        <div>
                            ${{number_format($jobApplication->expected_salary)}}
                        </div>
                    </div>
                @empty
                    <div class="mb-4">No applications yet</div>
                @endforelse

                <div class="flex space-x-2">
                    <x-link-button href="{{ route('my-jobs.edit', $job) }}">Edit</x-link-button>
                    <form action="{{ route('my-jobs.destroy', $job) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button>Delete</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-500 p-8">
            <div class="text-center font-medium">
            No jobs yet
            </div>
            <div class="text-center">
            Post your first job <a class="text-indigo-500 hover:underline"
                href="{{ route('my-jobs.create') }}">here!</a>
            </div>
        </div>
    @endforelse

</x-layout>