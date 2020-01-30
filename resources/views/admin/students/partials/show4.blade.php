<div class="tab-pane fade" id="pills-grades" role="tabpanel" aria-labelledby="pills-grades-tab">
<table class="table">
    <tbody>
      <tr>
        <td width="25%" class="font-weight-bold">IT</td>
        <td>
          <dl>
            <dt class="text-muted">受講済み</dt>
            <dd>
              @foreach($courses as $index => $name)
                <dt class="text-muted">{{ $name }}</dt>
                <dd>{{ skillRate($student->listed_skills[$index] ?? 0) }}</dd>
              @endforeach
            </dd>
            <dt class="text-muted">受講中</dt>
            <dd>{{ $student->course ?? '--' }}</dd>
            <dt class="text-muted">ITレベル</dt>
            <dd>{{ $student->it_level ?? '--' }}</dd>
          </dl>
        </td>
      </tr>
      <tr>
        <td class="font-weight-bold">English</td>
        <td>
          <dl>
            <dt class="text-muted">Reading</dt>
            <dd>{{ $student->reading ?? 0 }}</dd>
            <dt class="text-muted">Listening</dt>
            <dd>{{ $student->listening ?? 0 }}</dd>
            <dt class="text-muted">R&L Total</dt>
            <dd>{{ $student->reading + $student->listening ?? 0 }}</dd>
            <dt class="text-muted">Speaking</dt>
            <dd>{{ $student->speaking ?? 0 }}</dd>
            <dt class="text-muted">Writing</dt>
            <dd>{{ $student->writing ?? 0 }}</dd>
            <dt class="text-muted">現在のレベル</dt>
            <dd>{{ $student->english_level ?? 0 }}</dd>
          </dl>
        </td>
      </tr>

    </tbody>
  </table>
</div>
