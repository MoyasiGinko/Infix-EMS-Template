<!DOCTYPE html>
<html lang="en">

<head>
  <title>@lang('examplan::exp.admit_card')</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="author" content="John Doe">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="og:title" property="og:title" content="The Title of Your Article">
  <meta name="twitter:card" content="summary">
  <meta name="robots" content="noindex, nofollow">
  <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: 'Arial', sans-serif;
    background: #f5f5f5;
    padding: 20px;
  }

  main {
    width: 750px;
    margin: auto;
  }

  .admit-card {
    background: white;
    border: 3px solid #333;
    page-break-after: always;
    margin-bottom: 30px;
  }

  .card-item.break {
    page-break-before: always;
  }

  .header-section {
    border-bottom: 2px solid #333;
  }

  .header-content {
    display: flex;
    align-items: center;
    padding: 15px;
    gap: 20px;
  }

  .logo-section {
    width: 100px;
    height: 100px;
    flex-shrink: 0;
  }

  .logo-section img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    border: 2px solid #333;
    border-radius: 50%;
  }

  .school-info {
    flex: 1;
    text-align: center;
  }

  .school-name {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
    text-transform: uppercase;
  }

  .school-subtitle {
    font-size: 14px;
    color: #666;
    margin-bottom: 3px;
  }

  .school-address {
    font-size: 12px;
    color: #666;
  }

  .admit-title-section {
    text-align: center;
    padding: 10px;
    background: #f8f8f8;
    border-bottom: 2px solid #333;
  }

  .admit-title {
    font-size: 20px;
    font-weight: bold;
    color: #333;
    text-transform: uppercase;
    margin-bottom: 5px;
  }

  .exam-details {
    font-size: 14px;
    color: #666;
  }

  .info-section {
    padding: 15px;
  }

  .info-row {
    display: flex;
    border: 1px solid #333;
    margin-bottom: -1px;
  }

  .info-cell {
    padding: 12px 15px;
    border-right: 1px solid #333;
    flex: 1;
    font-size: 14px;
  }

  .info-cell:last-child {
    border-right: none;
  }

  .info-label {
    font-weight: bold;
    color: #333;
  }

  .info-value {
    color: #666;
    margin-left: 10px;
  }

  .student-section {
    display: flex;
    border: 2px solid #333;
    margin: 15px;
    margin-bottom: 20px;
  }

  .student-details {
    flex: 1;
    padding: 15px;
  }

  .student-photo {
    width: 120px;
    padding: 15px;
    border-left: 2px solid #333;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .photo-frame {
    width: 90px;
    height: 110px;
    border: 2px solid #333;
    padding: 3px;
    background: white;
  }

  .photo-frame img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .detail-row {
    display: flex;
    margin-bottom: 12px;
    padding-bottom: 8px;
    border-bottom: 1px solid #eee;
  }

  .detail-row:last-child {
    border-bottom: none;
    margin-bottom: 0;
  }

  .detail-left {
    flex: 2;
    padding-right: 20px;
  }

  .detail-right {
    flex: 1;
    border-left: 1px solid #ddd;
    padding-left: 20px;
  }

  .instructions {
    margin: 15px;
    padding: 15px;
    border: 1px solid #333;
    background: #fafafa;
  }

  .instructions h4 {
    margin-bottom: 10px;
    color: #333;
  }

  .instructions ul {
    padding-left: 20px;
    color: #666;
  }

  .instructions li {
    margin-bottom: 5px;
    font-size: 12px;
  }

  .signature-section {
    text-align: right;
    padding: 20px 15px;
  }

  .signature-img {
    width: 80px;
    height: 40px;
    margin-left: auto;
    margin-bottom: 5px;
    border-bottom: 1px solid #333;
  }

  .signature-img img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  .signature-title {
    font-size: 12px;
    color: #333;
    font-weight: bold;
    text-transform: uppercase;
  }

  @media print {
    body {
      background: white;
      padding: 0;
    }

    .admit-card {
      margin: 0;
      border: 2px solid #000;
    }

    main {
      width: 100%;
    }
  }
  </style>
</head>

