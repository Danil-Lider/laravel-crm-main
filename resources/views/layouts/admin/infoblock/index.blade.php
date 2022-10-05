@include('layouts.admin.header')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <section class="content">

                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Projects</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    @foreach($attr as $key => $item)
                                        <th style="width: 20%">
                                           {{$item}}
                                        </th>
                                    @endforeach

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($data as $key => $data_values)
                                <tr>
                                    @foreach($attr as $attr_key => $attr_value)
                                        <td><div>{{$data_values->$attr_value}}</div></td>
                                    @endforeach
                                    <td class="project-state">
                                        <span class="badge badge-success">Success</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ route('infoblock.values.edit',[$id, $data_values->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="col-12">
                        <a href="{{ route('infoblock.values.create',[$id]) }}" class="btn btn-success float-right">Создать новую страницу</a>
{{--                        <input type="submit" value="Create new Project" class="btn btn-success float-right">--}}
                    </div>

                </section>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@include('layouts.admin.footer')
