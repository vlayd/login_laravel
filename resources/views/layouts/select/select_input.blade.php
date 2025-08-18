<label class="form-label">{{$nomeItem}}</label>
<select class="form-control" name="categoria" id="" data-trigger>
    <option class="" value="">Escolha...</option>
    @foreach ($items as $item)
    <option value="{{$item->id}}" {{isset($idSelect)&&$idSelect==$item->id?'selected':''}}>{{$item->nome}}</option>
    @endforeach
</select>
