@extends('shared.layout.employer')
@section('content')

<h3>Applicants for {{ $job->job_title }}</h3>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Skills</th>
            <th>Resume</th>
        </tr>
    </thead>
    <tbody>
        @foreach($applicants as $applicant)
            <tr>
                <td>{{ $applicant->user->full_name }}</td>
                <td>{{ $applicant->user->email }}</td>
                <td>{{ $applicant->skills }}</td>
                <td>
                    @if($applicant->cv)
                        <a href="{{ asset($applicant->cv) }}" target="_blank">View CV</a>
                    @else
                        No CV Uploaded
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection