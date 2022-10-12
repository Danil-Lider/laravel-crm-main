@include('layouts.admin.header')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <section class="content">



            <form action="{{ route('infoblock.values.store',[$infoblock_id]) }}" method="POST">
            @csrf
            <!-- Default box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
{{--                            @if(count($attr) <= 4)--}}
                                <a href="{{route('components.edit', $component_id) }}"> Создать поля для компонента {{$component_id}}</a>
{{--                            @endif--}}
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <input name="component_id" value="{{$component_id}}" type="hidden" id="inputName" class="form-control">



                        @foreach($attr as $key => $item)

                            @switch($item)

                                @case ('created_at')
                                @break;
                                @case ('updated_at')
                                @break;

                                @case ('id')
                                    <input name="id" type="hidden" id="inputName" class="form-control">
                                @break;

                                @case ('infoblock_id')
                                    <input name="infoblock_id" type="hidden" value="{{$infoblock_id}}" id="inputName" class="form-control">
                                @break;

                                @default

                                    <div class="form-group">
                                        <label for="inputName"> {{$item}}</label>
                                        <input name="{{$item}}" type="text" id="inputName" class="form-control">
                                    </div>

                                @break;

                            @endswitch


                        @endforeach


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
