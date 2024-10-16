<div ng-include="'/commons/menu.html'"></div>
<div class="jumbotron">
    <div class="container">
        <h2>Categorias</h2>
        
        <div class="row">
            <form name="form" role="form" class="col-sm-offset-2 col-sm-8" novalidate>
                <div class="form-group col-sm-10">
                    <input type="text" ng-model="vm.categoria.descricao" class="form-control" placeholder="Nova categoria..." required>
                </div>
                <button type="submit" class="btn btn-primary col-sm-2" ng-click="vm.save()" ng-disabled="form.$invalid">Cadastrar</button>
            </form>
        </div>

        <div class="row">
            <table class="table table-striped">
                <tbody>
                    <tr ng-if="vm.lista.length == 0">
                        <td>Nenhuma categoria cadastrada</td>
                    </tr>
                    <tr ng-repeat="item in vm.lista">
                        <td>{{item.descricao}}</td>
                        <td>
                            <a class="btn btn-link" ng-click="vm.edit($index)">
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
