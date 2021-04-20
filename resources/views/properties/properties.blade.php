@extends('layouts.app', ['title' => __('Usuários')])

@section('content')
    @include('properties.partials.header-profile', [
    'title' => __('Ativos'),
    'description' => __(''),
    'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <!--<div class="row align-items-center">
                                                    <a href="{{ '/users/create' }}" class="btn btn-icon btn-3 btn-primary" type="button">
                                                        <span class="btn-inner--icon"><i class="fas fa-coins"></i></span>
                                                        <span class="btn-inner--text">Histórico de Despesas</span>
                                                    </a>
                                                </div>-->
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="https://s2.glbimg.com/l5tf5ALrBpZgm6SyiYv55yoUlh0=/620x413/smart/e.glbimg.com/og/ed/f/original/2020/01/20/leve-e-iluminada-esta-casa-na-bahia-mistura-estrutura-metalica-madeira-e-vidro_9.jpg"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Nome do Ativo</h3>
                                            <p class="card-text">
                                            <ul>
                                                <li>Valor Venal</li>
                                                <li>Area Total</li>
                                                <li>Localizacao</li>
                                                <li>Bairro</li>
                                            </ul>
                                            </p>
                                            <a href="#" class="btn btn-primary"><i class="fas fa-search-location"></i>
                                                Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4VI6hnXYBsADTV2RTKihRq2eU52CpUkAVuw&usqp=CAU"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Nome do Ativo</h3>
                                            <p class="card-text">
                                            <ul>
                                                <li>Valor Venal</li>
                                                <li>Area Total</li>
                                                <li>Localizacao</li>
                                                <li>Bairro</li>
                                            </ul>
                                            </p>
                                            <a href="#" class="btn btn-primary"><i class="fas fa-search-location"></i>
                                                Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="https://industrywired.b-cdn.net/wp-content/uploads/2021/03/BUilding.jpg"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Nome do Ativo</h3>
                                            <p class="card-text">
                                            <ul>
                                                <li>Valor Venal</li>
                                                <li>Area Total</li>
                                                <li>Localizacao</li>
                                                <li>Bairro</li>
                                            </ul>
                                            </p>
                                            <a href="#" class="btn btn-primary"><i class="fas fa-search-location"></i>
                                                Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-3 col-md-4 col-sm-12 mb-0">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="https://www.hotelfazendajacauna.com.br/wp-content/uploads/2018/08/7-setembro-hotel-fazenda-jacauna-brota-588x307.jpg"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Nome do Ativo</h3>
                                            <p class="card-text">
                                            <ul>
                                                <li>Valor Venal</li>
                                                <li>Area Total</li>
                                                <li>Localizacao</li>
                                                <li>Bairro</li>
                                            </ul>
                                            </p>
                                            <a href="#" class="btn btn-primary"><i class="fas fa-search-location"></i>
                                                Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="https://s2.glbimg.com/l5tf5ALrBpZgm6SyiYv55yoUlh0=/620x413/smart/e.glbimg.com/og/ed/f/original/2020/01/20/leve-e-iluminada-esta-casa-na-bahia-mistura-estrutura-metalica-madeira-e-vidro_9.jpg"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Nome do Ativo</h3>
                                            <p class="card-text">
                                            <ul>
                                                <li>Valor Venal</li>
                                                <li>Area Total</li>
                                                <li>Localizacao</li>
                                                <li>Bairro</li>
                                            </ul>
                                            </p>
                                            <a href="#" class="btn btn-primary"><i class="fas fa-search-location"></i>
                                                Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4VI6hnXYBsADTV2RTKihRq2eU52CpUkAVuw&usqp=CAU"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Nome do Ativo</h3>
                                            <p class="card-text">
                                            <ul>
                                                <li>Valor Venal</li>
                                                <li>Area Total</li>
                                                <li>Localizacao</li>
                                                <li>Bairro</li>
                                            </ul>
                                            </p>
                                            <a href="#" class="btn btn-primary"><i class="fas fa-search-location"></i>
                                                Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="https://industrywired.b-cdn.net/wp-content/uploads/2021/03/BUilding.jpg"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Nome do Ativo</h3>
                                            <p class="card-text">
                                            <ul>
                                                <li>Valor Venal</li>
                                                <li>Area Total</li>
                                                <li>Localizacao</li>
                                                <li>Bairro</li>
                                            </ul>
                                            </p>
                                            <a href="#" class="btn btn-primary"><i class="fas fa-search-location"></i>
                                                Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-3 col-md-4 col-sm-12 mb-0">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="https://www.hotelfazendajacauna.com.br/wp-content/uploads/2018/08/7-setembro-hotel-fazenda-jacauna-brota-588x307.jpg"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Nome do Ativo</h3>
                                            <p class="card-text">
                                            <ul>
                                                <li>Valor Venal</li>
                                                <li>Area Total</li>
                                                <li>Localizacao</li>
                                                <li>Bairro</li>
                                            </ul>
                                            </p>
                                            <a href="#" class="btn btn-primary"><i class="fas fa-search-location"></i>
                                                Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="https://s2.glbimg.com/l5tf5ALrBpZgm6SyiYv55yoUlh0=/620x413/smart/e.glbimg.com/og/ed/f/original/2020/01/20/leve-e-iluminada-esta-casa-na-bahia-mistura-estrutura-metalica-madeira-e-vidro_9.jpg"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Nome do Ativo</h3>
                                            <p class="card-text">
                                            <ul>
                                                <li>Valor Venal</li>
                                                <li>Area Total</li>
                                                <li>Localizacao</li>
                                                <li>Bairro</li>
                                            </ul>
                                            </p>
                                            <a href="#" class="btn btn-primary"><i class="fas fa-search-location"></i>
                                                Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4VI6hnXYBsADTV2RTKihRq2eU52CpUkAVuw&usqp=CAU"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Nome do Ativo</h3>
                                            <p class="card-text">
                                            <ul>
                                                <li>Valor Venal</li>
                                                <li>Area Total</li>
                                                <li>Localizacao</li>
                                                <li>Bairro</li>
                                            </ul>
                                            </p>
                                            <a href="#" class="btn btn-primary"><i class="fas fa-search-location"></i>
                                                Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="https://industrywired.b-cdn.net/wp-content/uploads/2021/03/BUilding.jpg"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Nome do Ativo</h3>
                                            <p class="card-text">
                                            <ul>
                                                <li>Valor Venal</li>
                                                <li>Area Total</li>
                                                <li>Localizacao</li>
                                                <li>Bairro</li>
                                            </ul>
                                            </p>
                                            <a href="#" class="btn btn-primary"><i class="fas fa-search-location"></i>
                                                Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-3 col-md-4 col-sm-12 mb-0">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="https://www.hotelfazendajacauna.com.br/wp-content/uploads/2018/08/7-setembro-hotel-fazenda-jacauna-brota-588x307.jpg"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Nome do Ativo</h3>
                                            <p class="card-text">
                                            <ul>
                                                <li>Valor Venal</li>
                                                <li>Area Total</li>
                                                <li>Localizacao</li>
                                                <li>Bairro</li>
                                            </ul>
                                            </p>
                                            <a href="#" class="btn btn-primary"><i class="fas fa-search-location"></i>
                                                Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="https://s2.glbimg.com/l5tf5ALrBpZgm6SyiYv55yoUlh0=/620x413/smart/e.glbimg.com/og/ed/f/original/2020/01/20/leve-e-iluminada-esta-casa-na-bahia-mistura-estrutura-metalica-madeira-e-vidro_9.jpg"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Nome do Ativo</h3>
                                            <p class="card-text">
                                            <ul>
                                                <li>Valor Venal</li>
                                                <li>Area Total</li>
                                                <li>Localizacao</li>
                                                <li>Bairro</li>
                                            </ul>
                                            </p>
                                            <a href="#" class="btn btn-primary"><i class="fas fa-search-location"></i>
                                                Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4VI6hnXYBsADTV2RTKihRq2eU52CpUkAVuw&usqp=CAU"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Nome do Ativo</h3>
                                            <p class="card-text">
                                            <ul>
                                                <li>Valor Venal</li>
                                                <li>Area Total</li>
                                                <li>Localizacao</li>
                                                <li>Bairro</li>
                                            </ul>
                                            </p>
                                            <a href="#" class="btn btn-primary"><i class="fas fa-search-location"></i>
                                                Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="https://industrywired.b-cdn.net/wp-content/uploads/2021/03/BUilding.jpg"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Nome do Ativo</h3>
                                            <p class="card-text">
                                            <ul>
                                                <li>Valor Venal</li>
                                                <li>Area Total</li>
                                                <li>Localizacao</li>
                                                <li>Bairro</li>
                                            </ul>
                                            </p>
                                            <a href="#" class="btn btn-primary"><i class="fas fa-search-location"></i>
                                                Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-3 col-md-4 col-sm-12 mb-0">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="https://www.hotelfazendajacauna.com.br/wp-content/uploads/2018/08/7-setembro-hotel-fazenda-jacauna-brota-588x307.jpg"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h3 class="card-title">Nome do Ativo</h3>
                                            <p class="card-text">
                                            <ul>
                                                <li>Valor Venal</li>
                                                <li>Area Total</li>
                                                <li>Localizacao</li>
                                                <li>Bairro</li>
                                            </ul>
                                            </p>
                                            <a href="#" class="btn btn-primary"><i class="fas fa-search-location"></i>
                                                Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
