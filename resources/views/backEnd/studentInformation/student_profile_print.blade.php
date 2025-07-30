@extends('backEnd.master')

@section('title')
@lang('student.student_profile_print')
@endsection

@section('mainContent')
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.profile-print-container {
  max-width: 210mm;
  min-height: 297mm;
  margin: 30px auto;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
  padding: 15mm;
  font-family: 'Times New Roman', serif;
  font-size: 15px;
  color: #222;
  line-height: 1.4;
}

/* Header Section */
.profile-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-bottom: 3px solid #4e73df;
  padding-bottom: 15px;
  margin-bottom: 20px;
}

.profile-header .school-logo {
  width: 80px;
  height: 80px;
  border: 2px solid #4e73df;
  border-radius: 10px;
  overflow: hidden;
  background: #f7f7f7;
  display: flex;
  align-items: center;
  justify-content: center;
}

.profile-header .school-logo img {
  max-width: 100%;
  max-height: 100%;
}

.profile-header .header-info {
  flex: 1;
  text-align: center;
  margin: 0 20px;
}

.profile-header .header-info h1 {
  margin: 0 0 8px 0;
  font-size: 2.2rem;
  font-weight: 700;
  color: #4e73df;
}

.profile-header .header-info p {
  margin: 0;
  font-size: 1.1rem;
  color: #666;
}

.profile-header .profile-photo {
  width: 100px;
  height: 120px;
  border: 2px solid #4e73df;
  overflow: hidden;
  background: #f7f7f7;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 12px;
  color: #666;
  text-align: center;
}

.profile-header .profile-photo img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Track and Code Section */
.track-section {
  display: flex;
  justify-content: space-between;
  margin-bottom: 15px;
  font-size: 12px;
  font-weight: bold;
}

.code-section {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 0;
  margin-bottom: 15px;
  font-size: 11px;
  border: 1px solid #333;
}

.code-item {
  padding: 8px;
  border-right: 1px solid #333;
}

.code-item:last-child {
  border-right: none;
}

.code-item strong {
  display: block;
  margin-bottom: 3px;
}

/* Profile Sections */
.profile-section {
  margin-bottom: 20px;
  page-break-inside: avoid;
}

.profile-section h3 {
  font-size: 1.1rem;
  font-weight: 600;
  color: #4e73df;
  margin-bottom: 10px;
  border-left: 4px solid #4e73df;
  padding-left: 10px;
  background: #f8f9fa;
  padding: 6px 10px;
}

.profile-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 0;
  font-size: 11px;
}

.profile-table th,
.profile-table td {
  padding: 6px 10px;
  border: 1px solid #ddd;
  text-align: left;
  vertical-align: top;
}

.profile-table th {
  background: #f8f9fa;
  color: #333;
  font-weight: 600;
  width: 200px;
}

/* Two Column Layout for some sections */
.two-column-section {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
  margin-bottom: 20px;
}

/* Address Section - Full Width */
.address-grid {
  display: grid;
  grid-template-columns: 150px 1fr 80px 1fr;
  gap: 8px;
  align-items: center;
  margin-bottom: 8px;
  font-size: 11px;
}

.address-label {
  font-weight: bold;
  color: #333;
}

.address-value {
  border-bottom: 1px solid #ccc;
  padding: 2px 5px;
  min-height: 20px;
}

/* Examination Details Table */
.exam-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 10px;
  margin-top: 10px;
}

.exam-table th,
.exam-table td {
  border: 1px solid #333;
  padding: 4px;
  text-align: center;
}

.exam-table th {
  background: #f0f4f8;
  font-weight: bold;
}

/* Subject List Table */
.subject-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 10px;
  margin-top: 10px;
}

.subject-table th,
.subject-table td {
  border: 1px solid #333;
  padding: 6px;
  text-align: left;
}

.subject-table th {
  background: #f0f4f8;
  font-weight: bold;
  text-align: center;
}

/* Declaration Section */
.declaration {
  margin-top: 20px;
  font-size: 11px;
  text-align: justify;
  line-height: 1.4;
  page-break-inside: avoid;
}

.declaration p {
  margin-bottom: 10px;
}

/* Print Styles */
@media print {
  .no-print {
    display: none !important;
  }

  .profile-print-container {
    box-shadow: none;
    margin: 0;
    padding: 10mm;
    border-radius: 0;
  }

  .profile-section {
    page-break-inside: avoid;
  }
}

