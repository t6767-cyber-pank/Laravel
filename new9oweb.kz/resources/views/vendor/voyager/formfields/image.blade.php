@if(isset($dataTypeContent->{$row->field}))
    <div data-field-name="{{ $row->field }}">
        <img src="@if( !filter_var($dataTypeContent->{$row->field}, FILTER_VALIDATE_URL)){{ Voyager::image( $dataTypeContent->{$row->field} ) }}@else{{ $dataTypeContent->{$row->field} }}@endif"
             data-file-name="{{ $dataTypeContent->{$row->field} }}" data-id="{{ $dataTypeContent->getKey() }}"
             style="max-width: 50%; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
    </div>
@endif
<input @if($row->required == 1 && !isset($dataTypeContent->{$row->field})) required @endif type="file" style="width: 145px;" name="{{ $row->field }}" accept="image/*">
