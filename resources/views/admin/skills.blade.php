@extends('admin.content')
@section('content')
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Skills</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="#">Home</a></li>
            <li class="item"><a href="#">Dashboard</a></li>
            <li class="item">Skills</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Manage Jobs Area -->
    <div class="manage-jobs-box">
        <!--<div class="others-options d-flex align-items-center">-->
        <!--    <div class="option-item">-->
        <!--        <a href="{{ route('admin.skills.create') }}" class="default-btn">Add New Skill <i-->
        <!--                class="flaticon-plus"></i></a>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="others-options d-flex align-items-center">
    <div class="option-item">
        <!-- Button to trigger the modal -->
        <button type="button" class="default-btn" data-bs-toggle="modal" data-bs-target="#addSkillModal">
            Add New Skill <i class="flaticon-plus"></i>
        </button>
    </div>
</div>

<!-- Modal Structure -->
<div class="modal fade" id="addSkillModal" tabindex="-1" aria-labelledby="addSkillModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSkillModalLabel">Add New Skill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form to create a new skill -->
                <form action="{{ route('admin.skills.create') }}" method="POST" id="addSkillForm">
                    @csrf
                    <div class="mb-3">
                        <label for="skillName" class="form-label">Skill Name</label>
                        <input type="text" class="form-control" id="skillName" name="name" placeholder="Enter skill name" required>
                    </div>
                   
                    <!-- Add more fields as necessary -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Skill</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

        <br />

        <div class="manage-jobs-table table-responsive">
            @if (session('success'))
    <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif

@if (session('error'))
    <div class="notification-alert alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <!--<th>No</th>-->
                        <th>Title</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $x = 1; ?>
                    @foreach ($skills as $row)
                        <tr>
                            <!--<td>{{ $x++ }}</td>-->
                            <td>
                                <h5>{{ $row->name }}</h5>
                            </td>

                            <td>
                                <ul class="option-list">
                                    <li><button class="option-btn d-inline-block edit-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Skill" type="button"
                                            data-id="{{ $row->id }}" data-title="{{ $row->name }}"><i
                                                class="ri-edit-line"></i></button></li>
                                    <!--<li><button class="option-btn d-inline-block" data-bs-toggle="tooltip"-->
                                    <!--        data-bs-placement="top" title="View Skill" type="button"><i-->
                                    <!--            class="ri-eye-line"></i></button></li>-->
                                    <li>
                                        <form action="{{ route('admin.skills.delete', $row->id) }}" method="post" class="login"
                                            onclick="return confirm('Are you sure?')">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            
                                            <button class="option-btn d-inline-block" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete Skill" type="submit">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="card modal-content shadow">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Skill</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editForm" method="POST"
                                            action="{{ route('admin.skills.update', $row->id) }}">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="id" id="edit-id">
                                            <div class="mb-3">
                                                <label for="edit-title" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="edit-title" name="name"
                                                    required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
                {{ $skills->links()}}
        </div>
    </div>
    <!-- End Manage Jobs Area -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = this.getAttribute('data-id');
                    var title = this.getAttribute('data-title');

                    var modal = new bootstrap.Modal(document.getElementById('editModal'));
                    document.getElementById('edit-id').value = id;
                    document.getElementById('edit-title').value = title;

                    modal.show();
                });
            });
        });
    </script>
@endsection
