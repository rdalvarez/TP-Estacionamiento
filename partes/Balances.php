<link id="themecss" rel="stylesheet" type="text/css" href="css/Shield UI.mis.css" />
<!-- <script type="text/javascript" src="//www.shieldui.com/shared/components/latest/js/jquery-1.11.1.min.js"></script> -->
<script type="text/javascript" src="js/Shield UI-all.min.js"></script>

<?php 
require_once 'clases/importes.php';

$arr = TraerTodosLosImportes();
 ?>

<script type="text/javascript">
    $(function () {
        var posts = [
            { category: "Finance", count: 3 },
            { category: "Law", count: 13 },
            { category: "Business", count: 17 },
            { category: "Health", count: 17 },
            { category: "Sport", count: 23 },
            { category: "Celebrity", count: 17 },
            { category: "IT", count: 7, color: "red" },
            { category: "Technology", count: 12 },
            { category: "Geek", count: 5 },
            { category: "Politics", count: 7 },
            { category: "Religion", count: 17 }
        ];
        $("#chart").shieldChart({
            theme: "light",
            axisX: {
                categoricalValues: $.map(posts, function (item) {
                    return item.category;
                })
            },
            axisY: {
                title: {
                    text: "Importe"
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
                text: "Balance Mensual"
            },
            dataSeries: [{
                seriesType: "bar",
                collectionAlias: "Ganancia por mes",
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