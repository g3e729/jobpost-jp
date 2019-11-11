<form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="{{ route('admin.students.update', $student) }}" novalidate>
  @csrf
  {{ method_field('PATCH') }}

  <div class="pb-3 row">
    <div class="col-3 font-weight-bold">IT</div>
    <div class="col-9">
      <div class="form-group position-relative">
        <label for="formITAttended" class="form-label pt-0">受講済み</label>
        <select class="form-control" id="formITAttended" name="taken_id">
          <option value="" selected hidden disabled>Choose Attended class</option>
          @foreach($courses as $index => $name)
          <option value="{{ $index }}" {{ ($index == $student->taken_id) ? 'selected' : null }}>{{ ucwords($name) }}</option>
          @endforeach
        </select>
      </div>
      
      <div class="form-group position-relative">
        <label for="formITCurrent" class="form-label pt-0">受講中</label>
        <select class="form-control" id="formITCurrent" name="course_id">
          <option value="" selected hidden disabled>Choose Current class</option>
          @foreach($courses as $index => $name)
          <option value="{{ $index }}" {{ ($index == $student->course_id) ? 'selected' : null }}>{{ ucwords($name) }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group position-relative">
        <label for="formITLevel" class="form-label pt-0">ITレベル</label>
        <select class="form-control" id="formITLevel" name="it_level">
          <option value="" selected hidden disabled>Choose IT level</option>
          @for ($ctr = 1; $ctr <= 7; $ctr++)
          <option value="{{ $ctr }}" {{ ($ctr == $student->it_level) ? 'selected' : null }}>{{ $ctr }}</option>
          @endfor
        </select>
      </div>

    </div>
  </div>

  <div class="pb-3 row">
    <div class="col-3 font-weight-bold">English</div>
    <div class="col-9">
      <div class="form-group position-relative">
        <label for="formEnglishReading" class="form-label pt-0">Reading</label>
        <input type="number" class="form-control" id="formEnglishReading" name="reading" value="{{ $student->reading }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formEnglishListening" class="form-label pt-0">Listening</label>
        <input type="number" class="form-control" id="formEnglishListening" name="listening" value="{{ $student->listening }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formEnglishSpeaking" class="form-label pt-0">Speaking</label>
        <input type="number" class="form-control" id="formEnglishSpeaking" name="speaking" value="{{ $student->speaking }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formEnglishWriting" class="form-label pt-0">Writing</label>
        <input type="number" class="form-control" id="formEnglishWriting" name="writing" value="{{ $student->writing }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formEnglishLevel" class="form-label pt-0">現在のレベル</label>
        <select class="form-control" id="formEnglishLevel" name="english_level">
          <option value="" selected hidden disabled>Choose english level</option>
          @for ($ctr = 1; $ctr <= 7; $ctr++)
          <option value="{{ $ctr }}" {{ ($ctr == $student->english_level) ? 'selected' : null }}>{{ $ctr }}</option>
          @endfor
        </select>
      </div>

    </div>
  </div>

  <div class="form-group row">
    <div class="col-6 py-4 mx-auto">
      <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
    </div>
  </div>
</form>