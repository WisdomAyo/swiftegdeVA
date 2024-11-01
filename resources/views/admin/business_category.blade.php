@extends('admin.content')
@section('content')
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Business Category</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="#">Home</a></li>
            <li class="item"><a href="#">Dashboard</a></li>
            <li class="item">Business Category</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Manage Jobs Area -->
    <div class="manage-jobs-box">
        <div class="others-options d-flex align-items-center">
            <div class="option-item">
                <a href="{{ route('admin.add.business.cat') }}" class="default-btn">Add Business Category <i
                        class="flaticon-plus"></i></a>
            </div>
        </div>
        <br />

        <div class="manage-jobs-table table-responsive">
            @if (session('response'))
                <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('response') }}
                    <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $x = 1; ?>
                    @foreach ($business as $row)
                        <tr>
                            <td>{{ $x++ }}</td>
                            <td>
                                <h5>{{ $row->title }}</h5>
                            </td>
                            <td><a href="#">active</a></td>
                            <td>
                                <ul class="option-list">
                                    <li><button class="option-btn d-inline-block edit-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Category" type="button"
                                            data-id="{{ $row->id }}" data-title="{{ $row->title }}"><i
                                                class="ri-edit-line"></i></button></li>
                                    <li><button class="option-btn d-inline-block" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="View Category" type="button"><i
                                                class="ri-eye-line"></i></button></li>
                                    <li>
                                        <form action="{{ route('delete.exe') }}" method="post" class="login"
                                            onclick="return confirm('Are you sure?')">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $row->id }}" />
                                            <input type="hidden" name="type" value="business_category" />
                                            <button class="option-btn d-inline-block" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete Category" type="submit">
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
                                        <h5 class="modal-title" id="editModalLabel">Edit Business Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editForm" method="POST"
                                            action="{{ route('update.business.category', $row->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" id="edit-id">
                                            <div class="mb-3">
                                                <label for="edit-title" class="form-label">Title</label>
                                                <input type="text" class="form-control" id="edit-title" name="title"
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
