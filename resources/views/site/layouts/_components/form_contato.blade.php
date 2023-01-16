{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{ $classe }}">
    @if ($errors->has('nome'))
    <div style="color: red">
        {{ $errors->first('nome')}}
    </div> 
    @endif
    <br>
    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{ $classe }}">
    <div style="color: red">
        {{ $errors->has('telefone') ? $errors->first('telefone') : ''}}
    </div> 

    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{ $classe }}">
    <div style="color: red">
        {{ $errors->has('email') ? $errors->first('email') : ''}}
    </div>
    <br>
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contato as $key=>$motivo_contato)
            <option value={{$motivo_contato->id}} {{old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach

        {{-- OR --}}

        {{-- <option value="1" {{old('motivo_contato') == 1 ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>
        <option value="2" {{old('motivo_contato') == 2 ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>
        <option value="3" {{old('motivo_contato') == 3 ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option> --}}
    </select>
    <div style="color: red">
        {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}
    </div>
    <br>
    <textarea name="mensagem" class="{{ $classe }}">{{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }}
    </textarea>
    <div style="color: red">
        {{ $errors->has('mensagem') ? $errors->first('mensagem') : ''}}
    </div>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

{{-- @if($errors->any())
    <div style="color: white; background-color: red">
        @foreach ($errors->all() as $erro)
          {{ $erro }} 
          <br>
        @endforeach
    </div>
@endif --}}
