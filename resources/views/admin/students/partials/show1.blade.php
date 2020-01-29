<div class="tab-pane fade show active" id="pills-basic" role="tabpanel" aria-labelledby="pills-basic-tab">
  <table class="table">
    <tbody>
      <tr>
        <td style="width: 25%" class="font-weight-bold">名前(Japanese)</td>
        <td>{{ $student->japanese_name ?? '--' }}</td>
      </tr>
      <tr>
        <td class="font-weight-bold">名前(English)</td>
        <td>{{ $student->name ?? '--' }}</td>
      </tr>
      <tr>
        <td class="font-weight-bold">生年月日 / 年齢 </td>
        <td>{{ $student->birthday->format('Y年m月d日') }} / {{ $student->birthday->diff(now())->format('%y') ?? '--' }}</td>
      </tr>
      <tr>
        <td class="font-weight-bold">住所</td>
        <td>
          <dl>
            <dt>都道府県</dt>
            <dd>
              <a href="{{ route('admin.companies.index', ['prefecture' => $student->prefecture]) }}">
                {{ $student->prefecture ? getPrefecture($student->prefecture) : '--' }}
              </a>
            </dd>
            <dt>番地まで</dt>
            <dd>{{ $student->address1 }}</dd>
            <dt>ビル名、部屋番号</dt>
            <dd>{{ $student->address2 }}</dd>
            <dt>郵便番号</dt>
            <dd>{{ $student->address3 }}</dd>
          </dl>
        </td>
      </tr>
      <tr>
        <td class="font-weight-bold">性別</td>
        <td>{{ getSex($student->sex) ?? '--' }}</td>
      </tr>
      <tr>
        <td class="font-weight-bold">電話番号</td>
        <td>{{ $student->contact_number ?? '--' }}</td>
      </tr>
      <tr>
        <td class="font-weight-bold">メールアドレス</td>
        <td>{{ $student->email ?? '--' }}</td>
      </tr>
      <tr>
        <td class="font-weight-bold">留学費用</td>
        <td>{{ price($student->study_abroad_fee) }}</td>
      </tr>
      <tr>
        <td class="font-weight-bold">入学日</td>
        <td>{{ $student->enrollment_date ? $student->enrollment_date->format('Y年m月d日') : '--' ?? '--' }}</td>
      </tr>
      <tr>
        <td class="font-weight-bold">卒業日</td>
        <td>{{ $student->graduation_date ? $student->graduation_date->format('Y年m月d日') :'--' ?? '--' }}</td>
      </tr>
      <tr>
        <td class="font-weight-bold">ステータス</td>
        <td>{{ $student->student_status ?? '--' }}</td>
      </tr>
      <tr>
        <td class="font-weight-bold">ご職業</td>
        <td>{{ $student->occupation ?? '--' }}</td>
      </tr>
      <tr>
        <td class="font-weight-bold">備考</td>
        <td style="white-space: pre-line;">{{ $student->description ?? '--' }}</td>
      </tr>
    </tbody>
  </table>
</div>
