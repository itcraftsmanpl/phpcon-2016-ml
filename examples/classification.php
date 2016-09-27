<?php

namespace Machine;

require 'vendor/autoload.php';

use Phpml\Classification\KNearestNeighbors;
use Phpml\CrossValidation\RandomSplit;
use Phpml\Dataset\Demo\Iris;
use Phpml\Metric\Accuracy;

$dataset = new Iris();
$split = new RandomSplit($dataset);

$classifier = new KNearestNeighbors(2);
$classifier->train($split->getTrainSamples(), $split->getTrainLabels());

$predicted = $classifier->predict($split->getTestSamples());

echo sprintf("Accuracy: %s", Accuracy::score($split->getTestLabels(), $predicted));
