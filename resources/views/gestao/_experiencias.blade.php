<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">

    <div class="padding-b-1" id="cadastrar-experiencia">
        <h2 class="col-sm-12">Cadastrar Experiência</h2>
        <form action="/experiencias/cadastrar">
            
            <div class="">
                <label class="row col-sm-12">Cidade</label>
                <input type="text" name="cidade" placeholder="cidade"/>
            </div>
            <div class="">
                <label class="row col-sm-12">Descrição</label>
                <textarea name="descricao" placeholder="Descrição"></textarea>
            </div>
            <div class="">
                <label class="row col-sm-12">Foto</label>
                <input type="file">
            </div>
            <div class="">
                <label class="row col-sm-12">Preço</label>
                <input type="text" name="preco" placeholder="preco"/>
            </div>
            <div class="">
                <label class="row col-xs-12">Categorias</label>
                <label class="col-xs-3">
                    <input type="checkbox" name="categoria" value="Criança">Criança
                </label>
                <label class="col-xs-3">
                    <input type="checkbox" name="categoria" value="Animal">Animal 
                </label>
            </div>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-acao" name="descricao">Cadastrar</button>
            </div>
        </form>
    </div>
</div>

