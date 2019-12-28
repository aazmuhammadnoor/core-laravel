<table id="datatable" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th class="no">No</th>
      <th class="name">Nama Permission</th>
      <th class="created">Created</th>
      <th class="updated">Updated</th>
      <th class="action">Action</th>
    </tr>
  </thead>
  <tbody id="row-table">
    @php 
      $no = ($data->currentPage()-1)*$data->perPage() 
    @endphp

    @foreach($data as $row)
      @php $no ++ @endphp
      <tr>
        <td class="no">{{ $no }}</td>
        <td class="name">{{ $row->name }}</td>
        <td class="created">{{ $row->created_at }}</td>
        <td class="updated">{{ $row->updated_at }}</td>
        <td class="action">
          <a href="{{ route('backend.permission.edit',[$row->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
          <button class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete" id="btn-delete" data-action="{{ route('backend.permission.delete',[$row->id]) }}" data-name="{{ $row->name }}">
            <i class="fa fa-trash"></i>
          </button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>