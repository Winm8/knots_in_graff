<?php
class Graph {
    private $adjacencyList = [];

    public function addEdge($u, $v) {
        if (!isset($this->adjacencyList[$u])) {
            $this->adjacencyList[$u] = [];
        }
        $this->adjacencyList[$u][] = $v;
    }

    public function isReachable($start, $end) {
        $visited = [];
        return $this->dfs($start, $end, $visited);
    }

    private function dfs($node, $end, &$visited) {
        if ($node == $end) {
            return true;
        }

        $visited[$node] = true;

        if (isset($this->adjacencyList[$node])) {
            foreach ($this->adjacencyList[$node] as $neighbor) {
                if (!isset($visited[$neighbor])) {
                    if ($this->dfs($neighbor, $end, $visited)) {
                        return true;
                    }
                }
            }
        }

        return false;
    }
}

$graph = new Graph();
$graph->addEdge(0, 1);
$graph->addEdge(0, 1);
$graph->addEdge(2, 3);
$graph->addEdge(3, 1);
$graph->addEdge(1, 0);
$graph->addEdge(0, 0);

$startNode = 1;
$endNode = 3;

if ($graph->isReachable($startNode, $endNode)) {
    echo "Cesta mezi uzly $startNode a $endNode existuje.";
} else {
    echo "Cesta mezi uzly $startNode a $endNode neexistuje.";
}
?>
