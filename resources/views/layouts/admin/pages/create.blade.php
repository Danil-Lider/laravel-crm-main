@include('layouts.admin.header')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <section class="content">

                    <form action="{{ route('pages.store') }}" method="POST">
                        @csrf
                    <!-- Default box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"></h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Наименование страницы</label>
                                <input name="name" type="text" id="inputName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Url страницы</label>
                                <input name="slug" type="text" id="inputName" class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="col-12">
                        <a href="{{route('pages.index')}}" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Create new Project" class="btn btn-success float-right">
                    </div>
                    </form>
                </section>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@include('layouts.admin.footer')
