<input @if($row->required == 1) required @endif type="text" class="form-control" name="{{ $row->field }}"
       placeholder="{{ old($row->field, $options->placeholder ?? $row->getTranslatedAttribute('display_name')) }}"
       {!! isBreadSlugAutoGenerator($options) !!}
       value="99999999999999999999999{{ old($row->field, $dataTypeContent->{$row->field} ?? $options->default ?? '') }}">000000000000000
