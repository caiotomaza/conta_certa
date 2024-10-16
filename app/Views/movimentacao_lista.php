<div ng-include="'/commons/menu.html'"></div>
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-sm-offset-4 col-sm-4">
                <h2>Movimentações</h2>
            </div>

            <div class="btn-group col-sm-offset-3 col-sm-1">
                <a ui-sref="movimentacoesCad" class="btn btn-primary dropdown-toggle">
                    <span class="glyphicon glyphicon-plus"></span> Cadastrar
                    
                </a>
            </div>
        </div>
           

        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Descricao</th>
                        <th>Valor</th>
                        <th>Categoria</th>
                        <th>Data</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-if="vm.lista.length == 0">
                        <td colspan='5'>Nenhuma movimentação cadastrada</td>
                    </tr>
                    <tr ng-repeat="(key, item) in vm.lista" ng-class="item.tipo == 'receita' ? 'text-success' : 'text-danger'" class="text-white">
                        <td>{{item.descricao}}</td>
                        <td>{{item.valor | currency}}</td>
                        <td>{{item.i_categoria.descricao}}</td>
                        <td>{{item.data | date: 'dd/MM/yyyy'}}</td>
                        <td class="text-right">
                            <a class="btn btn-link" ui-sref="movimentacoesEdit({id:item._id})">
                                <i class="glyphicon glyphicon-pencil" aria-hidden="true" title="Editar"></i>
                            </a>
                            <button type="button" class="btn btn-link" ng-click="vm.remove(item)" title="Remover">
                                <i class="glyphicon glyphicon-remove" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
