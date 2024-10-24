<div ng-include="'/commons/menu.html'"></div>
//teste
<div class="jumbotron">
    <div class="container">
        <h2>{{vm.title}}</h2>

        <form name="form" class="form-horizontal" role="form" novalidate>
            <div class="row">
                <div class="form-group">
                    <div class="btn-group col-sm-offset-2 col-sm-8" ng-if="!vm.isEditando()">
                        <label class="btn btn-default col-sm-6" ng-model="vm.movimentacao.tipo" uib-btn-radio="'despesa'" ng-selected="vm.movimentacao.tipo=='despesa'" required>Despesa</label>
                        <label class="btn btn-default col-sm-6" ng-model="vm.movimentacao.tipo" uib-btn-radio="'receita'" ng-selected="vm.movimentacao.tipo=='receita'" required>Receita</label>
                    </div>
                    <div class="btn-group col-sm-offset-2 col-sm-8" ng-if="vm.isEditando()">
                        <h4>Tipo: {{vm.movimentacao.tipo | uppercase}}</h4>
                    </div>
                </div>
            </div>    
            
            <div class="row">
                <div class="form-group">
                    <div class="btn-group col-sm-offset-2 col-sm-8">
                        <label class="btn btn-default col-sm-6" ng-model="vm.movimentacao.tipoFrequencia" uib-btn-radio="'unica'" 
                            ng-selected="vm.movimentacao.tipoFrequencia != 'fixa' && vm.movimentacao.tipoFrequencia != 'parcelada'"
                            required>Única
                        </label>
                        <label class="btn btn-default col-sm-6" ng-model="vm.movimentacao.tipoFrequencia" uib-btn-radio="'fixa'" disabled title="Em desenvolvimento" required>Fixa</label>
                        
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group" ng-if="vm.movimentacao.tipoFrequencia != 'unica'">
                    <div class="col-sm-offset-2 col-sm-8">
                        <label for="frequencia" class="control-label col-sm-2">Frequência</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="frequencia">
                                <option value="d">Dia</option>
                                <option value="s">Semana</option>
                                <option value="m">Mês</option>
                                <option value="a">Ano</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group" ng-if="vm.movimentacao.tipoFrequencia != 'unica'">
                    <div class="col-sm-offset-2 col-sm-8">
                        <div if="tipoFrequencia == 'parcela'">
                            <label for="parcelas" class="control-label col-sm-2" >Número de Parcelas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control col-sm-2" id="parcelas">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <label for="valor" class="control-label col-sm-2" title="Campo obrigatório">Descrição <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input ng-model="vm.movimentacao.descricao" type="text" class="form-control" id="descricao" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <label for="valor" class="control-label col-sm-2" title="Campo obrigatório">Valor <span class="text-danger">*</span></label>
                        <div class="input-group col-sm-10">
                            <span class="input-group-addon">R$</span>
                            <input ng-model="vm.movimentacao.valor" type="text" class="form-control" id="valor" ui-number-mask required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <label for="data" class="control-label col-sm-2" title="Campo obrigatório">Data <span class="text-danger">*</span></label>
                        <div class="input-group col-sm-10">
                            
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default" ng-click="vm.openCalendar()">
                                    <i class="glyphicon glyphicon-calendar"></i>
                                </button>
                            </span>
                           
                            <input 
                                type="text" 
                                ng-model="vm.movimentacao.data"
                                class="form-control"
                                uib-datepicker-popup="{{vm.dateFormat}}"
                                datepicker-options="vm.dateOptions" 
                                is-open="vm.calendarOpened" 
                                close-text="Fechar" 
                                show-button-bar="false"
                                required
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <label for="categoria" class="control-label col-sm-2" title="Campo obrigatório">Categoria <span class="text-danger">*</span></label>
                        <div class="col-sm-10" ng-controller="categoriasCtrl as vmCat">
                            <select ng-model="vm.movimentacao.i_categoria" class="form-control" id="categoria" required>
                                <option ng-repeat="item in vmCat.lista" value="{{item._id}}">{{item.descricao}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <label for="observacao" class="control-label col-sm-2">Observação</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" ng-model="vm.movimentacao.observacao" ></textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group">
                    <button type="button" class="btn btn-primary" ng-click="vm.save()" ng-disabled="form.$invalid">Salvar</button>
                    <a ui-sref="movimentacoesList" type="button" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
