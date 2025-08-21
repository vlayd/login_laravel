<div class="{{$classe??'col-12'}} mb-2">
    <div class="form-group">
        <label for="{{$campo??''}}" class="form-label">{{$label??'Label'}}</label>
        <select class="form-control" name="{{$campo??''}}" id="{{$campo??''}}" data-trigger>
            <option value="0">Escolha...</option>
            @foreach ($items as $item)
            <option value="{{$item->id}}" {{isset($idSelect)&&$idSelect==$item->id?'selected':''}}>{{$item->nome}}</option>
            @endforeach
        </select>
    </div>
</div>
