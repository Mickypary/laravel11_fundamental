@foreach ($single_student as $item)
    Name: {{ $item->name }} <br>
    Email: {{ $item->email }} <br>
    Phone: {{ $item->phone }} <br><br><br>
@endforeach


    {{-- @foreach ($student as $item) --}}
    {{-- Name: {{ $student_row[0]->name }} <br>
    Email: {{ $student_row[0]->email }} <br>
    Phone: {{ $student_row[0]->phone }} <br><br><br> --}}
{{-- @endforeach --}}
