<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">

    <style>
        label {
            display: inline-block;

            width: 200px;
        }
    </style>

    @include('admin.css')

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->

            @include('admin.navbar')

            <div class="container-fluid page-body-wrapper">
                <div class="container" align="center" style="padding: 100px">

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <form action="{{ url('editdoctor', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div style="padding: 15px;">
                            <label>Doctor Name</label>
                            <input type="text" style="color:black;" name="name" value=" {{ $data->name }}">
                        </div>

                        <div style="padding:15px;">
                            <label>Phone</label>
                            <input type="number" style="color:black;" name="phone" value="{{ $data->phone }}">
                        </div>

                        <div style="padding: 15px;">
                            <label>Speciality</label>
                            <input type="text" style="color:black;" name="specialty" value=" {{ $data->specialty }}">
                        </div>

                        <div style="padding: 15px;">
                            <label>Room No</label>
                            <input type="text" style="color:black;" name="room" value=" {{ $data->room }}">
                        </div>
                        <div style="padding: 15px;">
                            <label>Old Image</label>
                            <img height="150" width="150" src="doctorimage/{{ $data->image }}">
                        </div>
                        <div style="padding: 15px;">
                            <label>change Image</label>
                            <input type="file" name="file">
                        </div>

                        <div style="padding:15px;">

                            <input type="submit" class="btn btn-success">
                        </div>

                    </form>

                </div>


            </div>

            <!-- partial -->
            {{-- @include('admin.body') --}}
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('admin.script')
</body>

</html>