<body>
  <main>
    @foreach ($admitcards as $key=> $admitcard)
    <div class="admit-card card-item @if($key != 0 && $key % 2 != 0) break @endif">
      <!-- Header Section -->
      <div class="header-section">
        <div class="header-content">
          <div class="logo-section">
            <img src="{{ asset(generalSetting()->logo)}}" alt="{{generalSetting()->school_name}}">
          </div>
          <div class="school-info">
            <div class="school-name">{{generalSetting()->school_name}}</div>
            @if($setting->admit_sub_title)
            <div class="school-subtitle">{{@$setting->admit_sub_title }}</div>
            @endif
            @if($setting->school_address)
            <div class="school-address">{{generalSetting()->address}}</div>
            @endif
          </div>
        </div>
      </div>

      <!-- Admit Card Title -->
      <div class="admit-title-section">
        <div class="admit-title">@lang('examplan::exp.admit_card')</div>
        @if($setting->exam_name)
        <div class="exam-details">{{$admitcard->examType->title}} - {{@generalSetting()->academic_Year->year}}</div>
        @endif
      </div>

      <!-- Basic Info Section -->
      <div class="info-section">
        <div class="info-row">
          <div class="info-cell">
            @if($setting->admission_no)
            <span class="info-label">@lang('student.admission_number'):</span>
            <span class="info-value">{{@$admitcard->studentRecord->studentDetail->admission_no}}</span>
            @endif
          </div>
          <div class="info-cell">
            <span class="info-label">@lang('student.date'):</span>
            <span class="info-value">{{@dateConvert($admitcard->created_at)}}</span>
          </div>
        </div>
      </div>

      <!-- Student Details Section -->
      <div class="student-section">
        <div class="student-details">
          <div class="detail-row">
            <div class="detail-left">
              @if($setting->student_name)
              <span class="info-label">@lang('student.student_names'):</span>
              <span class="info-value">{{@$admitcard->studentRecord->studentDetail->full_name}}</span>
              @endif
            </div>
            <div class="detail-right">
              @if($setting->admission_no)
              <span class="info-label">@lang('student.roll'):</span>
              <span class="info-value">{{@$admitcard->studentRecord->studentDetail->roll_no}}</span>
              @endif
            </div>
          </div>

          <div class="detail-row">
            <div class="detail-left">
              @if($setting->gaurdian_name)
              <span class="info-label">@lang('student.father_names'):</span>
              <span class="info-value">{{@$admitcard->studentRecord->studentDetail->parents->fathers_name}}</span>
              @endif
            </div>
            <div class="detail-right">
              @if($setting->class_section)
              <span class="info-label">@lang('student.class'):</span>
              <span class="info-value">{{@$admitcard->studentRecord->class->class_name}}</span>
              @endif
            </div>
          </div>

          <div class="detail-row">
            <div class="detail-left">
              @if($setting->gaurdian_name)
              <span class="info-label">@lang('student.mother_names'):</span>
              <span class="info-value">{{@$admitcard->studentRecord->studentDetail->parents->mothers_name}}</span>
              @endif
            </div>
            <div class="detail-right">
              @if($setting->class_section)
              <span class="info-label">@lang('student.section'):</span>
              <span class="info-value">{{@$admitcard->studentRecord->section->section_name}}
                @if(shiftEnable())
                {{isset($admitcard->studentRecord->shift) ? ' ['. $admitcard->studentRecord->shift->name.']' : ''}}
                @endif</span>
              @endif
            </div>
          </div>
        </div>

        @if($setting->student_photo)
        <div class="student-photo">
          <div class="photo-frame">
            <img
              src="{{asset(@$admitcard->studentRecord->studentDetail->student_photo != '' ? @$admitcard->studentRecord->studentDetail->student_photo : 'public/uploads/staff/demo/staff.jpg')}}"
              alt="{{@$admitcard->studentRecord->studentDetail->full_name}}">
          </div>
        </div>
        @endif
      </div>

      <!-- Instructions Section -->
      @if(@$setting->description)
      <div class="instructions description_box">
        {!! @$setting->description !!}
      </div>
      @endif

      <!-- Signature Section -->
      <div class="signature-section">
        @if($setting->principal_signature)
        <div class="signature-img">
          @if($setting->principal_signature_photo)
          <img src="{{asset($setting->principal_signature_photo)}}" alt="Signature">
          @endif
        </div>
        <div class="signature-title">@lang('examplan::exp.exam_controller')</div>
        @endif
      </div>
    </div>
    @endforeach
  </main>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  function resize_to_fit() {
    const descBoxes = document.querySelectorAll('.description_box');
    descBoxes.forEach(function(descBox) {
      if (descBox && descBox.scrollHeight > descBox.clientHeight) {
        const currentSize = parseFloat(window.getComputedStyle(descBox).fontSize);
        if (currentSize > 10) {
          descBox.style.fontSize = (currentSize - 1) + 'px';
          setTimeout(resize_to_fit, 10);
        }
      }
    });
  }

  document.addEventListener('DOMContentLoaded', function() {
    resize_to_fit();
  });
  </script>
</body>

</html>