<table id="datatable" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th class="no">No</th>
      <th class="name">Name</th>
      <th class="url">URL</th>
      <th class="parent">Parent</th>
      <th class="icon">Icon</th>
      <th class="action">Action</th>
    </tr>
  </thead>
  <tbody>
    @php 
      $no = ($data->currentPage()-1)*$data->perPage() 
    @endphp

    @foreach($data as $row)
      @php $no ++ @endphp
      <tr>
        <td class="no">{{ $no }}</td>
        <td class="name">{{ $row->name }}</td>
        <td class="url">{{ $row->url }}</td>
        <td class="parent">{!! ($row->thisParent) ? $row->thisParent->name : '<i class="text-danger"> -- no parent --</i>'!!}</td>
        <td class="icon">{{ $row->icon }}</td>
        <td class="action">
          <a href="{{ route('backend.menu.edit',[$row->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
          <button class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete" id="btn-delete" data-action="{{ route('backend.menu.delete',[$row->id]) }}" data-name="{{ $row->name }}">
            <i class="fa fa-trash"></i>
          </button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>