@extends('backEnd.master')
@section('title')
@lang('common.add_student')
@endsection

@section('mainContent')
<section class="admin-visitor-area up_admin_visitor">
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-lg-8 col-md-6">
        <div class="main-title">
          <h3 class="mb-30">@lang('common.select_criteria')</h3>
        </div>
      </div>
      <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg">
        <a href="{{route('student_admission')}}" class="primary-btn small fix-gr-bg">
          <span class="ti-plus pr-2"></span>
          @lang('common.add_student')
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <div class="white-box">
          <form>
            <div class="row">
              <div class="col-lg-6">
                <select class="primary_select ">
                  <option data-display="Select Class">@lang('common.select_class')</option>
                  <option value="1">@lang('common.class')Class 1</option>
                  <option value="2">@lang('common.class')Class 2</option>
                </select>
              </div>

              <div class="col-lg-6 mt-30-md">
                <select class="primary_select ">
                  <option data-display="Select Class">Select Section</option>
                  <option value="1">Section 1</option>
                  <option value="2">Section 2</option>
                </select>
              </div>
              <div class="col-lg-12 mt-20 text-right">
                <button type="submit" class="primary-btn small fix-gr-bg">
                  <span class="ti-search pr-2"></span>
                  search
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="col-lg-4 mt-30-md">
        <div class="white-box">
          <form>
            <div class="row">
              <div class="col-lg-12">
                <div class="primary_input">
                  <input class="primary_input_field" type="text" placeholder="Search By Keyword">

                </div>
              </div>
              <div class="col-lg-12 mt-20 text-right">
                <button type="submit" class="primary-btn small tr-bg">
                  <span class="ti-search pr-2"></span>
                  search
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="row mt-40">


      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-4 no-gutters">
            <div class="main-title">
              <h3 class="mb-0">Student List</h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <!-- Container where the DataTable page-length selector will be moved to -->
            <div id="studentLengthContainer" class="mb-20"></div>
          </div>
        </div>


        <div class="row">
          <div class="col-lg-12">
            <table id="table_id" class="table" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Admission No.</th>
                  <th>Name</th>
                  <th>Class</th>
                  <th>Fathers Name</th>
                  <th>Date Of Birth</th>
                  <th>Gender</th>
                  <th>Type</th>
                  <th>Phone</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @foreach($students as $student)
                <tr>
                  <td>{{$student->admission_no}}</td>
                  <td>{{$student->first_name.' '.$student->last_name}}</td>
                  <td>{{$student->class != ""? $student->class->class_name:""}}</td>
                  <td>{{$student->parents!=""?$student->parents->fathers_name:""}}</td>
                  <td>
                    {{$student->date_of_birth != ""? dateConvert($student->date_of_birth):''}}
                  </td>
                  <td>{{$student->gender !=""?$student->gender->base_setup_name:""}}</td>
                  <td>{{$student->type !=""?$student->type->type:""}}</td>
                  <td>{{$student->mobile}}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                        Edit
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{route('student_details', [$student->id])}}">view</a>
                        <a class="dropdown-item" href="#">edit</a>
                        <a class="dropdown-item" href="#">delete</a>
                        <a class="dropdown-item" href="{{ route('student_profile_print', [$student->id]) }}"
                          target="_blank">Download Form</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


  </div>
