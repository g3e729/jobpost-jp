<form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="{{ route('admin.students.update', $student) }}" novalidate>
  @csrf
  {{ method_field('PATCH') }}

  <input type="hidden" name="step" value="4">

  <div class="pb-3 row">
    <div class="col-3 font-weight-bold">IT</div>
    <div class="col-9">
      <button type="button" data-target="js-class-taken" data-title="" id="js-modal-target" class="mb-3 alt-font btn btn-primary btn-sm">編集する</button>

      <div id="js-class-taken" class="form-group row" style="display: none;">
        @foreach($courses as $index => $name)
          <div class="col-4 font-weight-bold">{{ ucwords($name) }}</div>
          <div class="col-8 text-right">
            <div class="js-btn-group btn-group btn-group-toggle" data-toggle="buttons">
              @foreach($rates as $rate => $text)
                @php
                  $skill_rate = isset($student->listed_skills[$index]) ? $student->listed_skills[$index] : 0;
                @endphp
                <label class="alt-font btn btn-light {{ $skill_rate == $rate ? 'active' : ''}}">
                    <input type="radio" name="{{ $rate }}" value="{{ $rate }}" autocomplete="off" {{ $skill_rate == $rate ? 'checked' : ''}}/> {{ $text }}
                </label>
              @endforeach
            </div>
          </div>
        @endforeach
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
          @foreach ($english_levels as $id => $english_level)
            <option value="{{ $id }}" {{ ($id == $student->english_level_id) ? 'selected' : null }}>{{ $english_level }}</option>
          @endforeach
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

<div class="modal fade" id="js-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="alt-font btn btn-secondary" data-dismiss="modal">キャンセル</button>
        <button id="js-modal-submit" type="button" class="alt-font btn btn-primary">確認する</button>
      </div>
    </div>
  </div>
</div>

<script>
  const targetButton = document.querySelector('#js-modal-target');
  const modalSubmit = document.querySelector('#js-modal-submit');
  const modal = document.querySelector('#js-modal');
  const elementForm = document.forms['editForm'];

  targetButton.addEventListener('click', function(event) {
    event.preventDefault();

    let title = this.dataset.title;
    let target = this.dataset.target;
    let elementTarget = document.querySelector(`#${target}`);
    let elementClone = elementTarget.cloneNode(true);
    elementClone.style.display = 'flex';

    modal.querySelector('.modal-title').textContent = title;
    modal.querySelector('.modal-body').textContent = null;
    modal.querySelector('.modal-body').appendChild(elementClone);

    $(modal).modal('show');

    const elementModal = modal.querySelector('.modal-body');
    const elementsRadio = elementModal.querySelectorAll('input[type="radio"]');

    $(elementsRadio).on('change', (ev) => {
      const actualActive = ev.currentTarget.value;

      let elementInput = ev.currentTarget.name;
      let elementsGroup = elementForm.querySelectorAll(`[name="${elementInput}"]`);
      let elementsParent = [...elementsGroup].map(e => e.parentNode);

      elementsParent.forEach((el, idx) => {
        el.classList.remove('active');
        el.children[0].removeAttribute('checked');

        if (idx == actualActive) {
          el.classList.add('active');
          el.children[0].setAttribute('checked', 'checked');
        }
      });
    });
  });

  modalSubmit.addEventListener('click', function(event) {
    $(modal).modal('hide');
    elementForm.submit();
  });
</script>
