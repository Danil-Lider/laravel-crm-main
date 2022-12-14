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
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th style="width: 20%">
                                        Наименование страницы
                                    </th>
                                    <th style="width: 30%">
                                        Имеет доступ для редактирования
                                    </th>
                                    <th>
                                        Прогресс проекта
                                    </th>
                                    <th style="width: 8%" class="text-center">
                                        Статус
                                    </th>
                                    <th style="width: 20%">
                                    </th>
                                </tr>
                                </thead>
                                @if(!empty($components))
                                <tbody>
                                @foreach($components as $key => $page)
                                <tr>
                                    <td>
                                        {{ $key }}
                                    </td>
                                    <td>
                                        <a>
                                            {{ $page->name }}
                                        </a>
                                        <br>
                                        <small>
                                            Created  {{ $page->created_at }}
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar2.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar3.png">
                                            </li>
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png">
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project_progress">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                            </div>
                                        </div>
                                        <small>
                                            57% Complete
                                        </small>
                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-success">Success</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ route('components.edit',$page->id) }}">
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
                                @endif
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="col-12">
                        <a href="{{route('components.create')}}" class="btn btn-success float-right">Создать новую страницу</a>
{{--                        <input type="submit" value="Create new Project" class="btn btn-success float-right">--}}
                    </div>

                </section>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@include('layouts.admin.footer')
