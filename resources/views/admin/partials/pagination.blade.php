<div class="d-flex justify-content-center pt-4 pb-5">
  @if ($data instanceof \Illuminate\Pagination\LengthAwarePaginator)
    {{ $data->appends(request()->except('page'))->links() }}
  @endif
</div>