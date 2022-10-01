@include('layouts.admin.header')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <section class="content">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('components.store') }}" method="POST">
                        @csrf
                         <!-- Default box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Все поля</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">

                                 @foreach($columns as $column)

                                    <div class="form-group">
                                        <label for="inputName">{{$column}}</label>
                                        <input name="{{$column}}" value="{{$column}}" type="text" id="inputName" class="form-control">
                                    </div>

                                @endforeach



                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                         <div class="col-12">
                        <a href="{{route('components.index')}}" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Create new Project" class="btn btn-success float-right">
                    </div>
                    </form>
                        <br><br>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Создать новое поле</h3>
                        </div>
                        <form action="{{ route('components.update', $id ) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="component_id" value="{{$id}}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Наименование столбца</label>
                                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Наименование столбца">
                                </div>
                                <div class="form-group">
                                    <label>Тип поля</label>
                                    <select name="type" class="custom-select">
                                        <option value="float" >число float</option>
                                        <option value="string">Строка string</option>
                                        <option value="integer">Число integer</option>
                                        <option value="text">Текст text</option>
                                        <option value="boolean">boolean</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input name="is_myltifield" type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Множественное значение(в работе)</label>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@include('layouts.admin.footer')
