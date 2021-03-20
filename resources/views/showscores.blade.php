@extends('layouts.master')
@section('main-content')
    <div class="container">
        <div class="subject">

            <h4>ตารางคะแนนแต่ละวิชา</h4>
            <form action={{ route('getsubject') }} method="post">
                @csrf
                @foreach ($getsubjects as $subject)
                    <button class="btn btn-info mx-2 my-2" name="subject"
                        value={{ $subject->id }}>{{ $subject->name }}</button><br><br>

                @endforeach
        </div>

        </form>
        <div class="card">
            <h5 class="card-header"></h5>
            <div class="card-body">
                <div class="row mt-5 d-flex justify-content-center">
                    @if (isset($showSub))
                        {{-- @foreach ($showSub as $item) --}}
                        <span class="text-success ">{{ $showSub->name }}</span>
                        {{-- @endforeach --}}
                    @else
                        <span class="text-success ">PROGRAMMING FUNDAMENTALS</span>
                    @endif
                </div>
                <div class="row d-flex justify-content-center my-5">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">รหัสนักศึกษา</th>
                                {{-- <th scope="col">ชื่อนักศึกษา</th> --}}
                                <th scope="col">คะแนน</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allscores as $score)
                                <tr>
                                    <td>{{ $score->student_id }}</td>
                                    {{-- <td>{{ $score->students->firstname }}</td> --}}
                                    <td>{{ $score->point }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection
