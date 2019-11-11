<div class="tab-pane fade" id="pills-grades" role="tabpanel" aria-labelledby="pills-grades-tab">
  <table class="table mb-4">
    <tr>
      <th class="border-top-0 text-center" colspan="2">
        <h4>IT</h4>
      </th>
    </tr>
    <tr>
      <td style="width: 25%" class="font-weight-bold">レッスン</td>
      <td>
        <dl>
          <dt>受講済み</dt>
          @if (! $student->taken_class)
            <dd>{{ '--' }}</dd>
          @endif
          @foreach($student->taken_class as $class)
            <dd>{{ $class }}</dd>
          @endforeach
          <dt>受講中</dt>
          <dd>{{ $student->course }}</dd>
        </dl>
      </td>
    </tr>
    <tr>
      <td class="font-weight-bold">ITレベル</td>
      <td>{{ $student->it_level ?? '--' }}</td>
    </tr>
  </table>
  <table class="table mb-4">
    <tr>
      <th class="border-top-0 text-center" colspan="2">
        <h4>English</h4>
      </th>
    </tr>
    <tr>
      <td style="width: 25%" class="font-weight-bold">Reading</td>
      <td>{{ $student->reading ?? '--' }}</td>
    </tr>
    <tr>
      <td class="font-weight-bold">Listening</td>
      <td>{{ $student->listening ?? '--' }}</td>
    </tr>
    <tr>
      <td class="font-weight-bold">R&L Total</td>
      <td>{{ '--' }}</td>
    </tr>
    <tr>
      <td class="font-weight-bold">Speaking</td>
      <td>{{ $student->speaking ?? '--' }}</td>
    </tr>
    <tr>
      <td class="font-weight-bold">Writing</td>
      <td>{{ $student->writing ?? '--' }}</td>
    </tr>
    <tr>
      <td class="font-weight-bold">英語レベル</td>
      <td>{{ $student->english_level ?? '--' }}</td>
    </tr>
  </table>
</div>