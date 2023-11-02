@extends('teacher.layout.app')

@section('head')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>Fırat Üniversitesi</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/logo_orj.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/font-awesome.min.css')}}">
    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/feathericon.min.css')}}">

    <!-- Datatables CSS -->

    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables/datatables.min.css')}}">



    <link rel="stylesheet" href="{{asset('admin/assets/plugins/morris/morris.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">

    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!--[if lt IE 9]>
    <script src="{{asset('admin/assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/respond.min.js')}}"></script>
    <![endif]-->

@endsection

@section('content')
    <div class="modal fade" id="create-note" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="sample_form" class="form-horizontal">

                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Şikayet/Talep Detay</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
                    </div>

                    <div class="modal-body">
                        <h5 id="details-title"></h5>
                        <span id="details-unit"></span>
                        <p id="details-content"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="action_button" id="action_button" value="Add" class="btn btn-info"/>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="mb-2" align="right">
                <a href="#" type="button" name="create_record" id="create_record"
                   class="btn btn-primary"> <i class="bi bi-plus-square"></i> Şikayet/Talep Oluştur </a>
            </div>
            <table class="table table-bordered " id="students">
                <thead>
                <tr>
                    <th>TC Kimlik</th>
                    <th>Öğrenci No</th>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th>Vize_1</th>
                    <th>Vize_2</th>
                    <th>Final</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        $(document).ready(function() {
            $('#students').DataTable();
        });
        var table = $('#students').DataTable({

            proccessing:false,
            serverSide:false,
            ajax:{
                url:"{{ route('users.teachers.fetch') }}"
            },
            columns:[
                {data:'nationality_id',name:'TC Kimlik'},
                {data:'student_number',name:'Öğrenci Numarası'},
                {data:'first_name',name:'Ad'},
                {data:'last_name',name:'Soyad'},
                {data:'visa_1',name:'Vize_1'},
                {data:'visa_2',name:'Vize_2'},
                {data:'final',name:'Final'},
                {data:'action',name:'action',orderable:false,searchable:false},
            ],
            order:[[1,'asc']]
        });

        function details(id){

        }
    </script>
    <!-- jQuery -->
    <script src="{{asset('admin/assets/js/jquery-3.6.0.min.js')}}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Slimscroll JS -->
    <script src="{{asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart.morris.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/datatables.min.js')}}"></script>

    <!-- Custom JS -->
    <script  src="{{asset('admin/assets/js/script.js')}}"></script>
    <div class="sidebar-overlay"></div>
@endsection
