@include('layouts.admin.header')
        <!-- Main content -->

        <section class="content">
            <div class="container-fluid">

                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="false">Настройки</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Инфоблоки</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="true">Редакитрование</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Дополнительно</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">


                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                               Настройки страницы
                            </div>
                            <div class="tab-pane fade  active show" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Все инфоблоки</h3>

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
                                                    id компонента
                                                </th>
                                                <th style="width: 20%">
                                                    наименование компонента
                                                </th>
                                                <th style="width: 20%">
                                                    сортировка компонента
                                                </th>
                                                <th style="width: 8%" class="text-center">
                                                    Статус
                                                </th>
                                                <th style="width: 20%">
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($this_page_components as $key => $this_page_component)
                                                <tr>
                                                    <td>
                                                        {{ $this_page_component->id }}
                                                    </td>
                                                    <td>
                                                        <a>
                                                            {{ $this_page_component->component_id }}
                                                        </a>
                                                        <br>
                                                        <small>
                                                            Created  {{ $this_page_component->created_at }}
                                                        </small>
                                                    </td>
                                                    <td> {{ $this_page_component->name }}</td>
                                                    <td> {{ $this_page_component->sort }}</td>
                                                    <td class="project-state">
                                                        <span class="badge badge-success">Success</span>
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm" href="#">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            Vieww
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="{{ route('infoblock.edit',$this_page_component->id, $this_page_component->component_id) }}">
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
                                    </div>
                                <div class="card card-primary card-body">
                                    <form action="{{ route('infoblock.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="page_id" value="{{$page_id}}">
                                        <div class="form-group ">
                                            <label for="component_id">Добавить инфоблок</label>
                                            <select id="component_id" name="component_id" class="form-control">
                                                @foreach($all_components as $key => $component )
                                                    <option   value="{{$component->id}}">{{$component->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <label for="component_id">Наименование инфоблока</label>
                                            <input name="name" class="form-control" type="text" placeholder="Наименование инфоблока" aria-label="Наименование инфоблока">
                                        </div>
                                        <div class="form-group ">
                                            <label for="component_id">сортировка инфоблока</label>
                                            <input name="sort" class="form-control" type="number" value="100" placeholder="сортировка инфоблока" aria-label="сортировка инфоблока">
                                        </div>
                                        <input type="submit" value="Добавить" class="btn btn-success">
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                                Выберите инфоблок и начните его редактировать
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                                Дополнительно
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>




            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@include('layouts.admin.footer')
