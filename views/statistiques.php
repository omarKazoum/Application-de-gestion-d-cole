<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<h2>Statistiques</h2>
<div class="row mb-1">
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Professeurs
                </div>
                <div class="card-content">
                    <canvas id="professeurs-canvas" class="w-100 h-100">
                    </canvas>
                </div>
            </div>
        </div>

    </div>
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                Classes
                </div>
                <div class="card-content">
                    <canvas id="classes-canvas" class="w-100 h-100">
                    </canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12  col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Etudiants
                </div>
                <div class="card-content">
                    <canvas id="students-canvas" class="w-100 h-100">
                    </canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Etudiants
                </div>
                <div class="card-content">
                    <canvas id="students-type-canvas" class="w-100 h-100">
                    </canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Etudiants par Classe
                </div>
                <div class="card-content">
                    <canvas id="students-per-classe-canvas" class="w-100 h-100">
                    </canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let chartColors=['#FF8303','green'];
     /**
     * ceartes a bar chart with the give info
     * @param canvasId
     * @param xValues
     * @param yValues
     * @param colors
     */
    const createChart=(canvasId,chartType,xValues,yValues,colors,showYLebels=true)=>{
        new Chart(canvasId,{
            type:chartType,
            data:{
                labels:xValues,
                datasets:[{
                    backgroundColor:colors,
                        data:yValues
                }]
            },
            options: {
                legend:{display:false},
                title:{
                    display:false,
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            callback: function(val) {
                                return Number.isInteger(val) ? val : null;
                            },
                            display:showYLebels
                        }
                    }],
                },
            }
        });
    }
    const createPieChart=()=>{
    }
    createChart('professeurs-canvas','bar',['professeurs'],[<?=$profsCount ?>],chartColors)
    createChart('classes-canvas','bar',['Classes'],[<?=$classesCount ?>],chartColors)
    createChart('students-canvas','bar',["étudiants"],[<?= $studentsCount?>],chartColors)
    createChart('students-type-canvas','pie',['étudiants','étudiantes'],[<?=$studentsMale ?>,<?=$studentsFemale ?>],chartColors,false)
    createChart('students-per-classe-canvas','doughnut',<?=$classesNames ?>,<?= $classStudentsCounts ?>,chartColors,false);

</script>