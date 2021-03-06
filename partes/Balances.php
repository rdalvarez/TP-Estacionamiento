<link id="themecss" rel="stylesheet" type="text/css" href="css/Shield UI.mis.css" />
<script type="text/javascript" src="js/Shield UI-all.min.js"></script>

<?php 
require_once 'clases/importes.php';

$arr = Importes::TraerTodosLosImportes();

$arrAux = array();

//saco solo 12 meses atras contando el actual

$Enero = $Febrero = $Marzo = $Abril = $Mayo = $Junio = $Julio = $Agosto = $Septiembre = $Octubre = $Noviembre = $Diciembre = 0;

foreach ($arr as $obj) {
	$fecha = explode("-", $obj->fechaFinal); //saco el año
	if ($fecha[0] == date("Y")) { //comparo el año actual
		switch ($fecha[1]) {
			case '1': $Enero += $obj->importe; break;
			case '2': $Febrero += $obj->importe; break;
			case '3': $Marzo += $obj->importe; break;
			case '4': $Abril += $obj->importe; break;
			case '5': $Mayo += $obj->importe; break;
			case '6': $Junio += $obj->importe; break;
			case '7': $Julio += $obj->importe; break;
			case '8': $Agosto += $obj->importe; break;
			case '9': $Septiembre += $obj->importe; break;
			case '10': $Octubre += $obj->importe; break;
			case '11': $Noviembre += $obj->importe; break;
			case '12': $Diciembre += $obj->importe; break;
			default: echo ":(";	break;
		}
	}
}
?>
<div class="container slideUp">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Balance anual</h4>
                </div>
                <div class="panel-body">
                    <div id="chart"></div>
                </div>
            </div>
		</div>
	</div>
</div>


<script type="text/javascript">
    $(function () {
        var posts = [
            { category: "Enero", count: <?php echo $Enero; ?> },
            { category: "Febrero", count: <?php echo $Febrero; ?> },
            { category: "Marzo", count: <?php echo $Marzo; ?> },
            { category: "Abril", count: <?php echo $Abril; ?> },
            { category: "Mayo", count: <?php echo $Mayo; ?> },
            { category: "Junio", count: <?php echo $Junio; ?> },
            { category: "Julio", count: <?php echo $Julio; ?> },
            { category: "Agosto", count: <?php echo $Agosto; ?> },
            { category: "Septiempre", count: <?php echo $Septiembre; ?> },
            { category: "Octubre", count: <?php echo $Octubre; ?> },
            { category: "Noviembre", count: <?php echo $Noviembre; ?> },
            { category: "Diciembre", count: <?php echo $Diciembre; ?> }
        ];
        $("#chart").shieldChart({
            theme: "light",
            isInverted: true,
            axisX: {
                categoricalValues: $.map(posts, function (item) {
                    return item.category;
                })
            },
            axisY: {
                title: {
                    text: "Ganancia"
                }
            },
            seriesSettings: {
                bar: {
                    dataPointText: {
                        enabled: true
                    }
                }
            },
            primaryHeader: {
                text: "Importes del Año <?php echo date("Y"); ?>"
            },
            dataSeries: [{
                seriesType: "bar",
                collectionAlias: "Ganancia del mes",
                data: $.map(posts, function (item) {
                    return {
                        y: item.count,
                        color: item.color
                    }
                })
            }]
        });
    });
</script>

