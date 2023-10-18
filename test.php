<?php

$graph = [[1, 0, 1, 1, 0],
          [0, 0, 1, 0, 0],
          [1, 1, 0, 1, 0],
          [0, 0, 0, 1, 0],
          [0, 1, 1, 0, 0]
];

function path_exists(array $graph, int $start, int $end): bool {
    $to_visit = [];
    $visited = [];
    array_push($to_visit, $start);
    
    while (!empty($to_visit)) {
        $act = array_pop($to_visit);

        if ($act == $end) {
            return true;
        }

        if (!in_array($act, $visited)) {
            $visited[] = $act;
            foreach ($graph[$act] as $n => $neigh) {
                if ($neigh == 1 && !in_array($n, $visited) && !in_array($n, $to_visit)) {
                    array_push($to_visit, $n);
                }
            }
        }
    }
    
    return false;
}

var_dump(path_exists($graph, 3, 1));
