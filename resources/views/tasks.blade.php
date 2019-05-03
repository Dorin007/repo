@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Insarcinare noua
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Insarcinarea</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Adauga insarcinare
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Insarcinari curente
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Insarcinari</th>
                                 <th>&nbsp;</th>
                                <th>Id</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Data crearii</th>
                                <th>Actiune</th>
                                
                               
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <td class="table-text"><div><br>{{ $task->id }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                             <td>
                                            <td class="table-text"><div>{{ $task->created_at }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" onclick="alert('Felicitari, ai indeplinit insarcinarea : {{ $task->name }}')" class="btn btn-success">
                                                    <i class="fa fa-btn fa-check"></i>Indeplinit
                                                    <i class="fa fa-btn fa-check"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
