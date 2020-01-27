@php
 $model = $model ?? 'payments';
 $data = $payment;
 if ($model != 'payments') {
 	$data = ['ticket' => $payment->id];
 }
@endphp
<tr>
	<td class="d-flex">
	  <img src="{{ $payment->transactionable->avatar }}" class="avatar float-left">
	  <div class="ml-3">
	    <h3 class="font-weight-bold h6">{{ $payment->transactionable->display_name }}</h3>
	    <p class="text-muted mb-0">{{ $payment->transactionable->description }}</p>
	    <time>{{ $payment->created_at->format('Y年m月') }}</time>
	    @if ($model == 'payments')
	    	<span><strong>items</strong> {{ $payment->items }}</span>
	    @endif
	  </div>
	</td>
  	<td>{{ $payment->total_tickets ?? $payment->tickets }}</td>
	<td>{{ price($payment->total) }}</td>
  @if (! $payment->is_approved || $model == 'payments')
		<td>
		  <div class="payment-actions d-flex justify-content-between">
		  	@if ($model == 'payments')
		    	<a href="{{ route('admin.payments.show', $payment) }}" class="btn btn-link p-0">詳細</a>
		    @endif
		    @if (! $payment->is_approved)
			    <div class="payment-actions d-flex justify-content-between">
			      <button type="submit" data-type="delete" form="deleteForm-{{ $payment->id }}" class="js-ticket-delete btn btn-link text-decoration-none text-muted p-0">削除</button>
				      <form id="deleteForm-{{ $payment->id }}" method="POST" action="{{ route('admin.' . $model . '.destroy', $data) }}" novalidate style="visibility: hidden; position: absolute;">
				        @csrf
				        {{ method_field('DELETE') }}
				      </form>
		  		</div>
	  		@endif
	  	</div>
		</td>
	@endif
</tr>
