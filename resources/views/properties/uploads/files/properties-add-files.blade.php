    @extends('layouts.app', ['title' => __('Ativos')])

    @section('content')
        @include('partner.partials.header-profile', [
        'title' => __('Ativos'),
        'description' => __('Incluir Anexos'),
        'class' => 'col-lg-12'
        ])

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header">
                            <div class="col-6">
                                <div class="row">
                                    <a href="{{ route('properties.edit.files', $properties->id) }}"
                                        class="btn btn-primary btn-outline-primary">
                                        <i class="far fa-edit"></i> Editar Arquivos
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST"
                                action="{{ route('properties.add.files.post', ['properties' => $properties->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-header bg-white border-0">
                                    <div class="container">

                                        <main role="main" class="container">
                                            @include('partials.alerts')
                                            @yield('content')
                                        </main>

                                        <div class="form-group">
                                            <label for="partner">Nome do Ativo</label>
                                            <div class="input-group mb-4" id="partner">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Nome do Sócio" type="text"
                                                    name="propertieid" value="{{ $properties->id }}" hidden>
                                                <input class="form-control" placeholder="Nome do Sócio" type="text"
                                                    name="propertie" value="{{ $properties->name }}" readonly>
                                            </div>
                                            @if ($errors->has('propertie'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('propertie') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Nome do Arquivo</label>
                                                    <div class="input-group mb-4" id="name">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="far fa-file"></i></span>
                                                        </div>
                                                        <input class="form-control" placeholder="Insira o nome do arquivo."
                                                            type="text" name="name" value="{{ old('name') }}">
                                                    </div>
                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="filetype">Tipo do Anexo</label>
                                                    <div class="input-group mb-4" id="filetype">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-file-signature"></i></span>
                                                        </div>
                                                        <select class="custom-select" id="filetype" name="filetype">
                                                            @foreach ($filetypes as $item)
                                                                @if ($item->status === 1)
                                                                    <option value="{{ $item->name }}">{{ $item->name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('filetype'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $errors->first('filetype') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!--<label for="checkbox">Anexar Arquivo</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="files"><i
                                                                        class="fas fa-upload"></i>&ensp;Upload</span>
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="files"
                                                                    aria-describedby="files" name="files">
                                                                <label class="custom-file-label" for="files">Selecione</label>
                                                            </div>
                                                           
                                                                                                    
                                                        </div>-->
                                            <div class="form-group">
                                                <label for="files"><i class="fas fa-upload"></i>&ensp;Anexar Arquivo</label>
                                                <br>
                                                <!--<input type="file" class="form-control-file" id="files" name="files">-->
                                                <input type='file' name="files">
                                            </div>
                                            @if ($errors->has('files'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('files') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <hr>

                                        <div class="text-start">
                                            <button type="submit" class="btn btn-primary btn-outline-primary mt-4"><i
                                                    class="fa fa-save" aria-hidden="true"></i>
                                                {{ __('Salvar') }}</button>
                                            <a href="{{ route('propertie.show', $properties->id) }}"
                                                class="btn btn-primary btn-outline-primary mt-4" type="button">
                                                <i class="fas fa-chevron-circle-left" aria-hidden="true"></i> Retornar
                                            </a>
                                        </div>
                                    </div>

                                </div>

                            </form>


                            <hr class="my-4" />
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.footers.auth')
        </div>
    @endsection
