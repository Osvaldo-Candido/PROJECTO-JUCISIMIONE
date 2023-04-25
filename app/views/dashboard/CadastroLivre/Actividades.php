<div class="tabela-planificao planificacao-usuario">
            <header class="configuracoes-planos">
                <div class="campo-pesquisa">
                    <form id="pesquisarData">
                        <div class="pesqu">
                            <input type="date" id="data-inicial" name="data-inicial">
                            <input type="date" id="data-final" name="data-final">
                            <input type="submit" value="Pesquisar/Data">
                        </div>
                    </form>
                </div>
            </header>
            <div class="tabela-actividades">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Responsável</th>
                    <th>Objectivo</th>
                    <th>Data</th>
                    <th>Lugar</th>
                    <th>Duração</th>
                    <th>Estado</th>
                    <th>Departamento</th>
                    <th>Data Criação</th>
                    <th>Data Alteração</th>
                    <th>Admin</th>
                    <th>Ver</th>
                    <th>Acção</th>
                </thead>
                <tbody class="dados-tabela">
                <?php if(isset($dados)) {
                foreach($dados as $actividade) { ?>
                
                        <tr>
                        <td><?=$actividade->idActividade?></td>    
                        <td><?=$actividade->nome?></td>    
                        <td><?=$actividade->responsavel?></td>    
                        <td><?=$actividade->objectivo?></td>    
                        <td><?=$actividade->data?></td>    
                        <td><?=$actividade->lugar?></td>    
                        <td><?=$actividade->duracao?></td>    
                        <td><?=$actividade->estado?></td> 
                        <td><?=$actividade->departamento?></td>       
                        <td><?=$actividade->dataCriacao?></td>      
                        <td><?=$actividade->dataEdicao?></td>    
                        <td><?=$actividade->admin?></td> 
                        <td data-target="ver"><a href="'.DIRPAGE.'actividades/buscarActividade?id='.$actividade->idActividade.'">Ver</a></td> 
                </tr> <?php 
                } }
                ?>
                </tbody>
            </table>         
            </div>  
</div>