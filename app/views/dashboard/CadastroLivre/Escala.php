
        <main class="dash-mae escala-usuario" id="dash-mae">
        <h2 class="escala-obreiros">Escala de Obreiros</h2>
        <div class="programa-trimestral">
            <section class="cab-table">
                <h2>Escala de Liturgistas e Pregadores</h2>
            </section>
            <section class="t-body">
                <table>
                    <thead class="thead-usuario">
                        <tr>
                            <th>Data</th>
                            <th>Pregador</th>
                            <th>Liturgista</th>
                            <th>Suplente Pregador</th>
                            <th>Suplente Liturgist</th>
                        </tr>
                    </thead>
                    <tbody>
        <?php 
        if (isset($this->dados)) {
            foreach($this->dados as $dado) { ?>
              <tr>
                            <td class="primary"><?= $dado->data ?></td>
                            <td><?= $dado->ministro ?></td>
                            <td><?= $dado->liturgista ?></td>
                            <td><?= $dado->suplenteMinistro ?></td>
                            <td><?= $dado->suplenteLiturgista ?></td>
                          </tr>
        <?php }
        } ?>
        
        </tbody>
                </table>
            </section>
        </div>
        </main>