/* Button Styles */
.primary-btn {
  background: #4e73df;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 14px;
  text-decoration: none;
  display: inline-block;
  margin: 0 5px;
}

.primary-btn:hover {
  background: #375a7f;
  color: white;
  text-decoration: none;
}
</style>

@php
$setting = app('school_info');
$school_name = $setting->school_name ?? config('app.name', 'School');
$school_logo = $setting->logo ? asset($setting->logo) : asset('public/backEnd/img/logo.png');
$currency = $setting->currency_symbol ?? '$';
$parents = @$student_detail->parents;
@endphp

<div class="profile-print-container">
  <!-- Header -->
  <div class="profile-header">
    <div class="school-logo">
      <img src="{{ $school_logo }}" alt="{{ $school_name }}">
    </div>
    <div class="header-info">
      <h1>{{ $school_name }}</h1>
      <p>@lang('student.student_profile')</p>
      <div style="font-size: 14px; margin-top: 8px;">
        <div>
          @php
          $className = isset($student_detail->class) && $student_detail->class ? ($student_detail->class->class_name ??
          ($student_detail->class->name ?? '')) : '';
          $sectionName = isset($student_detail->section) && $student_detail->section ?
          ($student_detail->section->section_name ?? ($student_detail->section->name ?? '')) : '';
          @endphp
          Class: {{ $className }}@if($sectionName) (Section: {{ $sectionName }})@endif
        </div>
        <div>Session:
          {{ @$student_detail->session ? (@$student_detail->session->year ?? @$student_detail->session->name) : '2025' }}
        </div>
      </div>
    </div>
    <div class="profile-photo">
      <img
        src="{{ file_exists(@$student_detail->student_photo) ? asset(@$student_detail->student_photo) : asset('public/backEnd/img/student/default.png') }}"
        alt="{{ @$student_detail->full_name }}">
    </div>
  </div>

  <!-- Track Information -->
  <div class="track-section">
    <div><strong>Admission No:</strong> {{ @$student_detail->admission_no ?? ' ' }}</div>
  </div>

  <!-- Code and Application Details -->
  <div class="code-section">
    <div class="code-item">
      <strong>Class Roll: {{ @$student_detail->roll_no }}</strong>
      Shift: {{ @$student_detail->shift ?? '' }}

    </div>
    <div class="code-item">
      @if(isset($student_detail->section) && $student_detail->section)
      <strong>Section: {{ $student_detail->section->section_name ?? $student_detail->section->name ?? '' }}</strong><br>
      @endif
      Application Date:
      {{ @$student_detail->admission_date ? dateConvert(@$student_detail->admission_date) : '' }}
    </div>
    <div class="code-item">
      <strong>Security Code/PIN:</strong>
      Email: {{ @$student_detail->email }}
    </div>
  </div>

  <!-- Student Information Section -->
  <div class="profile-section">
    <h3>1. @lang('student.student_information')</h3>
    <div class="two-column-section">
      <div>
        <div class="address-grid" style="grid-template-columns: 120px 1fr;">
          <div class="address-label">Student Name (English):</div>
          <div class="address-value">{{ @$student_detail->full_name }}</div>
        </div>
        <div class="address-grid" style="grid-template-columns: 120px 1fr;">
          <div class="address-label">Student's BC/NID:</div>
          <div class="address-value">{{ @$student_detail->national_id_no ?? @$student_detail->local_id_no }}</div>
        </div>
        <div class="address-grid" style="grid-template-columns: 120px 1fr;">
          <div class="address-label">Student's Phone:</div>
          <div class="address-value">{{ @$student_detail->mobile }}</div>
        </div>
        <div class="address-grid" style="grid-template-columns: 120px 1fr;">
          <div class="address-label">Admission No:</div>
          <div class="address-value">{{ @$student_detail->admission_no }}</div>
        </div>
        <div class="address-grid" style="grid-template-columns: 120px 1fr;">
          <div class="address-label">Roll No:</div>
          <div class="address-value">{{ @$student_detail->roll_no }}</div>
        </div>
      </div>
      <div style="text-align: right; font-size: 12px; margin-top: 10px;">
        <strong>(বাংলায়):</strong> {{ @$student_detail->full_name_bangla ?? @$student_detail->full_name }}
      </div>
    </div>
  </div>

  <!-- Parents Information -->
  <div class="two-column-section">
    <div class="profile-section">
      <h3>2. @lang('student.father_info')</h3>
      <div class="address-grid" style="grid-template-columns: 100px 1fr;">
        <div class="address-label">Father's Name:</div>
        <div class="address-value">{{ $parents ? $parents->fathers_name : '-' }}</div>
      </div>
      <div class="address-grid" style="grid-template-columns: 100px 1fr;">
        <div class="address-label">Father's NID:</div>
        <div class="address-value">{{ $parents ? $parents->fathers_nid : '-' }}</div>
      </div>
      <div class="address-grid" style="grid-template-columns: 100px 1fr;">
        <div class="address-label">Father's Phone:</div>
        <div class="address-value">{{ $parents ? $parents->fathers_mobile : '-' }}</div>
      </div>
      <div class="address-grid" style="grid-template-columns: 100px 1fr;">
        <div class="address-label">Occupation:</div>
        <div class="address-value">{{ $parents ? $parents->fathers_occupation : '-' }}</div>
      </div>
    </div>

    <div class="profile-section">
      <h3>3. @lang('student.mother_info')</h3>
      <div class="address-grid" style="grid-template-columns: 100px 1fr;">
        <div class="address-label">Mother's Name:</div>
        <div class="address-value">{{ $parents ? $parents->mothers_name : '-' }}</div>
      </div>
      <div class="address-grid" style="grid-template-columns: 100px 1fr;">
        <div class="address-label">Mother's NID:</div>
        <div class="address-value">{{ $parents ? $parents->mothers_nid : '-' }}</div>
      </div>
      <div class="address-grid" style="grid-template-columns: 100px 1fr;">
        <div class="address-label">Mother's Phone:</div>
        <div class="address-value">{{ $parents ? $parents->mothers_mobile : '-' }}</div>
      </div>
      <div class="address-grid" style="grid-template-columns: 100px 1fr;">
        <div class="address-label">Occupation:</div>
        <div class="address-value">{{ $parents ? $parents->mothers_occupation : '-' }}</div>
      </div>
    </div>
  </div>

  <!-- Address Information -->
  <div class="profile-section">
    <h3>4. @lang('student.student_address_info')</h3>
    <div class="address-grid">
      <div class="address-label">Permanent Address:</div>
      <div class="address-value">{{ @$student_detail->permanent_address }}</div>
      <div class="address-label">District:</div>
      <div class="address-value">{{ @$student_detail->permanent_district }}</div>
    </div>
    <div class="address-grid">
      <div class="address-label">Present Address:</div>
      <div class="address-value">{{ @$student_detail->current_address }}</div>
      <div class="address-label">District:</div>
      <div class="address-value">{{ @$student_detail->current_district }}</div>
    </div>
  </div>

  <!-- Guardian Information -->
  <!-- <div class="profile-section">
    <h3>6. Local Guardian Name, Address & Phone</h3>
    <div class="address-grid" style="grid-template-columns: 1fr;">
      <div class="address-value" style="min-height: 30px;">
        {{ @$student_detail->emergency_contact_name ? @$student_detail->emergency_contact_name . ' - ' . @$student_detail->emergency_contact_number : '-' }}
      </div>
    </div>
  </div> -->

  <!-- Personal and Additional Details -->
  <div class="two-column-section">
    <div class="profile-section">
      <h3>6-9. Personal Details</h3>
      <div class="address-grid" style="grid-template-columns: 80px 1fr;">
        <div class="address-label">Nationality:</div>
        <div class="address-value">{{ @$student_detail->nationality }}</div>
      </div>
      <div class="address-grid" style="grid-template-columns: 80px 1fr;">
        <div class="address-label">Date of Birth:</div>
        <div class="address-value">
          {{ @$student_detail->date_of_birth ? dateConvert(@$student_detail->date_of_birth) : '-' }}</div>
      </div>
      <div class="address-grid" style="grid-template-columns: 80px 1fr;">
        <div class="address-label">Religion:</div>
        <div class="address-value">
          {{ @$student_detail->religion ? @$student_detail->religion->base_setup_name : '' }}</div>
      </div>
    </div>

    <div class="profile-section">
      <h3>10-12. Additional Info</h3>
      <div class="address-grid" style="grid-template-columns: 100px 1fr;">
        <div class="address-label">Father's Income:</div>
        <div class="address-value">{{ $parents ? $parents->fathers_annual_income : '' }}</div>
      </div>
      <div class="address-grid" style="grid-template-columns: 100px 1fr;">
        <div class="address-label">Quota:</div>
        <div class="address-value">{{ @$student_detail->quota }}</div>
      </div>
      <div class="address-grid" style="grid-template-columns: 100px 1fr;">
        <div class="address-label">Blood Group:</div>
        <div class="address-value">
          {{ @$student_detail->bloodGroup ? @$student_detail->bloodGroup->base_setup_name : '' }}</div>
      </div>
    </div>
  </div>

  <!-- Examination Details -->
  <!-- <div class="profile-section">
    <h3>14. @lang('exam.examinations_participated')</h3>
    <table class="exam-table">
      <thead>
        <tr>
          <th>@lang('exam.exam_name')</th>
          <th>@lang('exam.exam_type')</th>
          <th>@lang('exam.session')</th>
          <th>@lang('exam.year')</th>
        </tr>
      </thead>
      <tbody>
        @php
        $classExams = (isset($student_detail->class) && isset($student_detail->class->exams)) ?
        $student_detail->class->exams : collect();
        @endphp
        @if($classExams && $classExams->count())
        @foreach($classExams as $exam)
        <tr>
          <td>{{ $exam->title ?? '' }}</td>
          <td>{{ $exam->examType->title ?? '' }}</td>
          <td>{{ $exam->session->year ?? $exam->session->name ?? '' }}</td>
          <td>{{ $exam->year ?? '' }}</td>
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="4">@lang('exam.no_exams_found')</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div> -->

  <!-- Subject List -->
  <!-- <div class="profile-section">
    <h3>15. @lang('student.assigned_subjects_for_class')</h3>
    <table class="subject-table">
      <thead>
        <tr>
          <th>@lang('student.subject_code')</th>
          <th>@lang('student.subject_name')</th>
          <th>@lang('student.subject_type')</th>
        </tr>
      </thead>
      <tbody>
        @php
        $assignedSubjects = (isset($student_detail->class) && isset($student_detail->class->subjects)) ?
        $student_detail->class->subjects : collect();
        @endphp
        @if($assignedSubjects && $assignedSubjects->count())
        @foreach($assignedSubjects as $subject)
        <tr>
          <td>{{ $subject->subject_code ?? '' }}</td>
          <td>{{ $subject->subject_name ?? '' }}</td>
          <td>{{ $subject->subject_type ?? '' }}</td>
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="3">@lang('student.no_subjects_assigned')</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div> -->

  <!-- Declaration -->
  <div class="declaration">
    <p><strong>16. আমি স্বীকার করিতেছি যে,</strong></p>
    <p style="margin-top: 10px; text-align: justify;">
      I hereby declare that all the information provided in this admission form is true and correct to the best of my
      knowledge.
      I understand that any false information may result in the cancellation of my admission. I agree to abide by all
      rules
      and regulations of the institution.
    </p>
    <div style="margin-top: 30px; display: flex; justify-content: space-between;">
      <div>
        <div style="border-top: 1px solid #333; width: 150px; margin-top: 40px; text-align: center; padding-top: 5px;">
          Student's Signature
        </div>
      </div>
      <div>
        <div style="border-top: 1px solid #333; width: 150px; margin-top: 40px; text-align: center; padding-top: 5px;">
          Guardian's Signature
        </div>
      </div>
      <div>
        <div style="border-top: 1px solid #333; width: 150px; margin-top: 40px; text-align: center; padding-top: 5px;">
          Date: ___________
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Print and Download Buttons -->
<div class="text-center no-print" style="margin-top: 40px;">
  <button class="primary-btn fix-gr-bg" onclick="window.print()">
    <i class="ti-printer pr-2"></i> @lang('common.print')
  </button>
  <!-- <a href="{{ route('student_profile_print', [$student_detail->id]) }}?pdf=1" class="primary-btn fix-gr-bg"
    target="_blank">
    <i class="ti-download pr-2"></i> @lang('common.download_pdf')
  </a> -->
</div>

@endsection