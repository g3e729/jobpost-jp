
@if ($data instanceof \Illuminate\Pagination\LengthAwarePaginator)
	{{ $data->appends(request()->except('page'))->links() }}
@endif
{{-- <nav aria-label="Page Navigation">
	<ul class="pagination justify-content-center py-4">
	  <li class="page-item disabled"><a class="page-link" href="#">前</a></li>
	  
	  <li class="page-item active"><a class="page-link" href="#">1</a></li>
	  
	  <li class="page-item "><a class="page-link" href="#">2</a></li>
	  
	  <li class="page-item "><a class="page-link" href="#">3</a></li>
	  
	  <li class="page-item"><a class="page-link" href="#">次</a></li>
	</ul>
</nav> --}}