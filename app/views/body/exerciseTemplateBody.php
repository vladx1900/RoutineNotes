
<?php
    if ($_GET['id'] > 17) {
        $muscleId = 17;
    } else {
        $muscleId = $_GET['id'];
    }

    $muscle = $dbfunctions->getMuscleByMuscleId($muscleId);
?>

<div class="container">
    <div class="row center">
        <div class="col-sm-12 text-center">
            <h4><?= $muscle['name'] ?></h4>
            <br>
        </div>
        <div class="col-sm-12">

            <?php
            $exercises = $dbfunctions->getExercisesByMuscleId($muscleId);

            if ($exercises) {
                foreach ($exercises as $exercise) {
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $exercise['name'] ?></h5>
                            <p class="card-text">Muscle Targeted: <?= $exercise['muscleName'] ?></p>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

        </div>
    </div>
</div>