</section>
@endsection
@include('backEnd.partials.data_table_js')
@push('script')
<script>
// Persist DataTable page length for student list (mirrors fees invoice behavior)
$(document).ready(function() {
  const lengthKey = 'studentList_pageLength';
  const validLengths = [10, 50, 100, 250, 500, -1];
  const urlParams = new URLSearchParams(window.location.search);
  let urlLen = parseInt(urlParams.get('show_entries'));
  if (!validLengths.includes(urlLen)) urlLen = null;
  let savedLength = parseInt(localStorage.getItem(lengthKey) || '10');
  if (!validLengths.includes(savedLength)) savedLength = 10;
  const initialLength = urlLen !== null ? urlLen : savedLength;

  // If already initialized elsewhere, destroy to re-init with persistence settings
  if ($.fn.DataTable.isDataTable('#table_id')) {
    $('#table_id').DataTable().destroy();
  }

  const dt = $('#table_id').DataTable({
    bLengthChange: true,
    lengthMenu: [
      [10, 50, 100, 250, 500, -1],
      [10, 50, 100, 250, 500, 'All']
    ],
    pageLength: initialLength,
    language: {
      search: "<i class='ti-search'></i>",
      searchPlaceholder: (window.jsLang ? window.jsLang('quick_search') : 'Search'),
      paginate: {
        next: "<i class='ti-arrow-right'></i>",
        previous: "<i class='ti-arrow-left'></i>",
      },
    },
    dom: "lBfrtip",
    buttons: [{
        extend: "copyHtml5",
        text: '<i class="fa fa-files-o"></i>',
        title: $("#logo_title").val(),
        titleAttr: window.jsLang ? window.jsLang('copy_table') : 'Copy table',
        exportOptions: {
          columns: ':visible:not(.not-export-col)'
        },
      },
      {
        extend: "excelHtml5",
        text: '<i class="fa fa-file-excel-o"></i>',
        titleAttr: window.jsLang ? window.jsLang('export_to_excel') : 'Export to Excel',
        title: $("#logo_title").val(),
        exportOptions: {
          columns: ':visible:not(.not-export-col)'
        },
      },
      {
        extend: "csvHtml5",
        text: '<i class="fa fa-file-text-o"></i>',
        titleAttr: window.jsLang ? window.jsLang('export_to_csv') : 'Export to CSV',
        exportOptions: {
          columns: ':visible:not(.not-export-col)'
        },
      },
      {
        extend: "pdfHtml5",
        text: '<i class="fa fa-file-pdf-o"></i>',
        title: $("#logo_title").val(),
        titleAttr: window.jsLang ? window.jsLang('export_to_pdf') : 'Export to PDF',
        exportOptions: {
          columns: ':visible:not(.not-export-col)'
        },
        orientation: "landscape",
        pageSize: "A4",
        margin: [0, 0, 0, 12],
        alignment: "center",
        header: true,
        customize: function(doc) {
          if ($('#logo_img').length) {
            doc.content[1].margin = [100, 0, 100, 0];
            doc.content.splice(1, 0, {
              margin: [0, 0, 0, 12],
              alignment: "center",
              image: "data:image/png;base64," + $("#logo_img").val(),
            });
          }
          doc.defaultStyle = {
            font: 'DejaVuSans'
          };
        },
      },
      {
        extend: "print",
        text: '<i class="fa fa-print"></i>',
        titleAttr: window.jsLang ? window.jsLang('print') : 'Print',
        title: $("#logo_title").val(),
        exportOptions: {
          columns: ':visible:not(.not-export-col)'
        },
      },
      {
        extend: "colvis",
        text: '<i class="fa fa-columns"></i>',
        postfixButtons: ["colvisRestore"],
      },
    ],
    responsive: true,
    drawCallback: function() {
      const len = this.api().page.len();
      localStorage.setItem(lengthKey, len);
      const p = new URLSearchParams(window.location.search);
      if (len === 10) {
        p.delete('show_entries');
      } else {
        p.set('show_entries', len);
      }
      const params = p.toString();
      const newUrl = window.location.pathname + (params ? '?' + params : '');
      window.history.replaceState({}, '', newUrl);
    },
  });

  // Move the DataTables length selector (entries dropdown) into our custom container
  // so it appears below the "Student List" title like other pages.
  // DataTables creates the length selector with class 'dataTables_length' inside the wrapper.
  const moveLength = function() {
    const $len = $('#table_id_wrapper').find('.dataTables_length');
    if ($len.length) {
      $('#studentLengthContainer').empty().append($len.show());
    }
  };

  // Move immediately after init and also when table is drawn (in case of re-render)
  moveLength();
  dt.on('draw', function() {
    moveLength();
  });

  // If URL had show_entries but DataTable didn't match (e.g., invalid fallback), ensure sync
  if (urlLen && urlLen !== dt.page.len()) {
    dt.page.len(urlLen).draw(false);
  }
});
</script>
@endpush