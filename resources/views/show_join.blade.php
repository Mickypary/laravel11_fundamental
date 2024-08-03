@foreach ($all_data as $item)
Name: {{ $item->name }} <br>
Email: {{ $item->email }} <br>
{{-- Phone: {{ $item->rPhone->phone }} <br><br><br> --}}
@foreach($item->rPhone as $phone)
Phone: {{ $phone->phone }} <br>
@endforeach
<br><br>
{{-- Fee Amount: {{ $item->fee_amount }} <br> --}}
{{-- Fee Month: {{ $item->fee_month }} <br><br><br> --}}
@endforeach