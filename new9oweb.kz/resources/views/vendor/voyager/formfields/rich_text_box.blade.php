<textarea class="form-control richTextBox" name="{{ $row->field }}" id="richtext{{ $row->field }}" style="height: 50%">
    {{ old($row->field, $dataTypeContent->{$row->field} ?? '') }}
</textarea>
