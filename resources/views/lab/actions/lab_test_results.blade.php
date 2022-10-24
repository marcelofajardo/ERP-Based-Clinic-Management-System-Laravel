<!DOCTYPE html>
<html lang="en">
@if (!Auth::user())
    @php
        header('Location: ' . URL::to('/login'), true, 302);
        exit();
    @endphp
@endif


@include('head');
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
<title>Dire Dawa University CLinic Center</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css" />

<base href="/public">

<body>
    <div class="main-wrapper">

        @include('navbar');

        @if (Auth::user()->role == '4')
            {
            @include('admin.sidebar')
            }
        @elseif (Auth::user()->role == '0')
            {
            @include('reception.sidebar')
            }
        @elseif (Auth::user()->role == '1')
            {
            @include('doctor.sidebar')
            }
        @elseif (Auth::user()->role == '2')
            {
            @include('lab.sidebar')
            }
        @elseif (Auth::user()->role == '3')
            {
            @include('pharmacy.sidebar')
            }
        @endif


        <div class="page-wrapper">
            <div class="content">
                <div class="row">

                    <div class="col-lg-8 offset-lg-2">
                        <center>
                            <h4 class="page-title"><b>Lab Test results with ID number </b><span class="text-success">'
                                    {{ $patient->id }} '</span> </h4>

                        </center>

                        <hr>
                        <br>

                        <h1 for="">Name: &nbsp&nbsp<b>{{ $patient->name }}</b></h1>
                        <h1 for="">MRN: &nbsp&nbsp<b>{{ $patient->mrn }}</b> </h1>
                        <h1 for="">ID: &nbsp&nbsp<b>{{ $patient->stud_id }}</b> </h1>
                        <h1 for="">Departement: &nbsp&nbsp<b>{{ $patient->dept }}</b></h1>
                        <h1 for="">Year:&nbsp &nbsp<b>{{ $patient->year }}</b></h1>
                        <br>
                        <hr><br>
                        <form action="/save_results/{{ $orders->id }}" method="POST" enctype="multipart/form-data"
                            id='myForm'>
                            @csrf
                            <div class="row">
                                @foreach ($results as $result)
                                    @if ($result->o_id == $orders->id)
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <h1 class="page-title"><b>

                                                        @foreach ($test as $tests)
                                                            @if ($tests->id == $result->test_id)
                                                                {{ $tests->name }}

                                                    </b></h1>

                                                <input class="form-control" type="text" name="testResult[]"
                                                    value="{{ $result->Result_of_Test }}"
                                                    placeholder="Result of test here">
                                    @endif
                                @endforeach

                            </div>
                    </div>

                    <hr>
                    @endif
                    @endforeach
                    {{-- #1a0af5 --}}
                    <div class="col-sm-12">
                        <hr><br>
                        <center>

                            <input type="submit" class="btn btn-primary submit-btn"
                                style="background: #1a0af5;margin-right:50px" value="Save Results" name="submit">
                            <input type="submit" class="btn btn-primary submit-btn" style="background: #16a085;"
                                value="Submit Test Results to Doctor" name="submit">
                        </center>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>

    </div>
    <div id="delete_patient" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="assets/img/sent.png" alt="" width="50" height="46">
                    <h3>Are you sure want to delete this Patient?</h3>
                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- patients23:19-->

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
