@extends('layouts.master')
@section('main-content')
    <div class="container">
        <div class="subject">
            <h4>4. ALGORITHM ANALYSIS AND DESIGN</h4>
        </div>
        <form action={{ route('step5') }} method="post">
            @csrf
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">รหัสนักศึกษา</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getStudents as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->firstname }}</td>
                            <td>{{ $item->lastname }}</td>
                            <td>
                                <input type="hidden" name="user_id" value={{ $user_id }}><button
                                    value={{ $item->id }} name="vote" type="submit"
                                    class="btn btn-success">โหวต</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>

@endsection
