<?php
    $db = new SQLite3('db/main.db');
    $data = array();
    
    $results = $db->query('SELECT * FROM hashes;');

    while ($res = $results->fetchArray(1)){
        array_push($data, $res);
    }
    $db->close();
?>

<script>
    $(document).ready(function(){
        $("#confirmReset").click(function(){
            postReset();
        });
    });

    let plot = false;
    hashChart.style.display = "none";

    function readyHashes(){
        var stats = [];
        const statMessage = document.getElementById("statMessage");
        const hashChart = document.getElementById("hashChart");

        <?php
            if(sizeof($data) != 0){
                foreach($data[0] as $d){
        ?>
            stats.push(<?= $d ?>);
        <?php
            }
        }
        ?>

        for(i in stats){
            if(stats[i] != 0){
                statMessage.style.display = "none";
                hashChart.style.display = "block";
                break;
            }
        }

        return stats;
    }

    function plotHashes(stats){
        var ctx = hashChart.getContext('2d');
        var doughnutChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                labels: ['MD5', 'SHA1', 'SHA256', 'SHA512'],
                datasets: [{
                    backgroundColor: ['#68f7b5', '#FC6238', '#FFD872', '#6C88C4'],
                    borderColor: ['#68f7b5', '#FC6238', '#FFD872', '#6C88C4'],
                    data: stats,
                    }]
                },
                options: {
                    title:{
                        display: true,
                        text: "Cracked Hashes",
                        fontColor: "#fff",
                        fontSize: "18"
                    },
                    legend: {
                        labels: {
                            fontColor: "#fff",
                        }
                    },
                    animation: {
                        duration: 2000,
                    },
                }
        });
    }


    function postReset(){
        jQuery.ajax({
            url: "php/stats.php",
            type: "POST",
            data: {
                reset: 1
            },
            dataType: "json",
            success: function(res){
                statMessage.style.display = "block";
                hashChart.style.display = "none";
                $('#confirmModal').modal('toggle');
            }
        });
    }

    function elementInView(elem){
        return $(window).scrollTop() < $(elem).offset().top + $(elem).height() ;
    };

    $(window).scroll(function(){
        if (elementInView($('#clear')) && !plot){
            var stats = readyHashes();
            plotHashes(stats);
            plot = true;
        }
            
    });
</script>