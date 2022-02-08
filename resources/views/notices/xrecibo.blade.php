<?php
$socio = "Luis Cabrera Benito";
$remitente = "Luis Cabrera Benito";
$mensajePie = "OTB-SUCA";
$numero = 1;
$descuento = 0;
$porcentajeImpuestos = 16;
$tarifas = [
  [
      "precio" => 15,
      "descripcion" => "Tarifa Basica",
      "cantidad" => 1,
  ],
  [
      "precio" => 10,
      "descripcion" => "Tarifa for cubos de exeso",
      "cantidad" => 2,
  ],
];
$fecha = date("Y-m-d");
?>


<div class="row" style="margin-bottom: 2rem;">
    <div class="col-sm-6">
        <h1 class="h2">Socio:</h1>
        {{$notice->lectura->meter->user->name}}
        {{$notice->lectura->meter->user->lastnameF}}
        {{$notice->lectura->meter->user->lastnameM}}
        <h1 class="h2">Medidor:</h1>
        {{$notice->lectura->meter->nombre }}
    </div>
    <div class="col">
        <h1 class="h2">Lectura:</h1>
            <strong>Fecha: </strong>
            {{ $notice->created_at }}
            <br>
            <strong>Factura No.</strong>
            {{$notice->id}}
    </div>
    <div class="col">
      <table class="table table-condensed table-bordered table-striped">
            <thead>
            <tr>
                <td><strong>LEC.ANT</strong><br>
                  {{ $notice->lectura->lectura}}
                </td>
                <td><strong>LEC. ACT</strong><br>
                  {{ $notice->lectura->lectura}}
                </td>
            </tr>
            <tr>
                <td><strong>TOTAL CUBOS</strong><br>
                  {{ $notice->lectura->consumo}}
                </td>
                <td><strong>CADA CUBO Bs.</strong><br>
                  {{ $notice->lectura->consumo}}
                </td>
            </tr>
            </thead>
      </table>
    </div>
</div>

<table class="table table-condensed table-bordered table-striped">
    <thead>
        <tr>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
                $subtotal = 0;
                foreach ($tarifas as $tarifa) {
                    $totalProducto = $tarifa["cantidad"] * $tarifa["precio"];
                    $subtotal += $totalProducto;
                    ?>
        <tr>
            <td><?php echo $tarifa["descripcion"] ?></td>
            <td><?php echo number_format($tarifa["cantidad"], 2) ?></td>
            <td>Bs.<?php echo number_format($tarifa["precio"], 2) ?></td>
            <td>Bs.<?php echo number_format($totalProducto, 2) ?></td>
        </tr>
        <?php }
                $subtotalConDescuento = $subtotal - $descuento;
                $impuestos = $subtotalConDescuento * ($porcentajeImpuestos / 100);
                $total = $subtotalConDescuento + $impuestos;
                ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" class="text-right">Subtotal</td>
            <td>Bs.<?php echo number_format($subtotal, 2) ?></td>
        </tr>
        <tr>
            <td colspan="3" class="text-right">Descuento</td>
            <td>Bs.<?php echo number_format($descuento, 2) ?></td>
        </tr>
        <tr>
            <td colspan="3" class="text-right">Subtotal con descuento</td>
            <td>Bs.<?php echo number_format($subtotalConDescuento, 2) ?></td>
        </tr>
        <tr>
            <td colspan="3" class="text-right">Impuestos</td>
            <td>Bs.<?php echo number_format($impuestos, 2) ?></td>
        </tr>
        <tr>
            <td colspan="3" class="text-right">
                <h4>Total</h4>
            </td>
            <td>
                <h4>Bs.<?php echo number_format($notice->total, 2) ?></h4>
            </td>
        </tr>
    </tfoot>
</table>
<div class="box-footer mt20">
    <div class="row">
        <div class="col text-center">
            <p class="h5"><?php echo $mensajePie ?></p>
        </div>
    </div>
    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
</div>
