
<x-layouts.backend>
    <div class="ibox ">
        <a href="{{ route('backend.category.create') }}" class="btn btn-primary">Thêm mới</a>
        <div class="ibox-title">
            <h5>Category
{{--                @if($dl)--}}
{{--                    <span>- Kết quả tìm kiếm cho: {{ $dl['search'] }}</span>--}}

{{--                 @endif--}}
            </h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#" class="dropdown-item">Config option 1</a>
                    </li>
                    <li><a href="#" class="dropdown-item">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="search-form" style="margin-bottom: 10px;">
            <form action="{{ route('backend.category.index') }}" method="get">
                <div class="input-group">
                    <input type="text" placeholder="Search..." name="search" id="search" class="form-control form-control-lg" value="{{ $dl['search'] ?? '' }}">
                    <div class="input-group-btn">
                        <button class="btn btn-lg btn-primary" type="submit">
                            Search
                        </button>
                    </div>
                </div>

            </form>
        </div>
        <div class="ibox-content">

            <table class="table">
                <thead>
                <tr>
                    <th>Stt</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Thời gian tạo</th>
                    <th width="10%">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $n = $offset + 1 ?>
                @if(count($category))
                    @foreach($category as $key => $value)
                        <tr>
                            <td>{{ $n }}</td>
                            <td>{{ $value->name ?? '' }}</td>
                            <td>{{ $value->slug ?? ''}}</td>
                            <td>{{ !empty($value->created_at) ? date('d-m-Y', strtotime($value->created_at)) : '' }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn-white btn btn-xs">View</a>
                                    <a href="{{ route('backend.category.edit', ['id'=>$value->id]) }}" class="btn-white btn btn-xs">Edit</a>
                                    <a href="#" class="btn-white btn btn-xs onDelete" data-id="{{ $value->id }}">Delete</a>
                                </div>
                            </td>
                        </tr>
                       <?php  $n++ ?>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{ $category->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

    @include('components.backend.shared.messages')
    @include('components.backend.shared.modal')
  <x-slot name="javascript">

      <script type="text/javascript">
          $( document ).ready(function() {

              $(document).on('click', '.onDelete', function (){
                  let id = $(this).data('id');
                  $('#all_id').val(id);
                  $('#deleteModal').modal('show')
              });

              $(document).on('click', 'button#deleteOK', function () {

                  let id = $('#all_id').val();
                  let data = {
                      _token: '{{ csrf_token() }}',
                      id : id
                  }

                 $.ajax({
                     type: 'POST',
                     url: '{{ route('backend.category.destroy') }}',
                     dataType: 'json',
                     data: data,
                     success: function(json){
                         if(json.status == 'success'){
                             window.location.reload();
                         }
                     }
                });
              });
          });
      </script>

  </x-slot>

</x-layouts.backend>
