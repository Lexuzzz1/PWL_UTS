@extends('layouts.master')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="title">
                <h2 class="text-2xl font-semibold text-gray-800">Data Users</h2>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <!-- ========== tables-wrapper start ========== -->
    <div class="tables-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-style mb-30">
                    <div class="header-left d-flex align-items-center justify-content-between mb-4">
                        <div class="menu-toggle-btn mr-15">
                            <a href="{{ route('user.create') }}" id="menu-toggle"
                               class="main-btn primary-btn btn-hover rounded-3">
                                Add User
                            </a>
                        </div>
                        <div class="header-search d-none d-md-flex">
                            <form method="GET" action="{{ route('user') }}">
                                <input name="email" type="text" placeholder="Search By Email" value="{{ request('email')}}"/>
                                <button><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="table-wrapper table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="lead-info">
                                    <h6>Role</h6>
                                </th>
                                <th class="lead-email">
                                    <h6>Name</h6>
                                </th>
                                <th class="lead-phone">
                                    <h6>Email</h6>
                                </th>
                                <th class="lead-phone">
                                    <h6>Program Studi</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="min-width">
                                        <p class="text-capitalize">{{ $user->role->name }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $user->name }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $user->email }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $user->programstudi->name }}</p>
                                    </td>
                                    <td>
                                        <div class="action">
                                            <a class="text-success" href="{{ route('user.edit', $user->id) }}">
                                                <svg width="25" height="25" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M19.3028 3.7801C18.4241 2.90142 16.9995 2.90142 16.1208 3.7801L14.3498 5.5511C14.3442 5.55633 14.3387 5.56166 14.3333 5.5671C14.3279 5.57253 14.3225 5.57803 14.3173 5.58359L5.83373 14.0672C5.57259 14.3283 5.37974 14.6497 5.27221 15.003L4.05205 19.0121C3.9714 19.2771 4.04336 19.565 4.23922 19.7608C4.43508 19.9567 4.72294 20.0287 4.98792 19.948L8.99703 18.7279C9.35035 18.6203 9.67176 18.4275 9.93291 18.1663L20.22 7.87928C21.0986 7.0006 21.0986 5.57598 20.22 4.6973L19.3028 3.7801ZM14.8639 7.15833L6.89439 15.1278C6.80735 15.2149 6.74306 15.322 6.70722 15.4398L5.8965 18.1036L8.56029 17.2928C8.67806 17.257 8.7852 17.1927 8.87225 17.1057L16.8417 9.13619L14.8639 7.15833ZM17.9024 8.07553L19.1593 6.81862C19.4522 6.52572 19.4522 6.05085 19.1593 5.75796L18.2421 4.84076C17.9492 4.54787 17.4743 4.54787 17.1814 4.84076L15.9245 6.09767L17.9024 8.07553Z"
                                                          fill="#343C54"/>
                                                </svg>

                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action">
                                            <button class="text-danger" data-bs-toggle="modal"
                                                    data-bs-target="#updateModal"
                                                    data-id="{{$user->id}}">
                                                <i class="lni lni-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- end table row -->
                            @endforeach
                            </tbody>
                        </table>
                        <!-- end table -->
                        <div class="paginationDiv">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="p-0 pb-1 m-0"> Apakah anda akan mengganti role user ini?</p>
                    <p class="fst-italic modal-keterangan">Role dapat diubah kembali</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="post" action="" class="d-inline" id="updateForm">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="btn btn-danger">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const updateModal = document.getElementById('updateModal');
        updateModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const userId = button.getAttribute('data-id');
            const form = updateModal.querySelector('#updateForm');

            form.action = `/user/${userId}/role`;
        });
    });
</script>
