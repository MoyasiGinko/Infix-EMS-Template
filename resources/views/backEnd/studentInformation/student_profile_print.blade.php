@extends('backEnd.master')

@section('title')
@lang('student.student_profile_print')
@endsection

@section('mainContent')
<style>
.profile-print-container {
  max-width: 900px;
  margin: 30px auto;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
  padding: 40px 30px;
  font-size: 15px;
  color: #222;
}

.profile-header {
  display: flex;
  align-items: center;
  border-bottom: 1px solid #eee;
  padding-bottom: 20px;
  margin-bottom: 30px;
}

.profile-header .profile-photo {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  overflow: hidden;
  margin-right: 30px;
  border: 3px solid var(--primary-color, #4e73df);
  background: #f7f7f7;
}

.profile-header .profile-photo img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.profile-header .profile-info h2 {
  margin: 0 0 8px 0;
  font-size: 2rem;
  font-weight: 700;
  color: var(--primary-color, #4e73df);
}

.profile-header .profile-info p {
  margin: 0;
  font-size: 1.1rem;
  color: #666;
}

.profile-section {
  margin-bottom: 30px;
}

.profile-section h3 {
  font-size: 1.2rem;
  font-weight: 600;
  color: var(--primary-color, #4e73df);
  margin-bottom: 12px;
  border-left: 4px solid var(--primary-color, #4e73df);
  padding-left: 10px;
}

.profile-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 0;
}

.profile-table th,
.profile-table td {
  padding: 8px 12px;
  border-bottom: 1px solid #f0f0f0;
  text-align: left;
}

.profile-table th {
  background: #f8f9fa;
  color: #333;
  font-weight: 600;
  width: 200px;
}

.profile-table tr:last-child td {
  border-bottom: none;
}

.profile-section .badge {
  background: var(--primary-color, #4e73df);
  color: #fff;
  padding: 3px 10px;
  border-radius: 12px;
  font-size: 12px;
  margin-left: 8px;
}

@media print {
  .no-print {
    display: none !important;
  }

  .profile-print-container {
    box-shadow: none;
    margin: 0;
    padding: 0;
  }
}
</style>
<div class="profile-print-container">
  <div class="profile-header">
    <div class="profile-photo">
      <img
        src="{{ file_exists(@$student_detail->student_photo) ? asset(@$student_detail->student_photo) : asset('public/backEnd/img/student/default.png') }}"
        alt="{{ @$student_detail->full_name }}">
    </div>
    <div class="profile-info">
      <h2>{{ @$student_detail->full_name }}</h2>
      <p>@lang('student.class'): {{ @$student_detail->class->class_name ?? '-' }}
        @if(@$student_detail->section)
        | @lang('student.section'): {{ @$student_detail->section->section_name }}
        @endif
      </p>
      <p>@lang('student.admission_no'): {{ @$student_detail->admission_no ?? '-' }}</p>
      <p>@lang('student.roll_number'): {{ @$student_detail->roll_no ?? '-' }}</p>
    </div>
  </div>

  <div class="profile-section">
    <h3>@lang('student.personal_information')</h3>
    <table class="profile-table">
      <tr>
        <th>@lang('common.name')</th>
        <td>{{ @$student_detail->full_name }}</td>
      </tr>
      <tr>
        <th>@lang('student.date_of_birth')</th>
        <td>{{ @$student_detail->date_of_birth ? dateConvert(@$student_detail->date_of_birth) : '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.gender')</th>
        <td>{{ @$student_detail->gender ? @$student_detail->gender->base_setup_name : '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.blood_group')</th>
        <td>{{ @$student_detail->bloodGroup ? @$student_detail->bloodGroup->base_setup_name : '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.religion')</th>
        <td>{{ @$student_detail->religion ? @$student_detail->religion->base_setup_name : '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.email')</th>
        <td>{{ @$student_detail->email ?? '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.phone_number')</th>
        <td>{{ @$student_detail->mobile ?? '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.address')</th>
        <td>{{ @$student_detail->current_address ?? '-' }}</td>
      </tr>
    </table>
  </div>

  <div class="profile-section">
    <h3>@lang('student.guardian_information')</h3>
    <table class="profile-table">
      <tr>
        <th>@lang('student.guardian_name')</th>
        <td>{{ @$student_detail->parents ? @$student_detail->parents->guardians_name : '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.guardian_phone')</th>
        <td>{{ @$student_detail->parents ? @$student_detail->parents->guardians_mobile : '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.guardian_email')</th>
        <td>{{ @$student_detail->parents ? @$student_detail->parents->guardians_email : '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.guardian_occupation')</th>
        <td>{{ @$student_detail->parents ? @$student_detail->parents->guardians_occupation : '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.guardian_address')</th>
        <td>{{ @$student_detail->parents ? @$student_detail->parents->guardians_address : '-' }}</td>
      </tr>
    </table>
  </div>

  <div class="profile-section">
    <h3>@lang('student.academic_information')</h3>
    <table class="profile-table">
      <tr>
        <th>@lang('student.class')</th>
        <td>{{ @$student_detail->class->class_name ?? '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.section')</th>
        <td>{{ @$student_detail->section->section_name ?? '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.admission_no')</th>
        <td>{{ @$student_detail->admission_no ?? '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.roll_number')</th>
        <td>{{ @$student_detail->roll_no ?? '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.session')</th>
        <td>{{ @$student_detail->session ? @$student_detail->session->year : '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.category')</th>
        <td>{{ @$student_detail->category ? @$student_detail->category->category_name : '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.type')</th>
        <td>{{ @$student_detail->studentType ? @$student_detail->studentType->base_setup_name : '-' }}</td>
      </tr>
    </table>
  </div>

  <div class="profile-section">
    <h3>@lang('student.emergency_contact')</h3>
    <table class="profile-table">
      <tr>
        <th>@lang('student.emergency_contact_name')</th>
        <td>{{ @$student_detail->emergency_contact_name ?? '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.emergency_contact_relation')</th>
        <td>{{ @$student_detail->emergency_contact_relation ?? '-' }}</td>
      </tr>
      <tr>
        <th>@lang('student.emergency_contact_number')</th>
        <td>{{ @$student_detail->emergency_contact_number ?? '-' }}</td>
      </tr>
    </table>
  </div>

  <div class="profile-section">
    <h3>@lang('student.documents')</h3>
    <table class="profile-table">
      <thead>
        <tr>
          <th>@lang('student.document_title')</th>
          <th>@lang('student.document_file')</th>
        </tr>
      </thead>
      <tbody>
        @if(isset($student_detail->documents) && count($student_detail->documents))
        @foreach($student_detail->documents as $doc)
        <tr>
          <td>{{ $doc->title }}</td>
          <td>
            @if(file_exists($doc->file))
            <a href="{{ url($doc->file) }}" target="_blank">@lang('common.download')</a>
            @else
            -
            @endif
          </td>
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="2">@lang('student.no_documents_found')</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>

  <div class="text-center no-print" style="margin-top: 40px;">
    <button class="primary-btn fix-gr-bg" onclick="window.print()">
      <i class="ti-printer pr-2"></i> @lang('common.print')
    </button>
  </div>
</div>
@endsection