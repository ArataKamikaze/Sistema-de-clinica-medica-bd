<canvas id="grafico_funcionario_salario_histograma" width="300" height="300"></canvas>
<?php
      $i = 0;
      $sql  = 'call dados_funcionarios_salario(@media, @desvio);';
    ?>
    <script type='text/javascript'>
      var ctx = document.getElementById('grafico_funcionario_salario_histograma').getContext('2d');
      var grafico_clientes_estado_civil = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                 <?php
                      foreach ($dbl->query($sql) as $row) {
                          $x = $row['x'];
                          echo "'".($x/100)."',";
                      }
                 ?>
            ],
            datasets: [{
                label: 'Idade',
                data: [
                    <?php
                         foreach ($dbl->query($sql) as $row) {
                             $y = $row['y'];
                             echo "'".$y."',";
                         }
                    ?>
                ],
                backgroundColor: [
                    'rgba(0, 0, 0, 1)',
                ],
                borderColor: [
                    'rgba(0, 0, 0, 1)',
                ],
                borderWidth: 1
            }]
        },
        options:{
            plugins:{
                title:{
                    display: true,
                    text: 'Salários dos funcionários',
                    position: 'top',
                    font: {
                        size: 20,
                    }
                }
            }
        }

    });
    grafico_clientes_estado_civil.options.plugins.legend.position = 'bottom';
    grafico_clientes_estado_civil.update();
    grafico_clientes_estado_civil.options.plugins.legend.labels.boxWidth = 20;
    grafico_clientes_estado_civil.update();
    </script>
